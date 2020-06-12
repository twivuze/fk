<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVistorsAPIRequest;
use App\Http\Requests\API\UpdateVistorsAPIRequest;
use App\Models\Vistors;
use App\Repositories\VistorsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VistorsController
 * @package App\Http\Controllers\API
 */

class VistorsAPIController extends AppBaseController
{
    /** @var  VistorsRepository */
    private $vistorsRepository;

    public function __construct(VistorsRepository $vistorsRepo)
    {
        $this->vistorsRepository = $vistorsRepo;
    }

    /**
     * Display a listing of the Vistors.
     * GET|HEAD /vistors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vistors = $this->vistorsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vistors->toArray(), 'Vistors retrieved successfully');
    }

    /**
     * Store a newly created Vistors in storage.
     * POST /vistors
     *
     * @param CreateVistorsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVistorsAPIRequest $request)
    {
        $input = $request->all();

        $vistors = $this->vistorsRepository->create($input);

        return $this->sendResponse($vistors->toArray(), 'Vistors saved successfully');
    }

    /**
     * Display the specified Vistors.
     * GET|HEAD /vistors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vistors $vistors */
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            return $this->sendError('Vistors not found');
        }

        return $this->sendResponse($vistors->toArray(), 'Vistors retrieved successfully');
    }

    /**
     * Update the specified Vistors in storage.
     * PUT/PATCH /vistors/{id}
     *
     * @param int $id
     * @param UpdateVistorsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVistorsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vistors $vistors */
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            return $this->sendError('Vistors not found');
        }

        $vistors = $this->vistorsRepository->update($input, $id);

        return $this->sendResponse($vistors->toArray(), 'Vistors updated successfully');
    }

    /**
     * Remove the specified Vistors from storage.
     * DELETE /vistors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vistors $vistors */
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            return $this->sendError('Vistors not found');
        }

        $vistors->delete();

        return $this->sendSuccess('Vistors deleted successfully');
    }
}
