<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrainingWorkshopSessionAPIRequest;
use App\Http\Requests\API\UpdateTrainingWorkshopSessionAPIRequest;
use App\Models\TrainingWorkshopSession;
use App\Repositories\TrainingWorkshopSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TrainingWorkshopSessionController
 * @package App\Http\Controllers\API
 */

class TrainingWorkshopSessionAPIController extends AppBaseController
{
    /** @var  TrainingWorkshopSessionRepository */
    private $trainingWorkshopSessionRepository;

    public function __construct(TrainingWorkshopSessionRepository $trainingWorkshopSessionRepo)
    {
        $this->trainingWorkshopSessionRepository = $trainingWorkshopSessionRepo;
    }

    /**
     * Display a listing of the TrainingWorkshopSession.
     * GET|HEAD /trainingWorkshopSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $trainingWorkshopSessions = $this->trainingWorkshopSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($trainingWorkshopSessions->toArray(), 'Training Workshop Sessions retrieved successfully');
    }

    /**
     * Store a newly created TrainingWorkshopSession in storage.
     * POST /trainingWorkshopSessions
     *
     * @param CreateTrainingWorkshopSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingWorkshopSessionAPIRequest $request)
    {
        $input = $request->all();

        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->create($input);

        return $this->sendResponse($trainingWorkshopSession->toArray(), 'Training Workshop Session saved successfully');
    }

    /**
     * Display the specified TrainingWorkshopSession.
     * GET|HEAD /trainingWorkshopSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TrainingWorkshopSession $trainingWorkshopSession */
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            return $this->sendError('Training Workshop Session not found');
        }

        return $this->sendResponse($trainingWorkshopSession->toArray(), 'Training Workshop Session retrieved successfully');
    }

    /**
     * Update the specified TrainingWorkshopSession in storage.
     * PUT/PATCH /trainingWorkshopSessions/{id}
     *
     * @param int $id
     * @param UpdateTrainingWorkshopSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainingWorkshopSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var TrainingWorkshopSession $trainingWorkshopSession */
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            return $this->sendError('Training Workshop Session not found');
        }

        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->update($input, $id);

        return $this->sendResponse($trainingWorkshopSession->toArray(), 'TrainingWorkshopSession updated successfully');
    }

    /**
     * Remove the specified TrainingWorkshopSession from storage.
     * DELETE /trainingWorkshopSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TrainingWorkshopSession $trainingWorkshopSession */
        $trainingWorkshopSession = $this->trainingWorkshopSessionRepository->find($id);

        if (empty($trainingWorkshopSession)) {
            return $this->sendError('Training Workshop Session not found');
        }

        $trainingWorkshopSession->delete();

        return $this->sendSuccess('Training Workshop Session deleted successfully');
    }
}
