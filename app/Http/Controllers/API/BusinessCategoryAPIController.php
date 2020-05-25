<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessCategoryAPIRequest;
use App\Http\Requests\API\UpdateBusinessCategoryAPIRequest;
use App\Models\BusinessCategory;
use App\Repositories\BusinessCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessCategoryController
 * @package App\Http\Controllers\API
 */

class BusinessCategoryAPIController extends AppBaseController
{
    /** @var  BusinessCategoryRepository */
    private $businessCategoryRepository;

    public function __construct(BusinessCategoryRepository $businessCategoryRepo)
    {
        $this->businessCategoryRepository = $businessCategoryRepo;
    }

    /**
     * Display a listing of the BusinessCategory.
     * GET|HEAD /businessCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businessCategories = $this->businessCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businessCategories->toArray(), 'Business Categories retrieved successfully');
    }

    /**
     * Store a newly created BusinessCategory in storage.
     * POST /businessCategories
     *
     * @param CreateBusinessCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessCategoryAPIRequest $request)
    {
        $input = $request->all();

        $businessCategory = $this->businessCategoryRepository->create($input);

        return $this->sendResponse($businessCategory->toArray(), 'Business Category saved successfully');
    }

    /**
     * Display the specified BusinessCategory.
     * GET|HEAD /businessCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BusinessCategory $businessCategory */
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            return $this->sendError('Business Category not found');
        }

        return $this->sendResponse($businessCategory->toArray(), 'Business Category retrieved successfully');
    }

    /**
     * Update the specified BusinessCategory in storage.
     * PUT/PATCH /businessCategories/{id}
     *
     * @param int $id
     * @param UpdateBusinessCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessCategory $businessCategory */
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            return $this->sendError('Business Category not found');
        }

        $businessCategory = $this->businessCategoryRepository->update($input, $id);

        return $this->sendResponse($businessCategory->toArray(), 'BusinessCategory updated successfully');
    }

    /**
     * Remove the specified BusinessCategory from storage.
     * DELETE /businessCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BusinessCategory $businessCategory */
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            return $this->sendError('Business Category not found');
        }

        $businessCategory->delete();

        return $this->sendSuccess('Business Category deleted successfully');
    }
}
