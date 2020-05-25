<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLenderSessionAPIRequest;
use App\Http\Requests\API\UpdateLenderSessionAPIRequest;
use App\Models\LenderSession;
use App\Repositories\LenderSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LenderSessionController
 * @package App\Http\Controllers\API
 */

class LenderSessionAPIController extends AppBaseController
{
    /** @var  LenderSessionRepository */
    private $lenderSessionRepository;

    public function __construct(LenderSessionRepository $lenderSessionRepo)
    {
        $this->lenderSessionRepository = $lenderSessionRepo;
    }

    /**
     * Display a listing of the LenderSession.
     * GET|HEAD /lenderSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lenderSessions = $this->lenderSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lenderSessions->toArray(), 'Lender Sessions retrieved successfully');
    }

    /**
     * Store a newly created LenderSession in storage.
     * POST /lenderSessions
     *
     * @param CreateLenderSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderSessionAPIRequest $request)
    {
        $input = $request->all();

        $lenderSession = $this->lenderSessionRepository->create($input);

        return $this->sendResponse($lenderSession->toArray(), 'Lender Session saved successfully');
    }

    /**
     * Display the specified LenderSession.
     * GET|HEAD /lenderSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LenderSession $lenderSession */
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            return $this->sendError('Lender Session not found');
        }

        return $this->sendResponse($lenderSession->toArray(), 'Lender Session retrieved successfully');
    }

    /**
     * Update the specified LenderSession in storage.
     * PUT/PATCH /lenderSessions/{id}
     *
     * @param int $id
     * @param UpdateLenderSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLenderSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var LenderSession $lenderSession */
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            return $this->sendError('Lender Session not found');
        }

        $lenderSession = $this->lenderSessionRepository->update($input, $id);

        return $this->sendResponse($lenderSession->toArray(), 'LenderSession updated successfully');
    }

    /**
     * Remove the specified LenderSession from storage.
     * DELETE /lenderSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LenderSession $lenderSession */
        $lenderSession = $this->lenderSessionRepository->find($id);

        if (empty($lenderSession)) {
            return $this->sendError('Lender Session not found');
        }

        $lenderSession->delete();

        return $this->sendSuccess('Lender Session deleted successfully');
    }
}
