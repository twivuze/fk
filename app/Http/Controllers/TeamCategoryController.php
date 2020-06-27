<?php

namespace App\Http\Controllers;

use App\DataTables\TeamCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTeamCategoryRequest;
use App\Http\Requests\UpdateTeamCategoryRequest;
use App\Repositories\TeamCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TeamCategoryController extends AppBaseController
{
    /** @var  TeamCategoryRepository */
    private $teamCategoryRepository;

    public function __construct(TeamCategoryRepository $teamCategoryRepo)
    {
        $this->teamCategoryRepository = $teamCategoryRepo;
    }

    /**
     * Display a listing of the TeamCategory.
     *
     * @param TeamCategoryDataTable $teamCategoryDataTable
     * @return Response
     */
    public function index(TeamCategoryDataTable $teamCategoryDataTable)
    {
        return $teamCategoryDataTable->render('team_categories.index');
    }

    /**
     * Show the form for creating a new TeamCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('team_categories.create');
    }

    /**
     * Store a newly created TeamCategory in storage.
     *
     * @param CreateTeamCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamCategoryRequest $request)
    {
        $input = $request->all();

        $teamCategory = $this->teamCategoryRepository->create($input);

        Flash::success('Team Category saved successfully.');

        return redirect(route('teamCategories.index'));
    }

    /**
     * Display the specified TeamCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            Flash::error('Team Category not found');

            return redirect(route('teamCategories.index'));
        }

        return view('team_categories.show')->with('teamCategory', $teamCategory);
    }

    /**
     * Show the form for editing the specified TeamCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            Flash::error('Team Category not found');

            return redirect(route('teamCategories.index'));
        }

        return view('team_categories.edit')->with('teamCategory', $teamCategory);
    }

    /**
     * Update the specified TeamCategory in storage.
     *
     * @param  int              $id
     * @param UpdateTeamCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamCategoryRequest $request)
    {
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            Flash::error('Team Category not found');

            return redirect(route('teamCategories.index'));
        }

        $teamCategory = $this->teamCategoryRepository->update($request->all(), $id);

        Flash::success('Team Category updated successfully.');

        return redirect(route('teamCategories.index'));
    }

    /**
     * Remove the specified TeamCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teamCategory = $this->teamCategoryRepository->find($id);

        if (empty($teamCategory)) {
            Flash::error('Team Category not found');

            return redirect(route('teamCategories.index'));
        }

        $this->teamCategoryRepository->delete($id);

        Flash::success('Team Category deleted successfully.');

        return redirect(route('teamCategories.index'));
    }
}
