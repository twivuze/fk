<?php

namespace App\Http\Controllers;

use App\DataTables\LenderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLenderRequest;
use App\Http\Requests\UpdateLenderRequest;
use App\Repositories\LenderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;

class LenderController extends AppBaseController
{
    /** @var  LenderRepository */
    private $lenderRepository;

    public function __construct(LenderRepository $lenderRepo)
    {
        $this->lenderRepository = $lenderRepo;
    }

    /**
     * Display a listing of the Lender.
     *
     * @param LenderDataTable $lenderDataTable
     * @return Response
     */
    public function index(LenderDataTable $lenderDataTable)
    {
        return $lenderDataTable->render('lenders.index');
    }

    /**
     * Show the form for creating a new Lender.
     *
     * @return Response
     */
    public function create()
    {
        return view('lenders.create');
    }

    /**
     * Store a newly created Lender in storage.
     *
     * @param CreateLenderRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderRequest $request)
    {
        $input = $request->all();

       
        if(!$request->file('lenders_passport_photo')){
            $request->validate([
                'lenders_passport_photo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $lenders_passport_photo = $this->updateImage($request,'lenders_passport_photo');  
        }

        if(!$request->file('lenders_bank_details')){
            $request->validate([
                'lenders_bank_details' => 'required|pdf',
            ]);
          
        }else{
        $file=$request->file('lenders_bank_details');
        $docName ='lenders_bank_details-'.time().'.'.$file->extension();
        $request->lenders_bank_details->move(public_path('documents/'), $docName);
        }

        if(!$request->file('lenders_copy_of_identity_card_or_passport')){
            $request->validate([
                'lenders_copy_of_identity_card_or_passport' => 'required|pdf',
            ]);
          
        }else{
        $file1=$request->file('lenders_copy_of_identity_card_or_passport');
        $docName1 ='id_card_or_passport-'.time().'.'.$file1->extension();
        $request->lenders_copy_of_identity_card_or_passport->move(public_path('documents/'), $docName1);
        }

       

       

        $input['lenders_passport_photo']=$lenders_passport_photo;
        $input['lenders_bank_details']=$docName;
        $input['lenders_copy_of_identity_card_or_passport']=$docName1;
        $input['lender_code']=$docName1;

        $lender = $this->lenderRepository->create($input);
        $lender->lender_code = str_pad($lender->id, 7, '0', STR_PAD_LEFT);
        $lender->save();

            if( isset($input['email']) ){
                Mail::to($lender->email)->send(new ApplicationSenderMail($lender,'lender'));
            }

        Flash::success('Lender saved successfully.');

        if(\Auth::check()){ 
            return redirect(route('lenders.index'));
        }else{
            return redirect('/lender-submitted');  
        }
    }

    /**
     * Display the specified Lender.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            Flash::error('Lender not found');

            return redirect(route('lenders.index'));
        }

        return view('lenders.show')->with('lender', $lender);
    }

    /**
     * Show the form for editing the specified Lender.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            Flash::error('Lender not found');

            return redirect(route('lenders.index'));
        }

        return view('lenders.edit')->with('lender', $lender);
    }

    /**
     * Update the specified Lender in storage.
     *
     * @param  int              $id
     * @param UpdateLenderRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            Flash::error('Lender not found');

            return redirect(route('lenders.index'));
        }
        $input = $request->all();

        if($request->file('lenders_passport_photo')){
            $image = $this->updateImage($request,'lenders_passport_photo');  
            $input['lenders_passport_photo']=$image;
        }else{
            $input['lenders_passport_photo']=$lender->lenders_passport_photo; 
        }

        if($request->file('lenders_copy_of_identity_card_or_passport')){
            $file=$request->file('lenders_copy_of_identity_card_or_passport');
            $docName ='lenders_copy_of_identity_card_or_passport-'.time().'.'.$file->extension();
            $request->lenders_copy_of_identity_card_or_passport->move(public_path('documents/'), $docName);
            $input['lenders_copy_of_identity_card_or_passport']=$docName;
            }else{
                $input['lenders_copy_of_identity_card_or_passport']=$lender->lenders_copy_of_identity_card_or_passport;
            }
            
            
        if($request->file('lenders_bank_details')){
            $file1=$request->file('lenders_bank_details');
            $docName1 ='lenders_bank_details-'.time().'.'.$file1->extension();
            $request->lenders_bank_details->move(public_path('documents/'), $docName1);
            $input['lenders_bank_details']=$docName1;
            }else{
                $input['lenders_bank_details']=$lender->lenders_bank_details;
            }
        $lender = $this->lenderRepository->update($input, $id);

        Flash::success('Lender updated successfully.');

        return redirect(route('lenders.index'));
    }

    /**
     * Remove the specified Lender from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            Flash::error('Lender not found');

            return redirect(route('lenders.index'));
        }

        $this->lenderRepository->delete($id);

        Flash::success('Lender deleted successfully.');

        return redirect(route('lenders.index'));
    }
}
