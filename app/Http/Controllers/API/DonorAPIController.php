<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDonorAPIRequest;
use App\Http\Requests\API\UpdateDonorAPIRequest;
use App\Models\Donor;
use App\Repositories\DonorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DonorController
 * @package App\Http\Controllers\API
 */

class DonorAPIController extends AppBaseController
{
    /** @var  DonorRepository */
    private $donorRepository;

    public function __construct(DonorRepository $donorRepo)
    {
        $this->donorRepository = $donorRepo;
    }

    /**
     * Display a listing of the Donor.
     * GET|HEAD /donors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $donors = $this->donorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($donors->toArray(), 'Donors retrieved successfully');
    }

    /**
     * Store a newly created Donor in storage.
     * POST /donors
     *
     * @param CreateDonorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDonorAPIRequest $request)
    {
        $input = $request->all();

        $donor = $this->donorRepository->create($input);

        return $this->sendResponse($donor->toArray(), 'Donor saved successfully');
    }

    /**
     * Display the specified Donor.
     * GET|HEAD /donors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Donor $donor */
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            return $this->sendError('Donor not found');
        }

        return $this->sendResponse($donor->toArray(), 'Donor retrieved successfully');
    }

    /**
     * Update the specified Donor in storage.
     * PUT/PATCH /donors/{id}
     *
     * @param int $id
     * @param UpdateDonorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Donor $donor */
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            return $this->sendError('Donor not found');
        }

        $donor = $this->donorRepository->update($input, $id);

        return $this->sendResponse($donor->toArray(), 'Donor updated successfully');
    }

    /**
     * Remove the specified Donor from storage.
     * DELETE /donors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Donor $donor */
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            return $this->sendError('Donor not found');
        }

        $donor->delete();

        return $this->sendSuccess('Donor deleted successfully');
    }
}
