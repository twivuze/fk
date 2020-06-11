<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInternalFunderAPIRequest;
use App\Http\Requests\API\UpdateInternalFunderAPIRequest;
use App\Models\InternalFunder;
use App\Repositories\InternalFunderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InternalFunderController
 * @package App\Http\Controllers\API
 */

class InternalFunderAPIController extends AppBaseController
{
    /** @var  InternalFunderRepository */
    private $internalFunderRepository;

    public function __construct(InternalFunderRepository $internalFunderRepo)
    {
        $this->internalFunderRepository = $internalFunderRepo;
    }

    /**
     * Display a listing of the InternalFunder.
     * GET|HEAD /internalFunders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $internalFunders = $this->internalFunderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($internalFunders->toArray(), 'Internal Funders retrieved successfully');
    }

    /**
     * Store a newly created InternalFunder in storage.
     * POST /internalFunders
     *
     * @param CreateInternalFunderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInternalFunderAPIRequest $request)
    {
        $input = $request->all();

        $internalFunder = $this->internalFunderRepository->create($input);

        return $this->sendResponse($internalFunder->toArray(), 'Internal Funder saved successfully');
    }

    /**
     * Display the specified InternalFunder.
     * GET|HEAD /internalFunders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InternalFunder $internalFunder */
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            return $this->sendError('Internal Funder not found');
        }

        return $this->sendResponse($internalFunder->toArray(), 'Internal Funder retrieved successfully');
    }

    /**
     * Update the specified InternalFunder in storage.
     * PUT/PATCH /internalFunders/{id}
     *
     * @param int $id
     * @param UpdateInternalFunderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInternalFunderAPIRequest $request)
    {
        $input = $request->all();

        /** @var InternalFunder $internalFunder */
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            return $this->sendError('Internal Funder not found');
        }

        $internalFunder = $this->internalFunderRepository->update($input, $id);

        return $this->sendResponse($internalFunder->toArray(), 'InternalFunder updated successfully');
    }

    /**
     * Remove the specified InternalFunder from storage.
     * DELETE /internalFunders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InternalFunder $internalFunder */
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            return $this->sendError('Internal Funder not found');
        }

        $internalFunder->delete();

        return $this->sendSuccess('Internal Funder deleted successfully');
    }
}
