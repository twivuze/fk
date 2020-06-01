<?php

namespace App\Http\Controllers;

use App\DataTables\MicroFundApplicationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMicroFundApplicationRequest;
use App\Http\Requests\UpdateMicroFundApplicationRequest;
use App\Repositories\MicroFundApplicationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;
use Illuminate\Http\Request;

use App\Mail\ApplicationSenderMail;
use App\Mail\CredentialMail;
use Illuminate\Support\Facades\Mail;

class MicroFundApplicationController extends AppBaseController
{
    /** @var  MicroFund ApplicationRepository */
    private $microFundApplicationRepository;

    public function __construct(MicroFundApplicationRepository $microFundApplicationRepo)
    {
        $this->microFundApplicationRepository = $microFundApplicationRepo;
    }

    /**
     * Display a listing of the MicroFund Application.
     *
     * @param MicroFund ApplicationDataTable $microFundApplicationDataTable
     * @return Response
     */
    public function index(MicroFundApplicationDataTable $microFundApplicationDataTable)
    {
        return $microFundApplicationDataTable->render('micro_fund_applications.index');
    }

    /**
     * Show the form for creating a new MicroFund Application.
     *
     * @return Response
     */
    public function create()
    {
        return view('micro_fund_applications.create');
    }

    /**
     * Store a newly created MicroFund Application in storage.
     *
     * @param CreateMicroFund ApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateMicroFundApplicationRequest $request)
    {
        $input = $request->all();
      if(!$input['q5_3']){
        $input['q5_3']='Wrong doing'; 
      }
        $microFundApplication = $this->microFundApplicationRepository->create($input);

        Flash::success('Micro Fund Application saved successfully.');
        
        if( isset($input['email']) ){
            Mail::to($microFundApplication->email)->send(new ApplicationSenderMail($microFundApplication,'microfund-manager','MicroFund Manager Application Submitted Successfully'));
        }
            if(Auth::check()){ 
                return redirect(route('microFundApplications.index'));
            }else{
                
                return redirect('/microfund-manager-application-submitted');  
            }
    }

    /**
     * Display the specified MicroFund Application.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $microFundApplication = $this->microFundApplicationRepository->find($id);

        if (empty($microFundApplication)) {
            Flash::error('Micro Fund Application not found');

            return redirect(route('microFundApplications.index'));
        }

        return view('micro_fund_applications.show')->with('microFundApplication', $microFundApplication);
    }

    /**
     * Show the form for editing the specified MicroFund Application.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $microFundApplication = $this->microFundApplicationRepository->find($id);

        if (empty($microFundApplication)) {
            Flash::error('Micro Fund Application not found');

            return redirect(route('microFundApplications.index'));
        }

        return view('micro_fund_applications.edit')->with('microFundApplication', $microFundApplication);
    }

    /**
     * Update the specified MicroFund Application in storage.
     *
     * @param  int              $id
     * @param UpdateMicroFund ApplicationRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'email' =>  'required',
            'address' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'phone_number' => 'required'
        ]);

        $microFundApplication = $this->microFundApplicationRepository->find($id);
        $input=$request->all();

        $application=\App\Models\MicroFundApplication::where('email', $input['email'])->first();

        if (empty($microFundApplication)) {
            Flash::error('Micro Fund Application not found');

            return redirect(route('microFundApplications.index'));
        }


        $microFundApplication = $this->microFundApplicationRepository->update($input, $id);

        if($microFundApplication->approved){
                      
            $user= \App\User::where('id',$microFundApplication->user_id)->where('type','MicroFoundManager')->first();
                 
            if(!$user){
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
                ]);

                        $user= new \App\User();
                        $password=\Illuminate\Support\Str::random(6);

                        $user->email=$microFundApplication->email;
                        $user->name=$microFundApplication->full_name;
                        $user->password= \Illuminate\Support\Facades\Hash::make($password);
                        $user->type="MicroFoundManager";
                        $user->status="Active";
                        $user->save();

                        $microFundApplication->user_id=$user->id;
                        $microFundApplication->save(); 

                        if( isset($microFundApplication->email) ){
                            Mail::to($microFundApplication->email)
                            ->send(new CredentialMail($microFundApplication->name,
                            $microFundApplication->email,$password,
                            'credential','MY credentials for sign in into my account'));
                        }
            }else{
                $user->name=$microFundApplication->full_name;  
                $user->save();
            }
        }

        Flash::success('Micro Fund Application updated successfully.');


        if(\Auth::check() && \Auth::user()->type=='Admin'){ 
            return redirect(route('microFundApplications.index'));
            }else{
                return redirect('/microFundApplications/'.$microFundApplication->id.'/edit'); 
            }
    }

    /**
     * Remove the specified MicroFund Application from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $microFundApplication = $this->microFundApplicationRepository->find($id);

        if (empty($microFundApplication)) {
            Flash::error('Micro Fund Application not found');

            return redirect(route('microFundApplications.index'));
        }

        $this->microFundApplicationRepository->delete($id);

        Flash::success('Micro Fund Application deleted successfully.');

        return redirect(route('microFundApplications.index'));
    }
}
