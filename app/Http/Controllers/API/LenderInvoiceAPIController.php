<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLenderInvoiceAPIRequest;
use App\Http\Requests\API\UpdateLenderInvoiceAPIRequest;
use App\Models\LenderInvoice;
use App\Repositories\LenderInvoiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LenderInvoiceController
 * @package App\Http\Controllers\API
 */

class LenderInvoiceAPIController extends AppBaseController
{
    /** @var  LenderInvoiceRepository */
    private $lenderInvoiceRepository;

    public function __construct(LenderInvoiceRepository $lenderInvoiceRepo)
    {
        $this->lenderInvoiceRepository = $lenderInvoiceRepo;
    }

    /**
     * Display a listing of the LenderInvoice.
     * GET|HEAD /lenderInvoices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lenderInvoices = $this->lenderInvoiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lenderInvoices->toArray(), 'Lender Invoices retrieved successfully');
    }

    /**
     * Store a newly created LenderInvoice in storage.
     * POST /lenderInvoices
     *
     * @param CreateLenderInvoiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderInvoiceAPIRequest $request)
    {
        $input = $request->all();

        $lenderInvoice = $this->lenderInvoiceRepository->create($input);

        return $this->sendResponse($lenderInvoice->toArray(), 'Lender Invoice saved successfully');
    }

    /**
     * Display the specified LenderInvoice.
     * GET|HEAD /lenderInvoices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LenderInvoice $lenderInvoice */
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            return $this->sendError('Lender Invoice not found');
        }

        return $this->sendResponse($lenderInvoice->toArray(), 'Lender Invoice retrieved successfully');
    }

    /**
     * Update the specified LenderInvoice in storage.
     * PUT/PATCH /lenderInvoices/{id}
     *
     * @param int $id
     * @param UpdateLenderInvoiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLenderInvoiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var LenderInvoice $lenderInvoice */
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            return $this->sendError('Lender Invoice not found');
        }

        $lenderInvoice = $this->lenderInvoiceRepository->update($input, $id);

        return $this->sendResponse($lenderInvoice->toArray(), 'LenderInvoice updated successfully');
    }

    /**
     * Remove the specified LenderInvoice from storage.
     * DELETE /lenderInvoices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LenderInvoice $lenderInvoice */
        $lenderInvoice = $this->lenderInvoiceRepository->find($id);

        if (empty($lenderInvoice)) {
            return $this->sendError('Lender Invoice not found');
        }

        $lenderInvoice->delete();

        return $this->sendSuccess('Lender Invoice deleted successfully');
    }
}
