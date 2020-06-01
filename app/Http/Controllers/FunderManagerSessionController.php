<?php

namespace App\Http\Controllers;

use App\DataTables\FunderManagerSessionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFunderManagerSessionRequest;
use App\Http\Requests\UpdateFunderManagerSessionRequest;
use App\Repositories\FunderManagerSessionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class FunderManagerSessionController extends AppBaseController
{
    /** @var  FunderManagerSessionRepository */
    private $funderManagerSessionRepository;

    public function __construct(FunderManagerSessionRepository $funderManagerSessionRepo)
    {
        $this->funderManagerSessionRepository = $funderManagerSessionRepo;
    }

    /**
     * Display a listing of the FunderManagerSession.
     *
     * @param FunderManagerSessionDataTable $funderManagerSessionDataTable
     * @return Response
     */
    public function index(FunderManagerSessionDataTable $funderManagerSessionDataTable)
    {
        return $funderManagerSessionDataTable->render('funder_manager_sessions.index');
    }

    /**
     * Show the form for creating a new FunderManagerSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('funder_manager_sessions.create');
    }

    /**
     * Store a newly created FunderManagerSession in storage.
     *
     * @param CreateFunderManagerSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateFunderManagerSessionRequest $request)
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



        $funderManagerSession = $this->funderManagerSessionRepository->create($input);

        Flash::success('Funder Manager Session saved successfully.');

        return redirect(route('funderManagerSessions.index'));
    }

    /**
     * Display the specified FunderManagerSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            Flash::error('Funder Manager Session not found');

            return redirect(route('funderManagerSessions.index'));
        }

        return view('funder_manager_sessions.show')->with('funderManagerSession', $funderManagerSession);
    }

    /**
     * Show the form for editing the specified FunderManagerSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            Flash::error('Funder Manager Session not found');

            return redirect(route('funderManagerSessions.index'));
        }

        return view('funder_manager_sessions.edit')->with('funderManagerSession', $funderManagerSession);
    }

    /**
     * Update the specified FunderManagerSession in storage.
     *
     * @param  int              $id
     * @param UpdateFunderManagerSessionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            Flash::error('Funder Manager Session not found');

            return redirect(route('funderManagerSessions.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$funderManagerSession->image; 
        }

        $funderManagerSession = $this->funderManagerSessionRepository->update($input, $id);

        Flash::success('Funder Manager Session updated successfully.');

        return redirect(route('funderManagerSessions.index'));
    }

    /**
     * Remove the specified FunderManagerSession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            Flash::error('Funder Manager Session not found');

            return redirect(route('funderManagerSessions.index'));
        }

        $this->funderManagerSessionRepository->delete($id);

        Flash::success('Funder Manager Session deleted successfully.');

        return redirect(route('funderManagerSessions.index'));
    }
}
