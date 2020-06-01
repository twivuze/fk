<?php

namespace App\Http\Controllers;

use App\DataTables\PartnerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Repositories\PartnerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PartnerController extends AppBaseController
{
    /** @var  PartnerRepository */
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepo)
    {
        $this->partnerRepository = $partnerRepo;
    }

    /**
     * Display a listing of the Partner.
     *
     * @param PartnerDataTable $partnerDataTable
     * @return Response
     */
    public function index(PartnerDataTable $partnerDataTable)
    {
        return $partnerDataTable->render('partners.index');
    }

    /**
     * Show the form for creating a new Partner.
     *
     * @return Response
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created Partner in storage.
     *
     * @param CreatePartnerRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnerRequest $request)
    {
        $input = $request->all();

        if(!$request->file('Upload_Logo_Image')){
            $request->validate([
                'Upload_Logo_Image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $Upload_Logo_Image = $this->updateImage($request,'Upload_Logo_Image');  
        }

        $input['approved']=false;
        $input['Upload_Logo_Image']=$Upload_Logo_Image;
        $partner = $this->partnerRepository->create($input);

        Flash::success('Partner saved successfully.');

     
        if( isset($input['Email']) ){
            Mail::to($partner->Email)->send(new ApplicationSenderMail($partner,'partner','Partner Application Submitted Successfully'));
        }

    if(\Auth::check()){ 
        return redirect(route('partners.index'));
    }else{
        return redirect('/partner-submitted');  
    }
    }

    /**
     * Display the specified Partner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        return view('partners.show')->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified Partner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        return view('partners.edit')->with('partner', $partner);
    }

    /**
     * Update the specified Partner in storage.
     *
     * @param  int              $id
     * @param UpdatePartnerRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        if($request->file('Upload_Logo_Image')){
            $image = $this->updateImage($request,'Upload_Logo_Image');  
            $input['Upload_Logo_Image']=$image;
        }else{
            $input['Upload_Logo_Image']=$partner->Upload_Logo_Image; 
        }

        $partner = $this->partnerRepository->update($input, $id);

        Flash::success('Partner updated successfully.');

        if(isset($request->session)){
            return redirect('partners?session='.$request->session);
            }else{
                return redirect(route('partners.index'));  
            }
    }

    /**
     * Remove the specified Partner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        $this->partnerRepository->delete($id);

        Flash::success('Partner deleted successfully.');

        return redirect(route('partners.index'));
    }
}
