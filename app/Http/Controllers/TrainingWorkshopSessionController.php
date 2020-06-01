<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrainingWorkshopSessionRequest;
use App\Http\Requests\UpdateTrainingWorkshopSessionRequest;
use App\Repositories\TrainingWorkshopSessionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TrainingWorkshopSessionController extends AppBaseController
{
    /** @var  TrainingWorkshopSessionRepository */
    private $trainingWorkshopSessionRepository;

    public function __construct(TrainingWorkshopSessionRepository $trainingWorkshopSessionRepo)
    {
        $this->trainingWorkshopSessionRepository = $trainingWorkshopSessionRepo;
    }

    /**
     * Display a listing of the TrainingWorkshopSession.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $trainingWorkshopSessions = $this->trainingWorkshopSessionRepository->paginate(10);

        return view('training_workshop_sessions.index')
            ->with('trainingWorkshopSessions', $trainingWorkshopSessions);
    }

    /**
     * Show the form for creating a new TrainingWorkshopSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('training_workshop_sessions.create');
    }

    /**
     * Store a newly created TrainingWorkshopSession in storage.
     *
     * @param CreateTrainingWorkshopSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingWorkshopSessionRequest $request)
    {
        $input = $request->all();
        if(!$request->file('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $image = $this->updateImage($request);  
        }
       
        
        $input['image']=$image;

        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->create($input);

        Flash::success('Training Workshop Session saved successfully.');

        return redirect(route('trainingWorkshopSessions.index'));
    }

    /**
     * Display the specified TrainingWorkshopSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            Flash::error('Training Workshop Session not found');

            return redirect(route('trainingWorkshopSessions.index'));
        }

        return view('training_workshop_sessions.show')->with('trainingWorkshopSession', $trainingWorkshopSession);
    }

    /**
     * Show the form for editing the specified TrainingWorkshopSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            Flash::error('Training Workshop Session not found');

            return redirect(route('trainingWorkshopSessions.index'));
        }

        return view('training_workshop_sessions.edit')->with('trainingWorkshopSession', $trainingWorkshopSession);
    }

    /**
     * Update the specified TrainingWorkshopSession in storage.
     *
     * @param int $id
     * @param UpdateTrainingWorkshopSessionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            Flash::error('Training Workshop Session not found');

            return redirect(route('trainingWorkshopSessions.index'));
        }
        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$trainingWorkshopSession->image; 
        }
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->update($input, $id);

        Flash::success('Training Workshop Session updated successfully.');

        return redirect(route('trainingWorkshopSessions.index'));
    }

    /**
     * Remove the specified TrainingWorkshopSession from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            Flash::error('Training Workshop Session not found');

            return redirect(route('trainingWorkshopSessions.index'));
        }

        $this->trainingWorkshopSessionRepository->delete($id);

        Flash::success('Training Workshop Session deleted successfully.');

        return redirect(route('trainingWorkshopSessions.index'));
    }
}
