<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrainingWorkshopAPIRequest;
use App\Http\Requests\API\UpdateTrainingWorkshopAPIRequest;
use App\Models\TrainingWorkshop;
use App\Repositories\TrainingWorkshopRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TrainingWorkshopController
 * @package App\Http\Controllers\API
 */

class TrainingWorkshopAPIController extends AppBaseController
{
    /** @var  TrainingWorkshopRepository */
    private $trainingWorkshopRepository;

    public function __construct(TrainingWorkshopRepository $trainingWorkshopRepo)
    {
        $this->trainingWorkshopRepository = $trainingWorkshopRepo;
    }

    /**
     * Display a listing of the TrainingWorkshop.
     * GET|HEAD /trainingWorkshops
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $trainingWorkshops = $this->trainingWorkshopRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($trainingWorkshops->toArray(), 'Training Workshops retrieved successfully');
    }

    /**
     * Store a newly created TrainingWorkshop in storage.
     * POST /trainingWorkshops
     *
     * @param CreateTrainingWorkshopAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingWorkshopAPIRequest $request)
    {
        $input = $request->all();

        $trainingWorkshop = $this->trainingWorkshopRepository->create($input);

        return $this->sendResponse($trainingWorkshop->toArray(), 'Training Workshop saved successfully');
    }

    /**
     * Display the specified TrainingWorkshop.
     * GET|HEAD /trainingWorkshops/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TrainingWorkshop $trainingWorkshop */
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            return $this->sendError('Training Workshop not found');
        }

        return $this->sendResponse($trainingWorkshop->toArray(), 'Training Workshop retrieved successfully');
    }

    /**
     * Update the specified TrainingWorkshop in storage.
     * PUT/PATCH /trainingWorkshops/{id}
     *
     * @param int $id
     * @param UpdateTrainingWorkshopAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainingWorkshopAPIRequest $request)
    {
        $input = $request->all();

        /** @var TrainingWorkshop $trainingWorkshop */
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            return $this->sendError('Training Workshop not found');
        }

        $trainingWorkshop = $this->trainingWorkshopRepository->update($input, $id);

        return $this->sendResponse($trainingWorkshop->toArray(), 'TrainingWorkshop updated successfully');
    }

    /**
     * Remove the specified TrainingWorkshop from storage.
     * DELETE /trainingWorkshops/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TrainingWorkshop $trainingWorkshop */
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            return $this->sendError('Training Workshop not found');
        }

        $trainingWorkshop->delete();

        return $this->sendSuccess('Training Workshop deleted successfully');
    }
}
