<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDonationInvoiceAPIRequest;
use App\Http\Requests\API\UpdateDonationInvoiceAPIRequest;
use App\Models\DonationInvoice;
use App\Repositories\DonationInvoiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DonationInvoiceController
 * @package App\Http\Controllers\API
 */

class DonationInvoiceAPIController extends AppBaseController
{
    /** @var  DonationInvoiceRepository */
    private $donationInvoiceRepository;

    public function __construct(DonationInvoiceRepository $donationInvoiceRepo)
    {
        $this->donationInvoiceRepository = $donationInvoiceRepo;
    }

    /**
     * Display a listing of the DonationInvoice.
     * GET|HEAD /donationInvoices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $donationInvoices = $this->donationInvoiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($donationInvoices->toArray(), 'Donation Invoices retrieved successfully');
    }

    /**
     * Store a newly created DonationInvoice in storage.
     * POST /donationInvoices
     *
     * @param CreateDonationInvoiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDonationInvoiceAPIRequest $request)
    {
        $input = $request->all();

        $donationInvoice = $this->donationInvoiceRepository->create($input);

        return $this->sendResponse($donationInvoice->toArray(), 'Donation Invoice saved successfully');
    }

    /**
     * Display the specified DonationInvoice.
     * GET|HEAD /donationInvoices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DonationInvoice $donationInvoice */
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            return $this->sendError('Donation Invoice not found');
        }

        return $this->sendResponse($donationInvoice->toArray(), 'Donation Invoice retrieved successfully');
    }

    /**
     * Update the specified DonationInvoice in storage.
     * PUT/PATCH /donationInvoices/{id}
     *
     * @param int $id
     * @param UpdateDonationInvoiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonationInvoiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var DonationInvoice $donationInvoice */
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            return $this->sendError('Donation Invoice not found');
        }

        $donationInvoice = $this->donationInvoiceRepository->update($input, $id);

        return $this->sendResponse($donationInvoice->toArray(), 'DonationInvoice updated successfully');
    }

    /**
     * Remove the specified DonationInvoice from storage.
     * DELETE /donationInvoices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DonationInvoice $donationInvoice */
        $donationInvoice = $this->donationInvoiceRepository->find($id);

        if (empty($donationInvoice)) {
            return $this->sendError('Donation Invoice not found');
        }

        $donationInvoice->delete();

        return $this->sendSuccess('Donation Invoice deleted successfully');
    }
}
