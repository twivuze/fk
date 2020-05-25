<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLoanApplicationAPIRequest;
use App\Http\Requests\API\UpdateLoanApplicationAPIRequest;
use App\Models\LoanApplication;
use App\Repositories\LoanApplicationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LoanApplicationController
 * @package App\Http\Controllers\API
 */

class LoanApplicationAPIController extends AppBaseController
{
    /** @var  LoanApplicationRepository */
    private $loanApplicationRepository;

    public function __construct(LoanApplicationRepository $loanApplicationRepo)
    {
        $this->loanApplicationRepository = $loanApplicationRepo;
    }

    /**
     * Display a listing of the LoanApplication.
     * GET|HEAD /loanApplications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $loanApplications = $this->loanApplicationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($loanApplications->toArray(), 'Loan Applications retrieved successfully');
    }

    /**
     * Store a newly created LoanApplication in storage.
     * POST /loanApplications
     *
     * @param CreateLoanApplicationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanApplicationAPIRequest $request)
    {
        $input = $request->all();

        $loanApplication = $this->loanApplicationRepository->create($input);

        return $this->sendResponse($loanApplication->toArray(), 'Loan Application saved successfully');
    }

    /**
     * Display the specified LoanApplication.
     * GET|HEAD /loanApplications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LoanApplication $loanApplication */
        $loanApplication = $this->loanApplicationRepository->find($id);

        if (empty($loanApplication)) {
            return $this->sendError('Loan Application not found');
        }

        return $this->sendResponse($loanApplication->toArray(), 'Loan Application retrieved successfully');
    }

    /**
     * Update the specified LoanApplication in storage.
     * PUT/PATCH /loanApplications/{id}
     *
     * @param int $id
     * @param UpdateLoanApplicationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoanApplicationAPIRequest $request)
    {
        $input = $request->all();

        /** @var LoanApplication $loanApplication */
        $loanApplication = $this->loanApplicationRepository->find($id);

        if (empty($loanApplication)) {
            return $this->sendError('Loan Application not found');
        }

        $loanApplication = $this->loanApplicationRepository->update($input, $id);

        return $this->sendResponse($loanApplication->toArray(), 'LoanApplication updated successfully');
    }

    /**
     * Remove the specified LoanApplication from storage.
     * DELETE /loanApplications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LoanApplication $loanApplication */
        $loanApplication = $this->loanApplicationRepository->find($id);

        if (empty($loanApplication)) {
            return $this->sendError('Loan Application not found');
        }

        $loanApplication->delete();

        return $this->sendSuccess('Loan Application deleted successfully');
    }
}
