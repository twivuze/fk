<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRepaymentAPIRequest;
use App\Http\Requests\API\UpdateRepaymentAPIRequest;
use App\Models\Repayment;
use App\Repositories\RepaymentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RepaymentController
 * @package App\Http\Controllers\API
 */

class RepaymentAPIController extends AppBaseController
{
    /** @var  RepaymentRepository */
    private $repaymentRepository;

    public function __construct(RepaymentRepository $repaymentRepo)
    {
        $this->repaymentRepository = $repaymentRepo;
    }

    /**
     * Display a listing of the Repayment.
     * GET|HEAD /repayments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $repayments = $this->repaymentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($repayments->toArray(), 'Repayments retrieved successfully');
    }

    /**
     * Store a newly created Repayment in storage.
     * POST /repayments
     *
     * @param CreateRepaymentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRepaymentAPIRequest $request)
    {
        $input = $request->all();

        $repayment = $this->repaymentRepository->create($input);

        return $this->sendResponse($repayment->toArray(), 'Repayment saved successfully');
    }

    /**
     * Display the specified Repayment.
     * GET|HEAD /repayments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Repayment $repayment */
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            return $this->sendError('Repayment not found');
        }

        return $this->sendResponse($repayment->toArray(), 'Repayment retrieved successfully');
    }

    /**
     * Update the specified Repayment in storage.
     * PUT/PATCH /repayments/{id}
     *
     * @param int $id
     * @param UpdateRepaymentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepaymentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Repayment $repayment */
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            return $this->sendError('Repayment not found');
        }

        $repayment = $this->repaymentRepository->update($input, $id);

        return $this->sendResponse($repayment->toArray(), 'Repayment updated successfully');
    }

    /**
     * Remove the specified Repayment from storage.
     * DELETE /repayments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Repayment $repayment */
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            return $this->sendError('Repayment not found');
        }

        $repayment->delete();

        return $this->sendSuccess('Repayment deleted successfully');
    }
}
