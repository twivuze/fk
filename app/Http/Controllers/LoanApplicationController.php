<?php

namespace App\Http\Controllers;

use App\DataTables\LoanApplicationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLoanApplicationRequest;
use App\Http\Requests\UpdateLoanApplicationRequest;
use App\Repositories\LoanApplicationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Mail\ApplicationSenderMail;
use App\Mail\CredentialMail;
use Illuminate\Support\Facades\Mail;
class LoanApplicationController extends AppBaseController
{
    /** @var  LoanApplicationRepository */
    private $loanApplicationRepository;

    public function __construct(LoanApplicationRepository $loanApplicationRepo)
    {
        $this->loanApplicationRepository = $loanApplicationRepo;
    }

    /**
     * Display a listing of the LoanApplication.
     *
     * @param LoanApplicationDataTable $loanApplicationDataTable
     * @return Response
     */
    public function index(LoanApplicationDataTable $loanApplicationDataTable)
    {
        return $loanApplicationDataTable->render('loan_applications.index');
    }

    /**
     * Show the form for creating a new LoanApplication.
     *
     * @return Response
     */
    public function create()
    {
        return view('loan_applications.create');
    }

    /**
     * Store a newly created LoanApplication in storage.
     *
     * @param CreateLoanApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanApplicationRequest $request)
    {
        $input = $request->all();

        if(!$request->file('upload_passport_photo')){
            $request->validate([
                'upload_passport_photo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $upload_passport_photo = $this->updateImage($request,'upload_passport_photo');  
        }

        if(!$request->file('national_identity_copy')){
            $request->validate([
                'national_identity_copy' => 'required|pdf',
            ]);
          
        }else{
        $file=$request->file('national_identity_copy');
        $docName ='national_identity_copy-'.time().'.'.$file->extension();
        $request->national_identity_copy->move(public_path('documents/'), $docName);
        }
        
        if(!$request->file('business_certificate')){
            $request->validate([
                'business_certificate' => 'required|pdf',
            ]);
          
        }else{
        $file1=$request->file('business_certificate');
        $docName1 ='business_certificate-'.time().'.'.$file1->extension();
        $request->business_certificate->move(public_path('documents/'), $docName1);
        }

        if(!$request->file('business_patent')){
            $request->validate([
                'business_patent' => 'required|pdf',
            ]);
          
        }else{
        $file2=$request->file('business_patent');
        $docName2 ='business_patent-'.time().'.'.$file2->extension();
        $request->business_patent->move(public_path('documents/'), $docName2);
        }

        if(!$request->file('any_recent_transactions_documents')){
            $request->validate([
                'any_recent_transactions_documents' => 'required|pdf',
            ]);
          
        }else{
        $file3=$request->file('any_recent_transactions_documents');
        $docName3 ='any_recent_transactions_documents-'.time().'.'.$file3->extension();
        $request->any_recent_transactions_documents->move(public_path('documents/'), $docName3);
        }


        $input['upload_passport_photo']=$upload_passport_photo;
        $input['national_identity_copy']=$docName;
        $input['business_certificate']=$docName1;
        $input['business_patent']=$docName2;
        $input['any_recent_transactions_documents']=$docName3;

        $loanApplication = $this->loanApplicationRepository->create($input);

        Flash::success('Loan Application saved successfully.');

        if( isset($input['email']) ){
            Mail::to($loanApplication->email)->send(new ApplicationSenderMail($loanApplication,'loan','Loan Application Submitted Successfully'));
        }

    if(\Auth::check()){ 
        return redirect(route('loanApplications.index'));
    }else{
        return redirect('/loan-submitted');  
    }
    }

    /**
     * Display the specified LoanApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loanApplication = $this->loanApplicationRepository->find($id);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        return view('loan_applications.show')->with('loanApplication', $loanApplication);
    }

    /**
     * Show the form for editing the specified LoanApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loanApplication = $this->loanApplicationRepository->find($id);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        return view('loan_applications.edit')->with('loanApplication', $loanApplication);
    }

    /**
     * Update the specified LoanApplication in storage.
     *
     * @param  int              $id
     * @param UpdateLoanApplicationRequest $request
     *
     * @return Response
     */

     
    public function update($id, Request $request)
    {
        $loanApplication = $this->loanApplicationRepository->find($id);
        $application=$loanApplication;

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }
        $input = $request->all();

       

        if($request->file('business_model_file')){

            $request->validate([
                'business_model_file' => 'required|mimes:xls,xlsx'
            ]);

            $filex=$request->file('business_model_file');
            $docNamex ='business_model_file-'.time().'.'.$filex->extension();
            $request->business_model_file->move(public_path('documents/'), $docNamex);
            $input['business_model_file']=$docNamex;
            }else{
                $input['business_model_file']=$loanApplication->business_model_file;
            }
        

        if($request->file('upload_passport_photo')){
            $image = $this->updateImage($request,'upload_passport_photo');  
            $input['upload_passport_photo']=$image;
        }else{
            $input['upload_passport_photo']=$loanApplication->upload_passport_photo; 
        }

        if($request->file('national_identity_copy')){
        $file=$request->file('national_identity_copy');
        $docName ='national_identity_copy-'.time().'.'.$file->extension();
        $request->national_identity_copy->move(public_path('documents/'), $docName);
        $input['national_identity_copy']=$docName;
        }else{
            $input['national_identity_copy']=$loanApplication->national_identity_copy;
        }

        if($request->file('business_certificate')){
            $file1=$request->file('business_certificate');
            $docName1 ='business_certificate-'.time().'.'.$file1->extension();
            $request->business_certificate->move(public_path('documents/'), $docName1);
        }else{
            $input['business_certificate']=$loanApplication->business_certificate;  
        }

        if($request->file('business_patent')){
            $file2=$request->file('business_patent');
            $docName2 ='business_patent-'.time().'.'.$file2->extension();
            $request->business_patent->move(public_path('documents/'), $docName2);
        }else{
            $input['business_patent']=$loanApplication->business_patent;
        }

        if($request->file('any_recent_transactions_documents')){
            $file3=$request->file('any_recent_transactions_documents');
            $docName3 ='any_recent_transactions_documents-'.time().'.'.$file3->extension();
            $request->any_recent_transactions_documents->move(public_path('documents/'), $docName3);
        }else{
            $input['any_recent_transactions_documents']=$loanApplication->any_recent_transactions_documents;
        }


        $loanApplication = $this->loanApplicationRepository->update($input, $id);

        if($loanApplication->approved){
                      
            $user= \App\User::where('id',$loanApplication->user_id)->where('type','Enterprise')->first();
                 
            if(!$user){
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
                ]);

                        $user= new \App\User();
                        $password=\Illuminate\Support\Str::random(6);

                        $user->email=$loanApplication->email;
                        $user->name=$loanApplication->name;
                        $user->password= \Illuminate\Support\Facades\Hash::make($password);
                        $user->type="Enterprise";
                        $user->status="Active";
                        $user->save();

                        $loanApplication->user_id=$user->id;
                        $loanApplication->save(); 

                        if( isset($loanApplication->email) ){
                            Mail::to($loanApplication->email)
                            ->send(new CredentialMail($loanApplication->name,
                            $loanApplication->email,$password,
                            'credential','MY credentials for sign in into my account'));
                        }
            }else{
                $user->name=$loanApplication->name;  
                $user->save();
            }
        }
       


        Flash::success('Application updated successfully.');

        if(\Auth::check() && \Auth::user()->type=='Admin'){ 
        return redirect(route('loanApplications.index'));
        }else{
            return redirect('/loanApplications/'.$loanApplication->id.'/edit'); 
        }
    }

    /**
     * Remove the specified LoanApplication from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loanApplication = $this->loanApplicationRepository->find($id);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        $this->loanApplicationRepository->delete($id);

        Flash::success('Loan Application deleted successfully.');

        return redirect(route('loanApplications.index'));
    }
}
