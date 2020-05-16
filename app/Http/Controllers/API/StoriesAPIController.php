<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStoriesAPIRequest;
use App\Http\Requests\API\UpdateStoriesAPIRequest;
use App\Models\Stories;
use App\Repositories\StoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StoriesController
 * @package App\Http\Controllers\API
 */

class StoriesAPIController extends AppBaseController
{
    /** @var  StoriesRepository */
    private $storiesRepository;

    public function __construct(StoriesRepository $storiesRepo)
    {
        $this->storiesRepository = $storiesRepo;
    }

    /**
     * Display a listing of the Stories.
     * GET|HEAD /stories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stories = $this->storiesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stories->toArray(), 'Stories retrieved successfully');
    }

    /**
     * Store a newly created Stories in storage.
     * POST /stories
     *
     * @param CreateStoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStoriesAPIRequest $request)
    {
        $input = $request->all();

        $stories = $this->storiesRepository->create($input);

        return $this->sendResponse($stories->toArray(), 'Stories saved successfully');
    }

    /**
     * Display the specified Stories.
     * GET|HEAD /stories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Stories $stories */
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            return $this->sendError('Stories not found');
        }

        return $this->sendResponse($stories->toArray(), 'Stories retrieved successfully');
    }

    /**
     * Update the specified Stories in storage.
     * PUT/PATCH /stories/{id}
     *
     * @param int $id
     * @param UpdateStoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Stories $stories */
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            return $this->sendError('Stories not found');
        }

        $stories = $this->storiesRepository->update($input, $id);

        return $this->sendResponse($stories->toArray(), 'Stories updated successfully');
    }

    /**
     * Remove the specified Stories from storage.
     * DELETE /stories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Stories $stories */
        $stories = $this->storiesRepository->find($id);

        if (empty($stories)) {
            return $this->sendError('Stories not found');
        }

        $stories->delete();

        return $this->sendSuccess('Stories deleted successfully');
    }
}
