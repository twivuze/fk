<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCenterAPIRequest;
use App\Http\Requests\API\UpdateCenterAPIRequest;
use App\Models\Center;
use App\Repositories\CenterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CenterController
 * @package App\Http\Controllers\API
 */

class CenterAPIController extends AppBaseController
{
    /** @var  CenterRepository */
    private $centerRepository;

    public function __construct(CenterRepository $centerRepo)
    {
        $this->centerRepository = $centerRepo;
    }

    /**
     * Display a listing of the Center.
     * GET|HEAD /centers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $centers = $this->centerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($centers->toArray(), 'Centers retrieved successfully');
    }

    /**
     * Store a newly created Center in storage.
     * POST /centers
     *
     * @param CreateCenterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCenterAPIRequest $request)
    {
        $input = $request->all();

        $center = $this->centerRepository->create($input);

        return $this->sendResponse($center->toArray(), 'Center saved successfully');
    }

    /**
     * Display the specified Center.
     * GET|HEAD /centers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Center $center */
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            return $this->sendError('Center not found');
        }

        return $this->sendResponse($center->toArray(), 'Center retrieved successfully');
    }

    /**
     * Update the specified Center in storage.
     * PUT/PATCH /centers/{id}
     *
     * @param int $id
     * @param UpdateCenterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCenterAPIRequest $request)
    {
        $input = $request->all();

        /** @var Center $center */
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            return $this->sendError('Center not found');
        }

        $center = $this->centerRepository->update($input, $id);

        return $this->sendResponse($center->toArray(), 'Center updated successfully');
    }

    /**
     * Remove the specified Center from storage.
     * DELETE /centers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Center $center */
        $center = $this->centerRepository->find($id);

        if (empty($center)) {
            return $this->sendError('Center not found');
        }

        $center->delete();

        return $this->sendSuccess('Center deleted successfully');
    }
}
