<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhotosAPIRequest;
use App\Http\Requests\API\UpdatePhotosAPIRequest;
use App\Models\Photos;
use App\Repositories\PhotosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PhotosController
 * @package App\Http\Controllers\API
 */

class PhotosAPIController extends AppBaseController
{
    /** @var  PhotosRepository */
    private $photosRepository;

    public function __construct(PhotosRepository $photosRepo)
    {
        $this->photosRepository = $photosRepo;
    }

    /**
     * Display a listing of the Photos.
     * GET|HEAD /photos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $photos = $this->photosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($photos->toArray(), 'Photos retrieved successfully');
    }

    /**
     * Store a newly created Photos in storage.
     * POST /photos
     *
     * @param CreatePhotosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePhotosAPIRequest $request)
    {
        $input = $request->all();

        $photos = $this->photosRepository->create($input);

        return $this->sendResponse($photos->toArray(), 'Photos saved successfully');
    }

    /**
     * Display the specified Photos.
     * GET|HEAD /photos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Photos $photos */
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            return $this->sendError('Photos not found');
        }

        return $this->sendResponse($photos->toArray(), 'Photos retrieved successfully');
    }

    /**
     * Update the specified Photos in storage.
     * PUT/PATCH /photos/{id}
     *
     * @param int $id
     * @param UpdatePhotosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhotosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Photos $photos */
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            return $this->sendError('Photos not found');
        }

        $photos = $this->photosRepository->update($input, $id);

        return $this->sendResponse($photos->toArray(), 'Photos updated successfully');
    }

    /**
     * Remove the specified Photos from storage.
     * DELETE /photos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Photos $photos */
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            return $this->sendError('Photos not found');
        }

        $photos->delete();

        return $this->sendSuccess('Photos deleted successfully');
    }
}
