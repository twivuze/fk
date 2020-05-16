<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeamsAPIRequest;
use App\Http\Requests\API\UpdateTeamsAPIRequest;
use App\Models\Teams;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TeamsController
 * @package App\Http\Controllers\API
 */

class TeamsAPIController extends AppBaseController
{
    /** @var  TeamsRepository */
    private $teamsRepository;

    public function __construct(TeamsRepository $teamsRepo)
    {
        $this->teamsRepository = $teamsRepo;
    }

    /**
     * Display a listing of the Teams.
     * GET|HEAD /teams
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $teams = $this->teamsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * Store a newly created Teams in storage.
     * POST /teams
     *
     * @param CreateTeamsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamsAPIRequest $request)
    {
        $input = $request->all();

        $teams = $this->teamsRepository->create($input);

        return $this->sendResponse($teams->toArray(), 'Teams saved successfully');
    }

    /**
     * Display the specified Teams.
     * GET|HEAD /teams/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Teams $teams */
        $teams = $this->teamsRepository->find($id);

        if (empty($teams)) {
            return $this->sendError('Teams not found');
        }

        return $this->sendResponse($teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * Update the specified Teams in storage.
     * PUT/PATCH /teams/{id}
     *
     * @param int $id
     * @param UpdateTeamsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Teams $teams */
        $teams = $this->teamsRepository->find($id);

        if (empty($teams)) {
            return $this->sendError('Teams not found');
        }

        $teams = $this->teamsRepository->update($input, $id);

        return $this->sendResponse($teams->toArray(), 'Teams updated successfully');
    }

    /**
     * Remove the specified Teams from storage.
     * DELETE /teams/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Teams $teams */
        $teams = $this->teamsRepository->find($id);

        if (empty($teams)) {
            return $this->sendError('Teams not found');
        }

        $teams->delete();

        return $this->sendSuccess('Teams deleted successfully');
    }
}
