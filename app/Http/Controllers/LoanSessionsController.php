<?php

namespace App\Http\Controllers;

use App\DataTables\LoanSessionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLoanSessionsRequest;
use App\Http\Requests\UpdateLoanSessionsRequest;
use App\Repositories\LoanSessionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class LoanSessionsController extends AppBaseController
{
    /** @var  LoanSessionsRepository */
    private $loanSessionsRepository;

    public function __construct(LoanSessionsRepository $loanSessionsRepo)
    {
        $this->loanSessionsRepository = $loanSessionsRepo;
    }

    /**
     * Display a listing of the LoanSessions.
     *
     * @param LoanSessionsDataTable $loanSessionsDataTable
     * @return Response
     */
    public function index(LoanSessionsDataTable $loanSessionsDataTable)
    {
        return $loanSessionsDataTable->render('loan_sessions.index');
    }

    /**
     * Show the form for creating a new LoanSessions.
     *
     * @return Response
     */
    public function create()
    {
        return view('loan_sessions.create');
    }

    /**
     * Store a newly created LoanSessions in storage.
     *
     * @param CreateLoanSessionsRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanSessionsRequest $request)
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
        $loanSessions = $this->loanSessionsRepository->create($input);

        Flash::success('Loan Sessions saved successfully.');

        return redirect(route('loanSessions.index'));
    }

    /**
     * Display the specified LoanSessions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            Flash::error('Loan Sessions not found');

            return redirect(route('loanSessions.index'));
        }

        return view('loan_sessions.show')->with('loanSessions', $loanSessions);
    }

    /**
     * Show the form for editing the specified LoanSessions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            Flash::error('Loan Sessions not found');

            return redirect(route('loanSessions.index'));
        }

        return view('loan_sessions.edit')->with('loanSessions', $loanSessions);
    }

    /**
     * Update the specified LoanSessions in storage.
     *
     * @param  int              $id
     * @param UpdateLoanSessionsRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            Flash::error('Loan Sessions not found');

            return redirect(route('loanSessions.index'));
        }

        
        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$loanSessions->image; 
        }

        $loanSessions = $this->loanSessionsRepository->update($input, $id);

        Flash::success('Loan Sessions updated successfully.');

        return redirect(route('loanSessions.index'));
    }

    /**
     * Remove the specified LoanSessions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            Flash::error('Loan Sessions not found');

            return redirect(route('loanSessions.index'));
        }

        $this->loanSessionsRepository->delete($id);

        Flash::success('Loan Sessions deleted successfully.');

        return redirect(route('loanSessions.index'));
    }
}
