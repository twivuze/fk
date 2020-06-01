<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConferenceSessionAPIRequest;
use App\Http\Requests\API\UpdateConferenceSessionAPIRequest;
use App\Models\ConferenceSession;
use App\Repositories\ConferenceSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConferenceSessionController
 * @package App\Http\Controllers\API
 */

class ConferenceSessionAPIController extends AppBaseController
{
    /** @var  ConferenceSessionRepository */
    private $conferenceSessionRepository;

    public function __construct(ConferenceSessionRepository $conferenceSessionRepo)
    {
        $this->conferenceSessionRepository = $conferenceSessionRepo;
    }

    /**
     * Display a listing of the ConferenceSession.
     * GET|HEAD /conferenceSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $conferenceSessions = $this->conferenceSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($conferenceSessions->toArray(), 'Conference Sessions retrieved successfully');
    }

    /**
     * Store a newly created ConferenceSession in storage.
     * POST /conferenceSessions
     *
     * @param CreateConferenceSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceSessionAPIRequest $request)
    {
        $input = $request->all();

        $conferenceSession = $this->conferenceSessionRepository->create($input);

        return $this->sendResponse($conferenceSession->toArray(), 'Conference Session saved successfully');
    }

    /**
     * Display the specified ConferenceSession.
     * GET|HEAD /conferenceSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ConferenceSession $conferenceSession */
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            return $this->sendError('Conference Session not found');
        }

        return $this->sendResponse($conferenceSession->toArray(), 'Conference Session retrieved successfully');
    }

    /**
     * Update the specified ConferenceSession in storage.
     * PUT/PATCH /conferenceSessions/{id}
     *
     * @param int $id
     * @param UpdateConferenceSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConferenceSession $conferenceSession */
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            return $this->sendError('Conference Session not found');
        }

        $conferenceSession = $this->conferenceSessionRepository->update($input, $id);

        return $this->sendResponse($conferenceSession->toArray(), 'ConferenceSession updated successfully');
    }

    /**
     * Remove the specified ConferenceSession from storage.
     * DELETE /conferenceSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ConferenceSession $conferenceSession */
        $conferenceSession = $this->conferenceSessionRepository->find($id);

        if (empty($conferenceSession)) {
            return $this->sendError('Conference Session not found');
        }

        $conferenceSession->delete();

        return $this->sendSuccess('Conference Session deleted successfully');
    }
}
