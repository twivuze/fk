<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLenderAPIRequest;
use App\Http\Requests\API\UpdateLenderAPIRequest;
use App\Models\Lender;
use App\Repositories\LenderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LenderController
 * @package App\Http\Controllers\API
 */

class LenderAPIController extends AppBaseController
{
    /** @var  LenderRepository */
    private $lenderRepository;

    public function __construct(LenderRepository $lenderRepo)
    {
        $this->lenderRepository = $lenderRepo;
    }

    /**
     * Display a listing of the Lender.
     * GET|HEAD /lenders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lenders = $this->lenderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lenders->toArray(), 'Lenders retrieved successfully');
    }

    /**
     * Store a newly created Lender in storage.
     * POST /lenders
     *
     * @param CreateLenderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderAPIRequest $request)
    {
        $input = $request->all();

        $lender = $this->lenderRepository->create($input);

        return $this->sendResponse($lender->toArray(), 'Lender saved successfully');
    }

    /**
     * Display the specified Lender.
     * GET|HEAD /lenders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lender $lender */
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            return $this->sendError('Lender not found');
        }

        return $this->sendResponse($lender->toArray(), 'Lender retrieved successfully');
    }

    /**
     * Update the specified Lender in storage.
     * PUT/PATCH /lenders/{id}
     *
     * @param int $id
     * @param UpdateLenderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLenderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lender $lender */
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            return $this->sendError('Lender not found');
        }

        $lender = $this->lenderRepository->update($input, $id);

        return $this->sendResponse($lender->toArray(), 'Lender updated successfully');
    }

    /**
     * Remove the specified Lender from storage.
     * DELETE /lenders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lender $lender */
        $lender = $this->lenderRepository->find($id);

        if (empty($lender)) {
            return $this->sendError('Lender not found');
        }

        $lender->delete();

        return $this->sendSuccess('Lender deleted successfully');
    }
}
