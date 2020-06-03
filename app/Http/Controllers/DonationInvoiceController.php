<?php

namespace App\Http\Controllers;

use App\DataTables\DonationInvoiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDonationInvoiceRequest;
use App\Http\Requests\UpdateDonationInvoiceRequest;
use App\Repositories\DonationInvoiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Auth;
use App\Models\LoanApplication;
use App\Models\Donor;
use App\Models\Center;
use App\Mail\DonorInvoiceMail;
use Illuminate\Support\Facades\Mail;

class DonationInvoiceController extends AppBaseController
{
    /** @var  DonationInvoiceRepository */
    private $donationInvoiceRepository;

    public function __construct(DonationInvoiceRepository $donationInvoiceRepo)
    {
        $this->donationInvoiceRepository = $donationInvoiceRepo;
    }

    /**
     * Display a listing of the DonationInvoice.
     *
     * @param DonationInvoiceDataTable $donationInvoiceDataTable
     * @return Response
     */
    public function index(DonationInvoiceDataTable $donationInvoiceDataTable)
    {
        return $donationInvoiceDataTable->render('donation_invoices.index');
    }

    /**
     * Show the form for creating a new DonationInvoice.
     *
     * @return Response
     */
    public function create()
    {
        return view('donation_invoices.create');
    }

    /**
     * Store a newly created DonationInvoice in storage.
     *
     * @param CreateDonationInvoiceRequest $request
     *
     * @return Response
     */

    public function donateEnterprise()
    {
      
        if(!Auth::check()){
            return redirect('/login?donateEnterprise='.\Request::get('donateEnterprise'));
        }
        $center=null;
        $enterprises = LoanApplication::find(\Request::get('donateEnterprise'));
        if($enterprises){
            $center=Center::where('id',$enterprises->microfinance_center?$enterprises->microfinance_center:null)->first();
        }
        
        $donor=Donor::where('user_id',Auth::id())->first();
        if(!$donor){
            Auth::logout();
            return redirect('/become/donor');
        }

      

            return view('front.donate-enterprise')
            ->with('enterprise', $enterprises)
            ->with('center', $center)
            ->with('donor', $donor);
        

    }


    public function store(CreateDonationInvoiceRequest $request)
    {

        if(!Auth::check()){
            return redirect('/login?donateEnterprise='.\Request::get('donateEnterprise'));
        }
        $input = $request->all();
        $input['payment_status']="successful";
        $input['payment_type']="None";
        $input['receipt_id']= $password=\Illuminate\Support\Str::random(6);

        $donationInvoice = $this->donationInvoiceRepository->create($input);

        Flash::success('Lender Invoice saved successfully.');

        $recipient= \App\Models\LoanApplication::find($donationInvoice->enterprise_id);
        $receipt= \App\Models\Donor::find($donationInvoice->donor_id);

        if( isset($recipient->email) ){
            Mail::to($recipient->email)
            ->send(new DonorInvoiceMail($donationInvoice->id));
        }

        if( isset($receipt->email) ){
            Mail::to($receipt->email)
            ->send(new DonorInvoiceMail($donationInvoice->id));
        }

        return redirect('donation-completed/'.$donationInvoice->id); 
       
    }

    /**
     * Display the specified DonationInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            Flash::error('Donation Invoice not found');

            return redirect(route('donationInvoices.index'));
        }

        return view('donation_invoices.show')->with('donationInvoice', $donationInvoice);
    }

    /**
     * Show the form for editing the specified DonationInvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            Flash::error('Donation Invoice not found');

            return redirect(route('donationInvoices.index'));
        }

        return view('donation_invoices.edit')->with('donationInvoice', $donationInvoice);
    }

    /**
     * Update the specified DonationInvoice in storage.
     *
     * @param  int              $id
     * @param UpdateDonationInvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonationInvoiceRequest $request)
    {
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            Flash::error('Donation Invoice not found');

            return redirect(route('donationInvoices.index'));
        }

        $donationInvoice = $this->donationInvoiceRepository->update($request->all(), $id);

        Flash::success('Donation Invoice updated successfully.');

        return redirect(route('donationInvoices.index'));
    }

    /**
     * Remove the specified DonationInvoice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            Flash::error('Donation Invoice not found');

            return redirect(route('donationInvoices.index'));
        }

        $this->donationInvoiceRepository->delete($id);

        Flash::success('Donation Invoice deleted successfully.');

        return redirect(route('donationInvoices.index'));
    }
}
