<?php

namespace App\Http\Controllers;

use App\DataTables\DonorSessionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDonorSessionRequest;
use App\Http\Requests\UpdateDonorSessionRequest;
use App\Repositories\DonorSessionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class DonorSessionController extends AppBaseController
{
    /** @var  DonorSessionRepository */
    private $donorSessionRepository;

    public function __construct(DonorSessionRepository $donorSessionRepo)
    {
        $this->donorSessionRepository = $donorSessionRepo;
    }

    /**
     * Display a listing of the DonorSession.
     *
     * @param DonorSessionDataTable $donorSessionDataTable
     * @return Response
     */
    public function index(DonorSessionDataTable $donorSessionDataTable)
    {
        return $donorSessionDataTable->render('donor_sessions.index');
    }

    /**
     * Show the form for creating a new DonorSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('donor_sessions.create');
    }

    /**
     * Store a newly created DonorSession in storage.
     *
     * @param CreateDonorSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateDonorSessionRequest $request)
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

        $donorSession = $this->donorSessionRepository->create($input);

        Flash::success('Donor Session saved successfully.');

        return redirect(route('donorSessions.index'));
    }

    /**
     * Display the specified DonorSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            Flash::error('Donor Session not found');

            return redirect(route('donorSessions.index'));
        }

        return view('donor_sessions.show')->with('donorSession', $donorSession);
    }

    /**
     * Show the form for editing the specified DonorSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            Flash::error('Donor Session not found');

            return redirect(route('donorSessions.index'));
        }

        return view('donor_sessions.edit')->with('donorSession', $donorSession);
    }

    /**
     * Update the specified DonorSession in storage.
     *
     * @param  int              $id
     * @param UpdateDonorSessionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            Flash::error('Donor Session not found');

            return redirect(route('donorSessions.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$donorSession->image; 
        }


        $donorSession = $this->donorSessionRepository->update($input, $id);

        Flash::success('Donor Session updated successfully.');

        return redirect(route('donorSessions.index'));
    }

    /**
     * Remove the specified DonorSession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            Flash::error('Donor Session not found');

            return redirect(route('donorSessions.index'));
        }

        $this->donorSessionRepository->delete($id);

        Flash::success('Donor Session deleted successfully.');

        return redirect(route('donorSessions.index'));
    }
}
