<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDonorSessionAPIRequest;
use App\Http\Requests\API\UpdateDonorSessionAPIRequest;
use App\Models\DonorSession;
use App\Repositories\DonorSessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DonorSessionController
 * @package App\Http\Controllers\API
 */

class DonorSessionAPIController extends AppBaseController
{
    /** @var  DonorSessionRepository */
    private $donorSessionRepository;

    public function __construct(DonorSessionRepository $donorSessionRepo)
    {
        $this->donorSessionRepository = $donorSessionRepo;
    }

    /**
     * Display a listing of the DonorSession.
     * GET|HEAD /donorSessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $donorSessions = $this->donorSessionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($donorSessions->toArray(), 'Donor Sessions retrieved successfully');
    }

    /**
     * Store a newly created DonorSession in storage.
     * POST /donorSessions
     *
     * @param CreateDonorSessionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDonorSessionAPIRequest $request)
    {
        $input = $request->all();

        $donorSession = $this->donorSessionRepository->create($input);

        return $this->sendResponse($donorSession->toArray(), 'Donor Session saved successfully');
    }

    /**
     * Display the specified DonorSession.
     * GET|HEAD /donorSessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DonorSession $donorSession */
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            return $this->sendError('Donor Session not found');
        }

        return $this->sendResponse($donorSession->toArray(), 'Donor Session retrieved successfully');
    }

    /**
     * Update the specified DonorSession in storage.
     * PUT/PATCH /donorSessions/{id}
     *
     * @param int $id
     * @param UpdateDonorSessionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonorSessionAPIRequest $request)
    {
        $input = $request->all();

        /** @var DonorSession $donorSession */
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            return $this->sendError('Donor Session not found');
        }

        $donorSession = $this->donorSessionRepository->update($input, $id);

        return $this->sendResponse($donorSession->toArray(), 'DonorSession updated successfully');
    }

    /**
     * Remove the specified DonorSession from storage.
     * DELETE /donorSessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DonorSession $donorSession */
        $donorSession = $this->donorSessionRepository->find($id);

        if (empty($donorSession)) {
            return $this->sendError('Donor Session not found');
        }

        $donorSession->delete();

        return $this->sendSuccess('Donor Session deleted successfully');
    }
}
