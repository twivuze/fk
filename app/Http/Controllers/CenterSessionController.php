<?php

namespace App\Http\Controllers;

use App\DataTables\CenterSessionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCenterSessionRequest;
use App\Http\Requests\UpdateCenterSessionRequest;
use App\Repositories\CenterSessionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CenterSessionController extends AppBaseController
{
    /** @var  CenterSessionRepository */
    private $centerSessionRepository;

    public function __construct(CenterSessionRepository $centerSessionRepo)
    {
        $this->centerSessionRepository = $centerSessionRepo;
    }

    /**
     * Display a listing of the CenterSession.
     *
     * @param CenterSessionDataTable $centerSessionDataTable
     * @return Response
     */
    public function index(CenterSessionDataTable $centerSessionDataTable)
    {
        return $centerSessionDataTable->render('center_sessions.index');
    }

    /**
     * Show the form for creating a new CenterSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('center_sessions.create');
    }

    /**
     * Store a newly created CenterSession in storage.
     *
     * @param CreateCenterSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateCenterSessionRequest $request)
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

        $centerSession = $this->centerSessionRepository->create($input);

        Flash::success('Center Session saved successfully.');

        return redirect(route('centerSessions.index'));
    }

    /**
     * Display the specified CenterSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            Flash::error('Center Session not found');

            return redirect(route('centerSessions.index'));
        }

        return view('center_sessions.show')->with('centerSession', $centerSession);
    }

    /**
     * Show the form for editing the specified CenterSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            Flash::error('Center Session not found');

            return redirect(route('centerSessions.index'));
        }

        return view('center_sessions.edit')->with('centerSession', $centerSession);
    }

    /**
     * Update the specified CenterSession in storage.
     *
     * @param  int              $id
     * @param UpdateCenterSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCenterSessionRequest $request)
    {
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            Flash::error('Center Session not found');

            return redirect(route('centerSessions.index'));
        }
        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$centerSession->image; 
        }

        $centerSession = $this->centerSessionRepository->update($request->all(), $id);

        Flash::success('Center Session updated successfully.');

        return redirect(route('centerSessions.index'));
    }

    /**
     * Remove the specified CenterSession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            Flash::error('Center Session not found');

            return redirect(route('centerSessions.index'));
        }

        $this->centerSessionRepository->delete($id);

        Flash::success('Center Session deleted successfully.');

        return redirect(route('centerSessions.index'));
    }
}
