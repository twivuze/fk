<?php

namespace App\Http\Controllers;

use App\DataTables\LenderSessionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLenderSessionRequest;
use App\Http\Requests\UpdateLenderSessionRequest;
use App\Repositories\LenderSessionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;

class LenderSessionController extends AppBaseController
{
    /** @var  LenderSessionRepository */
    private $lenderSessionRepository;

    public function __construct(LenderSessionRepository $lenderSessionRepo)
    {
        $this->lenderSessionRepository = $lenderSessionRepo;
    }

    /**
     * Display a listing of the LenderSession.
     *
     * @param LenderSessionDataTable $lenderSessionDataTable
     * @return Response
     */
    public function index(LenderSessionDataTable $lenderSessionDataTable)
    {
        return $lenderSessionDataTable->render('lender_sessions.index');
    }

    /**
     * Show the form for creating a new LenderSession.
     *
     * @return Response
     */
    public function create()
    {
        return view('lender_sessions.create');
    }

    /**
     * Store a newly created LenderSession in storage.
     *
     * @param CreateLenderSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderSessionRequest $request)
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

        $lenderSession = $this->lenderSessionRepository->create($input);

        Flash::success('Lender Session saved successfully.');

        return redirect(route('lenderSessions.index'));
    }

    /**
     * Display the specified LenderSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            Flash::error('Lender Session not found');

            return redirect(route('lenderSessions.index'));
        }

        return view('lender_sessions.show')->with('lenderSession', $lenderSession);
    }

    /**
     * Show the form for editing the specified LenderSession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            Flash::error('Lender Session not found');

            return redirect(route('lenderSessions.index'));
        }

        return view('lender_sessions.edit')->with('lenderSession', $lenderSession);
    }

    /**
     * Update the specified LenderSession in storage.
     *
     * @param  int              $id
     * @param UpdateLenderSessionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            Flash::error('Lender Session not found');

            return redirect(route('lenderSessions.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$lenderSession->image; 
        }

        $lenderSession = $this->lenderSessionRepository->update($input, $id);

        Flash::success('Lender Session updated successfully.');

        return redirect(route('lenderSessions.index'));
    }

    /**
     * Remove the specified LenderSession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            Flash::error('Lender Session not found');

            return redirect(route('lenderSessions.index'));
        }

        $this->lenderSessionRepository->delete($id);

        Flash::success('Lender Session deleted successfully.');

        return redirect(route('lenderSessions.index'));
    }
}
