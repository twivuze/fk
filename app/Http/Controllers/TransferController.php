<?php

namespace App\Http\Controllers;

use App\DataTables\TransferDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Repositories\TransferRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Repayment;
use App\User;
use Carbon\Carbon;

class TransferController extends AppBaseController
{
    /** @var  TransferRepository */
    private $transferRepository;

    public function __construct(TransferRepository $transferRepo)
    {
        $this->transferRepository = $transferRepo;
    }

    /**
     * Display a listing of the Transfer.
     *
     * @param TransferDataTable $transferDataTable
     * @return Response
     */
    public function index(TransferDataTable $transferDataTable)
    {
        return $transferDataTable->render('transfers.index');
    }

    /**
     * Show the form for creating a new Transfer.
     *
     * @return Response
     */
    public function create()
    {
        return view('transfers.create');
    }

    /**
     * Store a newly created Transfer in storage.
     *
     * @param CreateTransferRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferRequest $request)
    {
        $input = $request->all();

    
        if(!$input['grace_period_to']){
            $input['grace_period_to']=$input['grace_period_from'];
        }else{

            $date = Carbon::createFromFormat('Y-m-d', $input['grace_period_to']);
            $date->day(Carbon::now()->day);

            if (Carbon::now()->diffInDays($date, false) > 0) {
                $input['grace_period_to'] = $date->format('Y-m-d');
            }
        }


        if(!$input['reminder_days']){
            $input['reminder_days']=1;
        }

        if(!$input['rate']){
            $input['rate']=1;
        }
        $input['rate']=$input['rate']==0?1:$input['rate'];
        $input['reminder_days']=$input['reminder_days']==0?1:$input['reminder_days'];
     
       \Log::info($input);

        $transfer = $this->transferRepository->create($input);
        
        if($transfer->type=='Loan'){
        $user=new User();
        $repay_code=\Illuminate\Support\Str::random(8);
        $resp=$user->interestProcessing($transfer);

    
 
        $enterprise= \App\Models\LoanApplication::find($transfer->enterprise_id);

        if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='day'){
            $repay_date=$user->getNextDay($input['grace_period_to'],$transfer->instalmentPeriod->period);
        }
        if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='month'){
            $repay_date=$user->getNextMonth($input['grace_period_to'],$transfer->instalmentPeriod->period);
        }

        if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='year'){
            $repay_date=$user->getNextYear($input['grace_period_to'],$transfer->instalmentPeriod->period);
        }

        $repayment= new Repayment([
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
            'center_id'=>$enterprise?$enterprise->microfinance_center?$enterprise->microfinance_center:0:0,
            'did_repay'=>false,
            'total_loan_remain_amount'=>$resp['totalRepayment'],
        ]);
        $repayment->save();
        }
     
        Flash::success('Transfer saved successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Display the specified Transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.show')->with('transfer', $transfer);
    }

    /**
     * Show the form for editing the specified Transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.edit')->with('transfer', $transfer);
    }

    /**
     * Update the specified Transfer in storage.
     *
     * @param  int              $id
     * @param UpdateTransferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferRequest $request)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        $transfer = $this->transferRepository->update($request->all(), $id);

        Flash::success('Transfer updated successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Remove the specified Transfer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        $this->transferRepository->delete($id);

        Flash::success('Transfer deleted successfully.');

        return redirect(route('transfers.index'));
    }
}
