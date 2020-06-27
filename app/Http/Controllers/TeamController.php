<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Repositories\TeamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Team;
use Flash;
use Response;
use Illuminate\Support\Facades\Storage;


class TeamController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teams = $this->teamRepository->paginate(10);

        return view('teams.index')
            ->with('teams', $teams);
    }

    public function search(Request $request)
    {
       
        $result = Team::query();

        if (!empty($request->input('country'))) {
            $result = $result->where('country', 'like', '%'.$request->input('country').'%');
        }

        if (!empty($request->input('team_category_id'))) {
            $result = $result->where('team_category_id', $request->input('team_category_id'));
        }

        if (!empty($request->input('search'))) {
            $result = $result->where('name', 'like', '%'.$request->input('search').'%')
            ->orwhere('title', 'like', '%' . $request->input('search'). '%');
        }



        $teams = $result->orderBy('id','DESC')->paginate(100);

        return view('teams.index')
            ->with('teams', $teams);
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();
        if ($request->file('image')) {
            $path = $request->file('image')->storePublicly('public');
            $image = env('APP_URL') . Storage::url($path);
            $input['image']=$image?$image:'-';
          }else{
            $input['image']='-';
        }

        $team = $this->teamRepository->create($input);

        Flash::success('Team saved successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Display the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        return view('teams.edit')->with('team', $team);
    }

    /**
     * Update the specified Team in storage.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }
        $input = $request->all();
        if ($request->file('image')) {
             $path = $request->file('image')->storePublicly('public');
             $image = env('APP_URL') . Storage::url($path);
             $input['image']=$image?$image:'-';
           }else{
             $input['image']=$team->image;
         }

        $team = $this->teamRepository->update($input, $id);

        Flash::success('Team updated successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        $this->teamRepository->delete($id);

        Flash::success('Team deleted successfully.');

        return redirect(route('teams.index'));
    }
}
