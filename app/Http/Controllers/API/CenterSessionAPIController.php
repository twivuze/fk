<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCenterSessionAPIRequest;
use App\Http\Requests\API\UpdateCenterSessionAPIRequest;
use App\Models\CenterSession;
use App\Repositories\CenterSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CenterSessionController
 * @package App\Http\Controllers\API
 */

class CenterSessionAPIController extends AppBaseController
{
    /** @var  CenterSessionRepository */
    private $centerSessionRepository;

    public function __construct(CenterSessionRepository $centerSessionRepo)
    {
        $this->centerSessionRepository = $centerSessionRepo;
    }

    /**
     * Display a listing of the CenterSession.
     * GET|HEAD /centerSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $centerSessions = $this->centerSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($centerSessions->toArray(), 'Center Sessions retrieved successfully');
    }

    /**
     * Store a newly created CenterSession in storage.
     * POST /centerSessions
     *
     * @param CreateCenterSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCenterSessionAPIRequest $request)
    {
        $input = $request->all();

        $centerSession = $this->centerSessionRepository->create($input);

        return $this->sendResponse($centerSession->toArray(), 'Center Session saved successfully');
    }

    /**
     * Display the specified CenterSession.
     * GET|HEAD /centerSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CenterSession $centerSession */
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            return $this->sendError('Center Session not found');
        }

        return $this->sendResponse($centerSession->toArray(), 'Center Session retrieved successfully');
    }

    /**
     * Update the specified CenterSession in storage.
     * PUT/PATCH /centerSessions/{id}
     *
     * @param int $id
     * @param UpdateCenterSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCenterSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var CenterSession $centerSession */
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            return $this->sendError('Center Session not found');
        }

        $centerSession = $this->centerSessionRepository->update($input, $id);

        return $this->sendResponse($centerSession->toArray(), 'CenterSession updated successfully');
    }

    /**
     * Remove the specified CenterSession from storage.
     * DELETE /centerSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CenterSession $centerSession */
        $centerSession = $this->centerSessionRepository->find($id);

        if (empty($centerSession)) {
            return $this->sendError('Center Session not found');
        }

        $centerSession->delete();

        return $this->sendSuccess('Center Session deleted successfully');
    }
}
