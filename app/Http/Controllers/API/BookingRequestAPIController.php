<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBookingRequestAPIRequest;
use App\Http\Requests\API\UpdateBookingRequestAPIRequest;
use App\Models\BookingRequest;
use App\Repositories\BookingRequestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BookingRequestController
 * @package App\Http\Controllers\API
 */

class BookingRequestAPIController extends AppBaseController
{
    /** @var  BookingRequestRepository */
    private $bookingRequestRepository;

    public function __construct(BookingRequestRepository $bookingRequestRepo)
    {
        $this->bookingRequestRepository = $bookingRequestRepo;
    }

    /**
     * Display a listing of the BookingRequest.
     * GET|HEAD /bookingRequests
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bookingRequests = $this->bookingRequestRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bookingRequests->toArray(), 'Booking Requests retrieved successfully');
    }

    /**
     * Store a newly created BookingRequest in storage.
     * POST /bookingRequests
     *
     * @param CreateBookingRequestAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingRequestAPIRequest $request)
    {
        $input = $request->all();

        $bookingRequest = $this->bookingRequestRepository->create($input);

        return $this->sendResponse($bookingRequest->toArray(), 'Booking Request saved successfully');
    }

    /**
     * Display the specified BookingRequest.
     * GET|HEAD /bookingRequests/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BookingRequest $bookingRequest */
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            return $this->sendError('Booking Request not found');
        }

        return $this->sendResponse($bookingRequest->toArray(), 'Booking Request retrieved successfully');
    }

    /**
     * Update the specified BookingRequest in storage.
     * PUT/PATCH /bookingRequests/{id}
     *
     * @param int $id
     * @param UpdateBookingRequestAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingRequestAPIRequest $request)
    {
        $input = $request->all();

        /** @var BookingRequest $bookingRequest */
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            return $this->sendError('Booking Request not found');
        }

        $bookingRequest = $this->bookingRequestRepository->update($input, $id);

        return $this->sendResponse($bookingRequest->toArray(), 'BookingRequest updated successfully');
    }

    /**
     * Remove the specified BookingRequest from storage.
     * DELETE /bookingRequests/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BookingRequest $bookingRequest */
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            return $this->sendError('Booking Request not found');
        }

        $bookingRequest->delete();

        return $this->sendSuccess('Booking Request deleted successfully');
    }
}
