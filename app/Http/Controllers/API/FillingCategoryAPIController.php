<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFillingCategoryAPIRequest;
use App\Http\Requests\API\UpdateFillingCategoryAPIRequest;
use App\Models\FillingCategory;
use App\Repositories\FillingCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FillingCategoryController
 * @package App\Http\Controllers\API
 */

class FillingCategoryAPIController extends AppBaseController
{
    /** @var  FillingCategoryRepository */
    private $fillingCategoryRepository;

    public function __construct(FillingCategoryRepository $fillingCategoryRepo)
    {
        $this->fillingCategoryRepository = $fillingCategoryRepo;
    }

    /**
     * Display a listing of the FillingCategory.
     * GET|HEAD /fillingCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fillingCategories = $this->fillingCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($fillingCategories->toArray(), 'Filling Categories retrieved successfully');
    }

    /**
     * Store a newly created FillingCategory in storage.
     * POST /fillingCategories
     *
     * @param CreateFillingCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFillingCategoryAPIRequest $request)
    {
        $input = $request->all();

        $fillingCategory = $this->fillingCategoryRepository->create($input);

        return $this->sendResponse($fillingCategory->toArray(), 'Filling Category saved successfully');
    }

    /**
     * Display the specified FillingCategory.
     * GET|HEAD /fillingCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FillingCategory $fillingCategory */
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            return $this->sendError('Filling Category not found');
        }

        return $this->sendResponse($fillingCategory->toArray(), 'Filling Category retrieved successfully');
    }

    /**
     * Update the specified FillingCategory in storage.
     * PUT/PATCH /fillingCategories/{id}
     *
     * @param int $id
     * @param UpdateFillingCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFillingCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var FillingCategory $fillingCategory */
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            return $this->sendError('Filling Category not found');
        }

        $fillingCategory = $this->fillingCategoryRepository->update($input, $id);

        return $this->sendResponse($fillingCategory->toArray(), 'FillingCategory updated successfully');
    }

    /**
     * Remove the specified FillingCategory from storage.
     * DELETE /fillingCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FillingCategory $fillingCategory */
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            return $this->sendError('Filling Category not found');
        }

        $fillingCategory->delete();

        return $this->sendSuccess('Filling Category deleted successfully');
    }
}
