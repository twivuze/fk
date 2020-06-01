<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFunderManagerSessionAPIRequest;
use App\Http\Requests\API\UpdateFunderManagerSessionAPIRequest;
use App\Models\FunderManagerSession;
use App\Repositories\FunderManagerSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FunderManagerSessionController
 * @package App\Http\Controllers\API
 */

class FunderManagerSessionAPIController extends AppBaseController
{
    /** @var  FunderManagerSessionRepository */
    private $funderManagerSessionRepository;

    public function __construct(FunderManagerSessionRepository $funderManagerSessionRepo)
    {
        $this->funderManagerSessionRepository = $funderManagerSessionRepo;
    }

    /**
     * Display a listing of the FunderManagerSession.
     * GET|HEAD /funderManagerSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $funderManagerSessions = $this->funderManagerSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($funderManagerSessions->toArray(), 'Funder Manager Sessions retrieved successfully');
    }

    /**
     * Store a newly created FunderManagerSession in storage.
     * POST /funderManagerSessions
     *
     * @param CreateFunderManagerSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFunderManagerSessionAPIRequest $request)
    {
        $input = $request->all();

        $funderManagerSession = $this->funderManagerSessionRepository->create($input);

        return $this->sendResponse($funderManagerSession->toArray(), 'Funder Manager Session saved successfully');
    }

    /**
     * Display the specified FunderManagerSession.
     * GET|HEAD /funderManagerSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FunderManagerSession $funderManagerSession */
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            return $this->sendError('Funder Manager Session not found');
        }

        return $this->sendResponse($funderManagerSession->toArray(), 'Funder Manager Session retrieved successfully');
    }

    /**
     * Update the specified FunderManagerSession in storage.
     * PUT/PATCH /funderManagerSessions/{id}
     *
     * @param int $id
     * @param UpdateFunderManagerSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFunderManagerSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var FunderManagerSession $funderManagerSession */
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            return $this->sendError('Funder Manager Session not found');
        }

        $funderManagerSession = $this->funderManagerSessionRepository->update($input, $id);

        return $this->sendResponse($funderManagerSession->toArray(), 'FunderManagerSession updated successfully');
    }

    /**
     * Remove the specified FunderManagerSession from storage.
     * DELETE /funderManagerSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FunderManagerSession $funderManagerSession */
        $funderManagerSession = $this->funderManagerSessionRepository->find($id);

        if (empty($funderManagerSession)) {
            return $this->sendError('Funder Manager Session not found');
        }

        $funderManagerSession->delete();

        return $this->sendSuccess('Funder Manager Session deleted successfully');
    }
}
