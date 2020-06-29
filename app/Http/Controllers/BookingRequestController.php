<?php

namespace App\Http\Controllers;

use App\DataTables\BookingRequestDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBookingRequestRequest;
use App\Http\Requests\UpdateBookingRequestRequest;
use App\Repositories\BookingRequestRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Mail\BookingRequestMail;
use Illuminate\Support\Facades\Mail;

class BookingRequestController extends AppBaseController
{
    /** @var  BookingRequestRepository */
    private $bookingRequestRepository;

    public function __construct(BookingRequestRepository $bookingRequestRepo)
    {
        $this->bookingRequestRepository = $bookingRequestRepo;
    }

    /**
     * Display a listing of the BookingRequest.
     *
     * @param BookingRequestDataTable $bookingRequestDataTable
     * @return Response
     */
    public function index(BookingRequestDataTable $bookingRequestDataTable)
    {
        return $bookingRequestDataTable->render('booking_requests.index');
    }

    /**
     * Show the form for creating a new BookingRequest.
     *
     * @return Response
     */
    public function create()
    {
        return view('booking_requests.create');
    }

    /**
     * Store a newly created BookingRequest in storage.
     *
     * @param CreateBookingRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingRequestRequest $request)
    {
        $input = $request->all();

        $bookingRequest = $this->bookingRequestRepository->create($input);

        Flash::success('Booking Request saved successfully.');

        if( isset($input['email']) ){
            Mail::to([$bookingRequest->email,'rubadukafrank@gmail.com'])->send(new BookingRequestMail($bookingRequest));
        }


    if(\Auth::check()){ 
        return redirect(route('bookingRequests.index'));
    }else{
        return redirect('/booking-request-submitted');  
    }

    }

    /**
     * Display the specified BookingRequest.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            Flash::error('Booking Request not found');

            return redirect(route('bookingRequests.index'));
        }

        return view('booking_requests.show')->with('bookingRequest', $bookingRequest);
    }

    /**
     * Show the form for editing the specified BookingRequest.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            Flash::error('Booking Request not found');

            return redirect(route('bookingRequests.index'));
        }

        return view('booking_requests.edit')->with('bookingRequest', $bookingRequest);
    }

    /**
     * Update the specified BookingRequest in storage.
     *
     * @param  int              $id
     * @param UpdateBookingRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingRequestRequest $request)
    {
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            Flash::error('Booking Request not found');

            return redirect(route('bookingRequests.index'));
        }

        $bookingRequest = $this->bookingRequestRepository->update($request->all(), $id);

        Flash::success('Booking Request updated successfully.');

        return redirect(route('bookingRequests.index'));
    }

    /**
     * Remove the specified BookingRequest from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bookingRequest = $this->bookingRequestRepository->find($id);

        if (empty($bookingRequest)) {
            Flash::error('Booking Request not found');

            return redirect(route('bookingRequests.index'));
        }

        $this->bookingRequestRepository->delete($id);

        Flash::success('Booking Request deleted successfully.');

        return redirect(route('bookingRequests.index'));
    }
}
