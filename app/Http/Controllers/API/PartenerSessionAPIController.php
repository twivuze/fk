<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePartenerSessionAPIRequest;
use App\Http\Requests\API\UpdatePartenerSessionAPIRequest;
use App\Models\PartenerSession;
use App\Repositories\PartenerSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PartenerSessionController
 * @package App\Http\Controllers\API
 */

class PartenerSessionAPIController extends AppBaseController
{
    /** @var  PartenerSessionRepository */
    private $partenerSessionRepository;

    public function __construct(PartenerSessionRepository $partenerSessionRepo)
    {
        $this->partenerSessionRepository = $partenerSessionRepo;
    }

    /**
     * Display a listing of the PartenerSession.
     * GET|HEAD /partenerSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $partenerSessions = $this->partenerSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($partenerSessions->toArray(), 'Partener Sessions retrieved successfully');
    }

    /**
     * Store a newly created PartenerSession in storage.
     * POST /partenerSessions
     *
     * @param CreatePartenerSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePartenerSessionAPIRequest $request)
    {
        $input = $request->all();

        $partenerSession = $this->partenerSessionRepository->create($input);

        return $this->sendResponse($partenerSession->toArray(), 'Partener Session saved successfully');
    }

    /**
     * Display the specified PartenerSession.
     * GET|HEAD /partenerSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PartenerSession $partenerSession */
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            return $this->sendError('Partener Session not found');
        }

        return $this->sendResponse($partenerSession->toArray(), 'Partener Session retrieved successfully');
    }

    /**
     * Update the specified PartenerSession in storage.
     * PUT/PATCH /partenerSessions/{id}
     *
     * @param int $id
     * @param UpdatePartenerSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartenerSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var PartenerSession $partenerSession */
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            return $this->sendError('Partener Session not found');
        }

        $partenerSession = $this->partenerSessionRepository->update($input, $id);

        return $this->sendResponse($partenerSession->toArray(), 'PartenerSession updated successfully');
    }

    /**
     * Remove the specified PartenerSession from storage.
     * DELETE /partenerSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PartenerSession $partenerSession */
        $partenerSession = $this->partenerSessionRepository->find($id);

        if (empty($partenerSession)) {
            return $this->sendError('Partener Session not found');
        }

        $partenerSession->delete();

        return $this->sendSuccess('Partener Session deleted successfully');
    }
}
