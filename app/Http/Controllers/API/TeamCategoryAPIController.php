<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeamCategoryAPIRequest;
use App\Http\Requests\API\UpdateTeamCategoryAPIRequest;
use App\Models\TeamCategory;
use App\Repositories\TeamCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TeamCategoryController
 * @package App\Http\Controllers\API
 */

class TeamCategoryAPIController extends AppBaseController
{
    /** @var  TeamCategoryRepository */
    private $teamCategoryRepository;

    public function __construct(TeamCategoryRepository $teamCategoryRepo)
    {
        $this->teamCategoryRepository = $teamCategoryRepo;
    }

    /**
     * Display a listing of the TeamCategory.
     * GET|HEAD /teamCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $teamCategories = $this->teamCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($teamCategories->toArray(), 'Team Categories retrieved successfully');
    }

    /**
     * Store a newly created TeamCategory in storage.
     * POST /teamCategories
     *
     * @param CreateTeamCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamCategoryAPIRequest $request)
    {
        $input = $request->all();

        $teamCategory = $this->teamCategoryRepository->create($input);

        return $this->sendResponse($teamCategory->toArray(), 'Team Category saved successfully');
    }

    /**
     * Display the specified TeamCategory.
     * GET|HEAD /teamCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TeamCategory $teamCategory */
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            return $this->sendError('Team Category not found');
        }

        return $this->sendResponse($teamCategory->toArray(), 'Team Category retrieved successfully');
    }

    /**
     * Update the specified TeamCategory in storage.
     * PUT/PATCH /teamCategories/{id}
     *
     * @param int $id
     * @param UpdateTeamCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var TeamCategory $teamCategory */
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            return $this->sendError('Team Category not found');
        }

        $teamCategory = $this->teamCategoryRepository->update($input, $id);

        return $this->sendResponse($teamCategory->toArray(), 'TeamCategory updated successfully');
    }

    /**
     * Remove the specified TeamCategory from storage.
     * DELETE /teamCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TeamCategory $teamCategory */
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            return $this->sendError('Team Category not found');
        }

        $teamCategory->delete();

        return $this->sendSuccess('Team Category deleted successfully');
    }
}
