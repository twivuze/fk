<?php

namespace App\Http\Controllers;

use App\DataTables\RepaymentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRepaymentRequest;
use App\Http\Requests\UpdateRepaymentRequest;
use App\Repositories\RepaymentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Mail\Repayment;
use Response;
use Auth;
use Illuminate\Support\Facades\Mail;
class RepaymentController extends AppBaseController
{
    /** @var  RepaymentRepository */
    private $repaymentRepository;

    public function __construct(RepaymentRepository $repaymentRepo)
    {
        $this->repaymentRepository = $repaymentRepo;
    }

    /**
     * Display a listing of the Repayment.
     *
     * @param RepaymentDataTable $repaymentDataTable
     * @return Response
     */
    public function index(RepaymentDataTable $repaymentDataTable)
    {
        return $repaymentDataTable->render('repayments.index');
    }

    /**
     * Show the form for creating a new Repayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('repayments.create');
    }

    /**
     * Store a newly created Repayment in storage.
     *
     * @param CreateRepaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateRepaymentRequest $request)
    {
        $input = $request->all();
        $repayment1 = $this->repaymentRepository->find($input['id']);

        if (empty($repayment1)) {
            Flash::error('Repayment not found');
            if(Auth::check()){
                return redirect(route('repayments.index'));
            }else{
                return redirect('/');
            }
                        
        }

      
        $repayment1->status="successful";
        $repayment1->did_repay=true;
        $repayment1->save();

        if(intval($repayment1->total_loan_remain_amount) > 0){

        
        $repayment = \App\Models\Repayment::where('loan_id',$repayment1->loan_id)
        ->where('status','current')->orderBy('id','DESC')->first();
        $transfer=\App\Models\Transfer::findOrFail($repayment1->loan_id);

        if(!$repayment){
            $user=new \App\User;
            
            $repay_code=\Illuminate\Support\Str::random(8);
            $resp=$user->interestProcessing($transfer);


            if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='day'){
                $repay_date=$user->getNextDay($repayment1->next_repay_date,$transfer->instalmentPeriod->period);
            }
            if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='month'){
                $repay_date=$user->getNextMonth($repayment1->next_repay_date,$transfer->instalmentPeriod->period);
            }
    
            if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='year'){
                $repay_date=$user->getNextYear($repayment1->next_repay_date,$transfer->instalmentPeriod->period);
            }

            $outstanding= new \App\Models\Repayment([
                'reminder_date'=>$user->getLastDay($repay_date),
                'loan_id'=>$transfer->id,
                'enterprise_id'=>$transfer->enterprise_id,
                'repay_code'=>$repay_code,
                'currency'=>$transfer->currency,
                'repayer'=>$transfer->enterprise,
                'repay_date'=>$repay_date,
                'next_repay_date'=>$repay_date,
                'interest_amount'=>$resp['totalInstalment'],
                'amount_without_interst'=>$resp['amountToPay'],
                'total_amount'=>$resp['amountToPay']+$resp['totalInstalment'],
                'repay_reminder_day'=>$transfer->reminder_days,
                'center_id'=>$repayment1->center_id,
                'did_repay'=>false,
                'total_loan_remain_amount'=>($repayment1->total_loan_remain_amount-$repayment1->total_amount),
            ]);

            $outstanding->save();
        }
    }
        $enterprise= \App\Models\LoanApplication::find($transfer->enterprise_id);
        if( isset($enterprise->email)){
            Mail::to($enterprise->email)
            ->queue(new \App\Mail\Repayment($repayment1->id));
        }

       
       
        if(Auth::check()){
            Flash::success('Repayment saved successfully.');

            return redirect(route('repayments.index'));
        }else{
            return redirect('repayment-completed/'.$repayment1->id); 
       
        }
        
    }

    /**
     * Display the specified Repayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        return view('repayments.show')->with('repayment', $repayment);
    }

    /**
     * Show the form for editing the specified Repayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        return view('repayments.edit')->with('repayment', $repayment);
    }

    /**
     * Update the specified Repayment in storage.
     *
     * @param  int              $id
     * @param UpdateRepaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepaymentRequest $request)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        $repayment = $this->repaymentRepository->update($request->all(), $id);

        Flash::success('Repayment updated successfully.');

        return redirect(route('repayments.index'));
    }

    /**
     * Remove the specified Repayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        $this->repaymentRepository->delete($id);

        Flash::success('Repayment deleted successfully.');

        return redirect(route('repayments.index'));
    }
}
