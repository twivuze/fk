<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConferenceSessionRequest;
use App\Http\Requests\UpdateConferenceSessionRequest;
use App\Repositories\ConferenceSessionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConferenceSessionController extends AppBaseController
{
    /** @var  ConferenceSessionRepository */
    private $conferenceSessionRepository;

    public function __construct(ConferenceSessionRepository $conferenceSessionRepo)
    {
        $this->conferenceSessionRepository = $conferenceSessionRepo;
    }

    /**
     * Display a listing of the ConferenceSession.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $conferenceSessions = $this->conferenceSessionRepository->paginate(10);

        return view('conference_sessions.index')
            ->with('conferenceSessions', $conferenceSessions);
    }

    /**
     * Show the form for creating a new ConferenceSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('conference_sessions.create');
    }

    /**
     * Store a newly created ConferenceSession in storage.
     *
     * @param CreateConferenceSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceSessionRequest $request)
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

    
        $conferenceSession = $this->conferenceSessionRepository->create($input);

        Flash::success('Conference Session saved successfully.');

        return redirect(route('conferenceSessions.index'));
    }

    /**
     * Display the specified ConferenceSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            Flash::error('Conference Session not found');

            return redirect(route('conferenceSessions.index'));
        }

        return view('conference_sessions.show')->with('conferenceSession', $conferenceSession);
    }

    /**
     * Show the form for editing the specified ConferenceSession.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            Flash::error('Conference Session not found');

            return redirect(route('conferenceSessions.index'));
        }

        return view('conference_sessions.edit')->with('conferenceSession', $conferenceSession);
    }

    /**
     * Update the specified ConferenceSession in storage.
     *
     * @param int $id
     * @param UpdateConferenceSessionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            Flash::error('Conference Session not found');

            return redirect(route('conferenceSessions.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$conferenceSession->image; 
        }

        $conferenceSession = $this->conferenceSessionRepository->update($input, $id);

        Flash::success('Conference Session updated successfully.');

        return redirect(route('conferenceSessions.index'));
    }

    /**
     * Remove the specified ConferenceSession from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            Flash::error('Conference Session not found');

            return redirect(route('conferenceSessions.index'));
        }

        $this->conferenceSessionRepository->delete($id);

        Flash::success('Conference Session deleted successfully.');

        return redirect(route('conferenceSessions.index'));
    }
}
