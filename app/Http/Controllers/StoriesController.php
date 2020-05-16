<?php

namespace App\Http\Controllers;

use App\DataTables\StoriesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStoriesRequest;
use App\Http\Requests\UpdateStoriesRequest;
use App\Repositories\StoriesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StoriesController extends AppBaseController
{
    /** @var  StoriesRepository */
    private $storiesRepository;

    public function __construct(StoriesRepository $storiesRepo)
    {
        $this->storiesRepository = $storiesRepo;
    }

    /**
     * Display a listing of the Stories.
     *
     * @param StoriesDataTable $storiesDataTable
     * @return Response
     */
    public function index(StoriesDataTable $storiesDataTable)
    {
        return $storiesDataTable->render('stories.index');
    }

    /**
     * Show the form for creating a new Stories.
     *
     * @return Response
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Store a newly created Stories in storage.
     *
     * @param CreateStoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateStoriesRequest $request)
    {
        $input = $request->all();

     
        if(!$request->file('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $image = $this->updateImage($request);  
        }
        
        $input['image']=$image;

        $stories = $this->storiesRepository->create($input);

        Flash::success('Stories saved successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Display the specified Stories.
     *
     * @param  int $id 
     *
     * @return Response
     */
    public function show($id)
    {
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        return view('stories.show')->with('stories', $stories);
    }

    /**
     * Show the form for editing the specified Stories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        return view('stories.edit')->with('stories', $stories);
    }

    /**
     * Update the specified Stories in storage.
     *
     * @param  int              $id
     * @param UpdateStoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoriesRequest $request)
    {
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$stories->image; 
        }


        $stories = $this->storiesRepository->update($input, $id);

        Flash::success('Stories updated successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Remove the specified Stories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        $this->storiesRepository->delete($id);

        Flash::success('Stories deleted successfully.');

        return redirect(route('stories.index'));
    }
}
