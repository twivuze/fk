<?php

namespace App\Http\Controllers;

use App\DataTables\CenterDataTable;
use App\DataTables\ActiveCenterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use App\Repositories\CenterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;

class CenterController extends AppBaseController
{
    /** @var  CenterRepository */
    private $centerRepository;

    public function __construct(CenterRepository $centerRepo)
    {
        $this->centerRepository = $centerRepo;
    }

    /**
     * Display a listing of the Center.
     *
     * @param CenterDataTable $centerDataTable
     * @return Response
     */
    public function index(CenterDataTable $centerDataTable)
    {
        return $centerDataTable->render('centers.index');
    }

   

    /**
     * Show the form for creating a new Center.
     *
     * @return Response
     */
    public function create()
    {
        return view('centers.create');
    }

    /**
     * Store a newly created Center in storage.
     *
     * @param CreateCenterRequest $request
     *
     * @return Response
     */
    public function store(CreateCenterRequest $request)
    {
        $input = $request->all();

       

        if(!$request->file('passport_size_photos_zipped')){
            $request->validate([
                'passport_size_photos_zipped' => 'required|zip',
            ]);
            Flash::error('Validation error');
          
        }else{
        $file=$request->file('passport_size_photos_zipped');
        $docName ='passport_size_photos_zipped-'.time().'.'.$file->extension();
        $request->passport_size_photos_zipped->move(public_path('documents/'), $docName);
        }


        if(!$request->file('copies_national_identity_card_zipped')){
            $request->validate([
                'copies_national_identity_card_zipped' => 'required|zip',
            ]);
            Flash::error('Validation error');
        }else{
        $file1=$request->file('copies_national_identity_card_zipped');
        $docName1 ='copies_national_identity_card_zipped-'.time().'.'.$file1->extension();
        $request->copies_national_identity_card_zipped->move(public_path('documents/'), $docName1);
        }

        if(!$request->file('application_letter_written_by_applicant_pdf')){
            $request->validate([
                'application_letter_written_by_applicant_pdf' => 'required|pdf',
            ]);
            Flash::error('Validation error');
          
        }else{
        $file2=$request->file('application_letter_written_by_applicant_pdf');
        $docName2 ='application_letter_written_by_applicant_pdf-'.time().'.'.$file2->extension();
        $request->application_letter_written_by_applicant_pdf->move(public_path('documents/'), $docName2);
        }

       

       

        $input['passport_size_photos_zipped']=$docName;
        $input['copies_national_identity_card_zipped']=$docName1;
        $input['application_letter_written_by_applicant_pdf']=$docName2;

        $center = $this->centerRepository->create($input);

        Flash::success('Center saved successfully.');

        if( isset($input['email']) ){
            Mail::to($center->email)->send(new ApplicationSenderMail($center,'center','Center Application Submitted successfully.'));
        }


            if(\Auth::check()){ 
                return redirect(route('centers.index'));
            }else{
                return redirect('/center-submitted');  
            }
    }

    /**
     * Display the specified Center.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            Flash::error('Center not found');

            return redirect(route('centers.index'));
        }

        return view('centers.show')->with('center', $center);
    }

    /**
     * Show the form for editing the specified Center.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            Flash::error('Center not found');

            return redirect(route('centers.index'));
        }

        return view('centers.edit')->with('center', $center);
    }

    /**
     * Update the specified Center in storage.
     *
     * @param  int              $id
     * @param UpdateCenterRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            Flash::error('Center not found');

            return redirect(route('centers.index'));
        }


        $input = $request->all();

        if($request->file('cover_image')){
            $image = $this->updateImage($request,'cover_image');  
            $input['cover_image']=$image;
        }else{
            $input['cover_image']=$center->cover_image; 
        }

        if($request->file('passport_size_photos_zipped')){
        $file=$request->file('passport_size_photos_zipped');
        $docName ='passport_size_photos_zipped-'.time().'.'.$file->extension();
        $request->passport_size_photos_zipped->move(public_path('documents/'), $docName);
        $input['passport_size_photos_zipped']=$docName;
        }else{
            $input['passport_size_photos_zipped']=$center->passport_size_photos_zipped;
        }

        if($request->file('copies_national_identity_card_zipped')){
            $file1=$request->file('copies_national_identity_card_zipped');
            $docName1 ='copies_national_identity_card_zipped-'.time().'.'.$file1->extension();
            $request->copies_national_identity_card_zipped->move(public_path('documents/'), $docName1);
        }else{
            $input['copies_national_identity_card_zipped']=$center->copies_national_identity_card_zipped;  
        }

        if($request->file('application_letter_written_by_applicant_pdf')){
            $file2=$request->file('application_letter_written_by_applicant_pdf');
            $docName2 ='application_letter_written_by_applicant_pdf-'.time().'.'.$file2->extension();
            $request->application_letter_written_by_applicant_pdf->move(public_path('documents/'), $docName2);
        }else{
            $input['application_letter_written_by_applicant_pdf']=$center->application_letter_written_by_applicant_pdf;
        }



        $center = $this->centerRepository->update($input, $id);

        Flash::success('Center updated successfully.');

        return redirect(route('centers.index'));
    }

    /**
     * Remove the specified Center from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            Flash::error('Center not found');

            return redirect(route('centers.index'));
        }

        $this->centerRepository->delete($id);

        Flash::success('Center deleted successfully.');

        return redirect(route('centers.index'));
    }
}
