<?php

namespace App\Http\Controllers;

use App\DataTables\ConferenceApplicationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConferenceApplicationRequest;
use App\Http\Requests\UpdateConferenceApplicationRequest;
use App\Repositories\ConferenceApplicationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Http\Request;

use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;


class ConferenceApplicationController extends AppBaseController
{
    /** @var  ConferenceApplicationRepository */
    private $conferenceApplicationRepository;

    public function __construct(ConferenceApplicationRepository $conferenceApplicationRepo)
    {
        $this->conferenceApplicationRepository = $conferenceApplicationRepo;
    }

    /**
     * Display a listing of the ConferenceApplication.
     *
     * @param ConferenceApplicationDataTable $conferenceApplicationDataTable
     * @return Response
     */
    public function index(ConferenceApplicationDataTable $conferenceApplicationDataTable)
    {
        return $conferenceApplicationDataTable->render('conference_applications.index');
    }

    /**
     * Show the form for creating a new ConferenceApplication.
     *
     * @return Response
     */
    public function create()
    {
        return view('conference_applications.create');
    }

    /**
     * Store a newly created ConferenceApplication in storage.
     *
     * @param CreateConferenceApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceApplicationRequest $request)
    {
        $input = $request->all();

        if($input['Have_you_previously_attended_any_Yes_Conference']=='Yes'){

            $request->validate([
                'If_ye_describe_the_year' => 'required',
            ]);  

        }
        if($request->file('Upload_your_business_project_plan')){
            $request->validate([
                'Upload_your_business_project_plan' => "required|mimes:pdf",
            ]);
            
            $file2=$request->file('Upload_your_business_project_plan');
            $docName2 ='Upload_your_business_project_plan-'.time().'.'.$file2->extension();
            $request->Upload_your_business_project_plan->move(public_path('documents/'), $docName2);
            $input['Upload_your_business_project_plan']=$docName2;
            }else{
                $input['Upload_your_business_project_plan']='--';
            }


        $conferenceApplication = $this->conferenceApplicationRepository->create($input);

       
    Flash::success('Conference Application saved successfully.');

    if( isset($input['email']) ){
        Mail::to($conferenceApplication->email)->send(new ApplicationSenderMail($conferenceApplication,'conference','Conference Application Submitted Successfully.'));
    }


        if(\Auth::check()){ 
            return redirect(route('conferenceApplications.index'));
        }else{
            return redirect('/conference-submitted');  
        }
    }


    /**
     * Display the specified ConferenceApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            Flash::error('Conference Application not found');

            return redirect(route('conferenceApplications.index'));
        }

        return view('conference_applications.show')->with('conferenceApplication', $conferenceApplication);
    }

    /**
     * Show the form for editing the specified ConferenceApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            Flash::error('Conference Application not found');

            return redirect(route('conferenceApplications.index'));
        }

     


        return view('conference_applications.edit')->with('conferenceApplication', $conferenceApplication);
    }

    /**
     * Update the specified ConferenceApplication in storage.
     *
     * @param  int              $id
     * @param UpdateConferenceApplicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceApplicationRequest $request)
    {
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            Flash::error('Conference Application not found');

            return redirect(route('conferenceApplications.index'));
        }

        if($request->Have_you_previously_attended_any_Yes_Conference=='Yes'){

            $request->validate([
                'If_ye_describe_the_year' => 'required',
            ]);  

        }

        if($request->file('Upload_your_business_project_plan')){
            $request->validate([
                'Upload_your_business_project_plan' => "required|mimes:pdf",
            ]);
            
            $file2=$request->file('Upload_your_business_project_plan');
            $docName2 ='Upload_your_business_project_plan-'.time().'.'.$file2->extension();
            $request->Upload_your_business_project_plan->move(public_path('documents/'), $docName2);
            $request->Upload_your_business_project_plan=$docName2;
            }else{
                $request->Upload_your_business_project_plan=$conferenceApplication->Upload_your_business_project_plan;
            }

        $conferenceApplication = $this->conferenceApplicationRepository->update($request->all(), $id);

        Flash::success('Conference Application updated successfully.');

        if(isset($request->session)){
        return redirect('conferenceApplications?session='.$request->session);
        }else{
            return redirect(route('conferenceApplications.index'));  
        }
    }

    /**
     * Remove the specified ConferenceApplication from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            Flash::error('Conference Application not found');

            return redirect(route('conferenceApplications.index'));
        }

        $this->conferenceApplicationRepository->delete($id);

        Flash::success('Conference Application deleted successfully.');

        return redirect(route('conferenceApplications.index'));
    }
}
