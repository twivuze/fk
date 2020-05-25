<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLoanSessionsAPIRequest;
use App\Http\Requests\API\UpdateLoanSessionsAPIRequest;
use App\Models\LoanSessions;
use App\Repositories\LoanSessionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LoanSessionsController
 * @package App\Http\Controllers\API
 */

class LoanSessionsAPIController extends AppBaseController
{
    /** @var  LoanSessionsRepository */
    private $loanSessionsRepository;

    public function __construct(LoanSessionsRepository $loanSessionsRepo)
    {
        $this->loanSessionsRepository = $loanSessionsRepo;
    }

    /**
     * Display a listing of the LoanSessions.
     * GET|HEAD /loanSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $loanSessions = $this->loanSessionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($loanSessions->toArray(), 'Loan Sessions retrieved successfully');
    }

    /**
     * Store a newly created LoanSessions in storage.
     * POST /loanSessions
     *
     * @param CreateLoanSessionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanSessionsAPIRequest $request)
    {
        $input = $request->all();

        $loanSessions = $this->loanSessionsRepository->create($input);

        return $this->sendResponse($loanSessions->toArray(), 'Loan Sessions saved successfully');
    }

    /**
     * Display the specified LoanSessions.
     * GET|HEAD /loanSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LoanSessions $loanSessions */
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            return $this->sendError('Loan Sessions not found');
        }

        return $this->sendResponse($loanSessions->toArray(), 'Loan Sessions retrieved successfully');
    }

    /**
     * Update the specified LoanSessions in storage.
     * PUT/PATCH /loanSessions/{id}
     *
     * @param int $id
     * @param UpdateLoanSessionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoanSessionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var LoanSessions $loanSessions */
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            return $this->sendError('Loan Sessions not found');
        }

        $loanSessions = $this->loanSessionsRepository->update($input, $id);

        return $this->sendResponse($loanSessions->toArray(), 'LoanSessions updated successfully');
    }

    /**
     * Remove the specified LoanSessions from storage.
     * DELETE /loanSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LoanSessions $loanSessions */
        $loanSessions = $this->loanSessionsRepository->find($id);

        if (empty($loanSessions)) {
            return $this->sendError('Loan Sessions not found');
        }

        $loanSessions->delete();

        return $this->sendSuccess('Loan Sessions deleted successfully');
    }
}
