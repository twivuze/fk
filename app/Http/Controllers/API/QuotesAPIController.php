<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuotesAPIRequest;
use App\Http\Requests\API\UpdateQuotesAPIRequest;
use App\Models\Quotes;
use App\Repositories\QuotesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QuotesController
 * @package App\Http\Controllers\API
 */

class QuotesAPIController extends AppBaseController
{
    /** @var  QuotesRepository */
    private $quotesRepository;

    public function __construct(QuotesRepository $quotesRepo)
    {
        $this->quotesRepository = $quotesRepo;
    }

    /**
     * Display a listing of the Quotes.
     * GET|HEAD /quotes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $quotes = $this->quotesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($quotes->toArray(), 'Quotes retrieved successfully');
    }

    /**
     * Store a newly created Quotes in storage.
     * POST /quotes
     *
     * @param CreateQuotesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotesAPIRequest $request)
    {
        $input = $request->all();

        $quotes = $this->quotesRepository->create($input);

        return $this->sendResponse($quotes->toArray(), 'Quotes saved successfully');
    }

    /**
     * Display the specified Quotes.
     * GET|HEAD /quotes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Quotes $quotes */
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            return $this->sendError('Quotes not found');
        }

        return $this->sendResponse($quotes->toArray(), 'Quotes retrieved successfully');
    }

    /**
     * Update the specified Quotes in storage.
     * PUT/PATCH /quotes/{id}
     *
     * @param int $id
     * @param UpdateQuotesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Quotes $quotes */
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            return $this->sendError('Quotes not found');
        }

        $quotes = $this->quotesRepository->update($input, $id);

        return $this->sendResponse($quotes->toArray(), 'Quotes updated successfully');
    }

    /**
     * Remove the specified Quotes from storage.
     * DELETE /quotes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Quotes $quotes */
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            return $this->sendError('Quotes not found');
        }

        $quotes->delete();

        return $this->sendSuccess('Quotes deleted successfully');
    }
}
