<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVideosLinksAPIRequest;
use App\Http\Requests\API\UpdateVideosLinksAPIRequest;
use App\Models\VideosLinks;
use App\Repositories\VideosLinksRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VideosLinksController
 * @package App\Http\Controllers\API
 */

class VideosLinksAPIController extends AppBaseController
{
    /** @var  VideosLinksRepository */
    private $videosLinksRepository;

    public function __construct(VideosLinksRepository $videosLinksRepo)
    {
        $this->videosLinksRepository = $videosLinksRepo;
    }

    /**
     * Display a listing of the VideosLinks.
     * GET|HEAD /videosLinks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $videosLinks = $this->videosLinksRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($videosLinks->toArray(), 'Videos Links retrieved successfully');
    }

    /**
     * Store a newly created VideosLinks in storage.
     * POST /videosLinks
     *
     * @param CreateVideosLinksAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVideosLinksAPIRequest $request)
    {
        $input = $request->all();

        $videosLinks = $this->videosLinksRepository->create($input);

        return $this->sendResponse($videosLinks->toArray(), 'Videos Links saved successfully');
    }

    /**
     * Display the specified VideosLinks.
     * GET|HEAD /videosLinks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VideosLinks $videosLinks */
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            return $this->sendError('Videos Links not found');
        }

        return $this->sendResponse($videosLinks->toArray(), 'Videos Links retrieved successfully');
    }

    /**
     * Update the specified VideosLinks in storage.
     * PUT/PATCH /videosLinks/{id}
     *
     * @param int $id
     * @param UpdateVideosLinksAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideosLinksAPIRequest $request)
    {
        $input = $request->all();

        /** @var VideosLinks $videosLinks */
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            return $this->sendError('Videos Links not found');
        }

        $videosLinks = $this->videosLinksRepository->update($input, $id);

        return $this->sendResponse($videosLinks->toArray(), 'VideosLinks updated successfully');
    }

    /**
     * Remove the specified VideosLinks from storage.
     * DELETE /videosLinks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VideosLinks $videosLinks */
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            return $this->sendError('Videos Links not found');
        }

        $videosLinks->delete();

        return $this->sendSuccess('Videos Links deleted successfully');
    }
}
