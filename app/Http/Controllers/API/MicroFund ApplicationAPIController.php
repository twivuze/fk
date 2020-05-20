<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMicroFund ApplicationAPIRequest;
use App\Http\Requests\API\UpdateMicroFund ApplicationAPIRequest;
use App\Models\MicroFund Application;
use App\Repositories\MicroFund ApplicationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MicroFund ApplicationController
 * @package App\Http\Controllers\API
 */

class MicroFund ApplicationAPIController extends AppBaseController
{
    /** @var  MicroFund ApplicationRepository */
    private $microFundApplicationRepository;

    public function __construct(MicroFund ApplicationRepository $microFundApplicationRepo)
    {
        $this->microFundApplicationRepository = $microFundApplicationRepo;
    }

    /**
     * Display a listing of the MicroFund Application.
     * GET|HEAD /microFundApplications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $microFundApplications = $this->microFundApplicationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($microFundApplications->toArray(), 'Micro Fund Applications retrieved successfully');
    }

    /**
     * Store a newly created MicroFund Application in storage.
     * POST /microFundApplications
     *
     * @param CreateMicroFund ApplicationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMicroFund ApplicationAPIRequest $request)
    {
        $input = $request->all();

        $microFundApplication = $this->microFundApplicationRepository->create($input);

        return $this->sendResponse($microFundApplication->toArray(), 'Micro Fund Application saved successfully');
    }

    /**
     * Display the specified MicroFund Application.
     * GET|HEAD /microFundApplications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MicroFund Application $microFundApplication */
        $microFundApplication = $this->microFundApplicationRepository->find($id);

        if (empty($microFundApplication)) {
            return $this->sendError('Micro Fund Application not found');
        }

        return $this->sendResponse($microFundApplication->toArray(), 'Micro Fund Application retrieved successfully');
    }

    /**
     * Update the specified MicroFund Application in storage.
     * PUT/PATCH /microFundApplications/{id}
     *
     * @param int $id
     * @param UpdateMicroFund ApplicationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMicroFund ApplicationAPIRequest $request)
    {
        $input = $request->all();

        /** @var MicroFund Application $microFundApplication */
        $microFundApplication = $this->microFundApplicationRepository->find($id);

        if (empty($microFundApplication)) {
            return $this->sendError('Micro Fund Application not found');
        }

        $microFundApplication = $this->microFundApplicationRepository->update($input, $id);

        return $this->sendResponse($microFundApplication->toArray(), 'MicroFund Application updated successfully');
    }

    /**
     * Remove the specified MicroFund Application from storage.
     * DELETE /microFundApplications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MicroFund Application $microFundApplication */
        $microFundApplication = $this->microFundApplicationRepository->find($id);

        if (empty($microFundApplication)) {
            return $this->sendError('Micro Fund Application not found');
        }

        $microFundApplication->delete();

        return $this->sendSuccess('Micro Fund Application deleted successfully');
    }
}
