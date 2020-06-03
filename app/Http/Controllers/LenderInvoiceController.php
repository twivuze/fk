<?php

namespace App\Http\Controllers;

use App\DataTables\LenderInvoiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLenderInvoiceRequest;
use App\Http\Requests\UpdateLenderInvoiceRequest;
use App\Repositories\LenderInvoiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;
use App\Models\LoanApplication;
use App\Models\Lender;
use App\Models\Center;
use App\Mail\LenderInvoiceMail;
use Illuminate\Support\Facades\Mail;
class LenderInvoiceController extends AppBaseController
{
    /** @var  LenderInvoiceRepository */
    private $lenderInvoiceRepository;

    public function __construct(LenderInvoiceRepository $lenderInvoiceRepo)
    {
        $this->lenderInvoiceRepository = $lenderInvoiceRepo;
    }

    /**
     * Display a listing of the LenderInvoice.
     *
     * @param LenderInvoiceDataTable $lenderInvoiceDataTable
     * @return Response
     */
    public function index(LenderInvoiceDataTable $lenderInvoiceDataTable)
    {
        return $lenderInvoiceDataTable->render('lender_invoices.index');
    }

    /**
     * Show the form for creating a new LenderInvoice.
     *
     * @return Response
     */
    public function create()
    {
        return view('lender_invoices.create');
    }

    

    public function lenderEnterprise()
    {
      
        if(!Auth::check()){
            return redirect('/login?lendEnterprise='.\Request::get('lendEnterprise'));
        }
        $center=null;
        $enterprises = LoanApplication::find(\Request::get('lendEnterprise'));
        if($enterprises){
            $center=Center::where('id',$enterprises->microfinance_center?$enterprises->microfinance_center:null)->first();
        }
        
        $lender=Lender::where('user_id',Auth::id())->first();
        if(!$lender){
            Auth::logout();
            return redirect('/become/lender');
        }

      

            return view('front.lender-enterprise')
            ->with('enterprise', $enterprises)
            ->with('center', $center)
            ->with('lender', $lender);
        

    }

    /**
     * Store a newly created LenderInvoice in storage.
     *
     * @param CreateLenderInvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderInvoiceRequest $request)
    {

        if(!Auth::check()){
            return redirect('/login?lend-enterprise='.\Request::get('enterprise'));
        }
        $input = $request->all();
        $input['payment_status']="successful";
        $input['payment_type']="None";
        $input['receipt_id']= $password=\Illuminate\Support\Str::random(6);

        $lenderInvoice = $this->lenderInvoiceRepository->create($input);

        Flash::success('Lender Invoice saved successfully.');

        $recipient= \App\Models\LoanApplication::find($lenderInvoice->enterprise_id);
        $receipt= \App\Models\Lender::find($lenderInvoice->lender_id);

        if( isset($recipient->email) ){
            Mail::to($recipient->email)
            ->send(new LenderInvoiceMail($lenderInvoice->id));
        }

        if( isset($receipt->email) ){
            Mail::to($receipt->email)
            ->send(new LenderInvoiceMail($lenderInvoice->id));
        }

        return redirect('lended-completed/'.$lenderInvoice->id); 
       
    }

    /**
     * Display the specified LenderInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            Flash::error('Lender Invoice not found');

            return redirect(route('lenderInvoices.index'));
        }

        return view('lender_invoices.show')->with('lenderInvoice', $lenderInvoice);
    }

    /**
     * Show the form for editing the specified LenderInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            Flash::error('Lender Invoice not found');

            return redirect(route('lenderInvoices.index'));
        }

        return view('lender_invoices.edit')->with('lenderInvoice', $lenderInvoice);
    }

    /**
     * Update the specified LenderInvoice in storage.
     *
     * @param  int              $id
     * @param UpdateLenderInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLenderInvoiceRequest $request)
    {
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            Flash::error('Lender Invoice not found');

            return redirect(route('lenderInvoices.index'));
        }

        $lenderInvoice = $this->lenderInvoiceRepository->update($request->all(), $id);

        Flash::success('Lender Invoice updated successfully.');

        return redirect(route('lenderInvoices.index'));
    }

    /**
     * Remove the specified LenderInvoice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            Flash::error('Lender Invoice not found');

            return redirect(route('lenderInvoices.index'));
        }

        $this->lenderInvoiceRepository->delete($id);

        Flash::success('Lender Invoice deleted successfully.');

        return redirect(route('lenderInvoices.index'));
    }
}
