<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubsidiaryCompaniesAPIRequest;
use App\Http\Requests\API\UpdateSubsidiaryCompaniesAPIRequest;
use App\Models\SubsidiaryCompanies;
use App\Repositories\SubsidiaryCompaniesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubsidiaryCompaniesController
 * @package App\Http\Controllers\API
 */

class SubsidiaryCompaniesAPIController extends AppBaseController
{
    /** @var  SubsidiaryCompaniesRepository */
    private $subsidiaryCompaniesRepository;

    public function __construct(SubsidiaryCompaniesRepository $subsidiaryCompaniesRepo)
    {
        $this->subsidiaryCompaniesRepository = $subsidiaryCompaniesRepo;
    }

    /**
     * Display a listing of the SubsidiaryCompanies.
     * GET|HEAD /subsidiaryCompanies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subsidiaryCompanies->toArray(), 'Subsidiary Companies retrieved successfully');
    }

    /**
     * Store a newly created SubsidiaryCompanies in storage.
     * POST /subsidiaryCompanies
     *
     * @param CreateSubsidiaryCompaniesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubsidiaryCompaniesAPIRequest $request)
    {
        $input = $request->all();

        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->create($input);

        return $this->sendResponse($subsidiaryCompanies->toArray(), 'Subsidiary Companies saved successfully');
    }

    /**
     * Display the specified SubsidiaryCompanies.
     * GET|HEAD /subsidiaryCompanies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubsidiaryCompanies $subsidiaryCompanies */
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            return $this->sendError('Subsidiary Companies not found');
        }

        return $this->sendResponse($subsidiaryCompanies->toArray(), 'Subsidiary Companies retrieved successfully');
    }

    /**
     * Update the specified SubsidiaryCompanies in storage.
     * PUT/PATCH /subsidiaryCompanies/{id}
     *
     * @param int $id
     * @param UpdateSubsidiaryCompaniesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubsidiaryCompaniesAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubsidiaryCompanies $subsidiaryCompanies */
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            return $this->sendError('Subsidiary Companies not found');
        }

        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->update($input, $id);

        return $this->sendResponse($subsidiaryCompanies->toArray(), 'SubsidiaryCompanies updated successfully');
    }

    /**
     * Remove the specified SubsidiaryCompanies from storage.
     * DELETE /subsidiaryCompanies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubsidiaryCompanies $subsidiaryCompanies */
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            return $this->sendError('Subsidiary Companies not found');
        }

        $subsidiaryCompanies->delete();

        return $this->sendSuccess('Subsidiary Companies deleted successfully');
    }
}
