<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnterpriseCategoryAPIRequest;
use App\Http\Requests\API\UpdateEnterpriseCategoryAPIRequest;
use App\Models\EnterpriseCategory;
use App\Repositories\EnterpriseCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnterpriseCategoryController
 * @package App\Http\Controllers\API
 */

class EnterpriseCategoryAPIController extends AppBaseController
{
    /** @var  EnterpriseCategoryRepository */
    private $enterpriseCategoryRepository;

    public function __construct(EnterpriseCategoryRepository $enterpriseCategoryRepo)
    {
        $this->enterpriseCategoryRepository = $enterpriseCategoryRepo;
    }

    /**
     * Display a listing of the EnterpriseCategory.
     * GET|HEAD /enterpriseCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $enterpriseCategories = $this->enterpriseCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($enterpriseCategories->toArray(), 'Enterprise Categories retrieved successfully');
    }

    /**
     * Store a newly created EnterpriseCategory in storage.
     * POST /enterpriseCategories
     *
     * @param CreateEnterpriseCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnterpriseCategoryAPIRequest $request)
    {
        $input = $request->all();

        $enterpriseCategory = $this->enterpriseCategoryRepository->create($input);

        return $this->sendResponse($enterpriseCategory->toArray(), 'Enterprise Category saved successfully');
    }

    /**
     * Display the specified EnterpriseCategory.
     * GET|HEAD /enterpriseCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EnterpriseCategory $enterpriseCategory */
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            return $this->sendError('Enterprise Category not found');
        }

        return $this->sendResponse($enterpriseCategory->toArray(), 'Enterprise Category retrieved successfully');
    }

    /**
     * Update the specified EnterpriseCategory in storage.
     * PUT/PATCH /enterpriseCategories/{id}
     *
     * @param int $id
     * @param UpdateEnterpriseCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnterpriseCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var EnterpriseCategory $enterpriseCategory */
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            return $this->sendError('Enterprise Category not found');
        }

        $enterpriseCategory = $this->enterpriseCategoryRepository->update($input, $id);

        return $this->sendResponse($enterpriseCategory->toArray(), 'EnterpriseCategory updated successfully');
    }

    /**
     * Remove the specified EnterpriseCategory from storage.
     * DELETE /enterpriseCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EnterpriseCategory $enterpriseCategory */
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            return $this->sendError('Enterprise Category not found');
        }

        $enterpriseCategory->delete();

        return $this->sendSuccess('Enterprise Category deleted successfully');
    }
}
