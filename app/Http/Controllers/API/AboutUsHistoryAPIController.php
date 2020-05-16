<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAboutUsHistoryAPIRequest;
use App\Http\Requests\API\UpdateAboutUsHistoryAPIRequest;
use App\Models\AboutUsHistory;
use App\Repositories\AboutUsHistoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AboutUsHistoryController
 * @package App\Http\Controllers\API
 */

class AboutUsHistoryAPIController extends AppBaseController
{
    /** @var  AboutUsHistoryRepository */
    private $aboutUsHistoryRepository;

    public function __construct(AboutUsHistoryRepository $aboutUsHistoryRepo)
    {
        $this->aboutUsHistoryRepository = $aboutUsHistoryRepo;
    }

    /**
     * Display a listing of the AboutUsHistory.
     * GET|HEAD /aboutUsHistories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aboutUsHistories = $this->aboutUsHistoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($aboutUsHistories->toArray(), 'About Us Histories retrieved successfully');
    }

    /**
     * Store a newly created AboutUsHistory in storage.
     * POST /aboutUsHistories
     *
     * @param CreateAboutUsHistoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutUsHistoryAPIRequest $request)
    {
        $input = $request->all();

        $aboutUsHistory = $this->aboutUsHistoryRepository->create($input);

        return $this->sendResponse($aboutUsHistory->toArray(), 'About Us History saved successfully');
    }

    /**
     * Display the specified AboutUsHistory.
     * GET|HEAD /aboutUsHistories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AboutUsHistory $aboutUsHistory */
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            return $this->sendError('About Us History not found');
        }

        return $this->sendResponse($aboutUsHistory->toArray(), 'About Us History retrieved successfully');
    }

    /**
     * Update the specified AboutUsHistory in storage.
     * PUT/PATCH /aboutUsHistories/{id}
     *
     * @param int $id
     * @param UpdateAboutUsHistoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutUsHistoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var AboutUsHistory $aboutUsHistory */
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            return $this->sendError('About Us History not found');
        }

        $aboutUsHistory = $this->aboutUsHistoryRepository->update($input, $id);

        return $this->sendResponse($aboutUsHistory->toArray(), 'AboutUsHistory updated successfully');
    }

    /**
     * Remove the specified AboutUsHistory from storage.
     * DELETE /aboutUsHistories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AboutUsHistory $aboutUsHistory */
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            return $this->sendError('About Us History not found');
        }

        $aboutUsHistory->delete();

        return $this->sendSuccess('About Us History deleted successfully');
    }
}
