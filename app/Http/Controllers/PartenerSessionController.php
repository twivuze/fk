<?php

namespace App\Http\Controllers;

use App\DataTables\PartenerSessionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePartenerSessionRequest;
use App\Http\Requests\UpdatePartenerSessionRequest;
use App\Repositories\PartenerSessionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class PartenerSessionController extends AppBaseController
{
    /** @var  PartenerSessionRepository */
    private $partenerSessionRepository;

    public function __construct(PartenerSessionRepository $partenerSessionRepo)
    {
        $this->partenerSessionRepository = $partenerSessionRepo;
    }

    /**
     * Display a listing of the PartenerSession.
     *
     * @param PartenerSessionDataTable $partenerSessionDataTable
     * @return Response
     */
    public function index(PartenerSessionDataTable $partenerSessionDataTable)
    {
        return $partenerSessionDataTable->render('partener_sessions.index');
    }

    /**
     * Show the form for creating a new PartenerSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('partener_sessions.create');
    }

    /**
     * Store a newly created PartenerSession in storage.
     *
     * @param CreatePartenerSessionRequest $request
     *
     * @return Response
     */
    public function store(CreatePartenerSessionRequest $request)
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

        $partenerSession = $this->partenerSessionRepository->create($input);

        Flash::success('Partener Session saved successfully.');

        return redirect(route('partenerSessions.index'));
    }

    /**
     * Display the specified PartenerSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            Flash::error('Partener Session not found');

            return redirect(route('partenerSessions.index'));
        }

        return view('partener_sessions.show')->with('partenerSession', $partenerSession);
    }

    /**
     * Show the form for editing the specified PartenerSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            Flash::error('Partener Session not found');

            return redirect(route('partenerSessions.index'));
        }

        return view('partener_sessions.edit')->with('partenerSession', $partenerSession);
    }

    /**
     * Update the specified PartenerSession in storage.
     *
     * @param  int              $id
     * @param UpdatePartenerSessionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            Flash::error('Partener Session not found');

            return redirect(route('partenerSessions.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$partenerSession->image; 
        }

        $partenerSession = $this->partenerSessionRepository->update($input, $id);

        Flash::success('Partener Session updated successfully.');

        return redirect(route('partenerSessions.index'));
    }

    /**
     * Remove the specified PartenerSession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            Flash::error('Partener Session not found');

            return redirect(route('partenerSessions.index'));
        }

        $this->partenerSessionRepository->delete($id);

        Flash::success('Partener Session deleted successfully.');

        return redirect(route('partenerSessions.index'));
    }
}
