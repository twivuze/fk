<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConferenceApplicationAPIRequest;
use App\Http\Requests\API\UpdateConferenceApplicationAPIRequest;
use App\Models\ConferenceApplication;
use App\Repositories\ConferenceApplicationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConferenceApplicationController
 * @package App\Http\Controllers\API
 */

class ConferenceApplicationAPIController extends AppBaseController
{
    /** @var  ConferenceApplicationRepository */
    private $conferenceApplicationRepository;

    public function __construct(ConferenceApplicationRepository $conferenceApplicationRepo)
    {
        $this->conferenceApplicationRepository = $conferenceApplicationRepo;
    }

    /**
     * Display a listing of the ConferenceApplication.
     * GET|HEAD /conferenceApplications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $conferenceApplications = $this->conferenceApplicationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($conferenceApplications->toArray(), 'Conference Applications retrieved successfully');
    }

    /**
     * Store a newly created ConferenceApplication in storage.
     * POST /conferenceApplications
     *
     * @param CreateConferenceApplicationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConferenceApplicationAPIRequest $request)
    {
        $input = $request->all();

        $conferenceApplication = $this->conferenceApplicationRepository->create($input);

        return $this->sendResponse($conferenceApplication->toArray(), 'Conference Application saved successfully');
    }

    /**
     * Display the specified ConferenceApplication.
     * GET|HEAD /conferenceApplications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ConferenceApplication $conferenceApplication */
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            return $this->sendError('Conference Application not found');
        }

        return $this->sendResponse($conferenceApplication->toArray(), 'Conference Application retrieved successfully');
    }

    /**
     * Update the specified ConferenceApplication in storage.
     * PUT/PATCH /conferenceApplications/{id}
     *
     * @param int $id
     * @param UpdateConferenceApplicationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConferenceApplicationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConferenceApplication $conferenceApplication */
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            return $this->sendError('Conference Application not found');
        }

        $conferenceApplication = $this->conferenceApplicationRepository->update($input, $id);

        return $this->sendResponse($conferenceApplication->toArray(), 'ConferenceApplication updated successfully');
    }

    /**
     * Remove the specified ConferenceApplication from storage.
     * DELETE /conferenceApplications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ConferenceApplication $conferenceApplication */
        $conferenceApplication = $this->conferenceApplicationRepository->find($id);

        if (empty($conferenceApplication)) {
            return $this->sendError('Conference Application not found');
        }

        $conferenceApplication->delete();

        return $this->sendSuccess('Conference Application deleted successfully');
    }
}
