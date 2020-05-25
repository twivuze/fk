<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLenderCategoryAPIRequest;
use App\Http\Requests\API\UpdateLenderCategoryAPIRequest;
use App\Models\LenderCategory;
use App\Repositories\LenderCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LenderCategoryController
 * @package App\Http\Controllers\API
 */

class LenderCategoryAPIController extends AppBaseController
{
    /** @var  LenderCategoryRepository */
    private $lenderCategoryRepository;

    public function __construct(LenderCategoryRepository $lenderCategoryRepo)
    {
        $this->lenderCategoryRepository = $lenderCategoryRepo;
    }

    /**
     * Display a listing of the LenderCategory.
     * GET|HEAD /lenderCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lenderCategories = $this->lenderCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lenderCategories->toArray(), 'Lender Categories retrieved successfully');
    }

    /**
     * Store a newly created LenderCategory in storage.
     * POST /lenderCategories
     *
     * @param CreateLenderCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderCategoryAPIRequest $request)
    {
        $input = $request->all();

        $lenderCategory = $this->lenderCategoryRepository->create($input);

        return $this->sendResponse($lenderCategory->toArray(), 'Lender Category saved successfully');
    }

    /**
     * Display the specified LenderCategory.
     * GET|HEAD /lenderCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LenderCategory $lenderCategory */
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            return $this->sendError('Lender Category not found');
        }

        return $this->sendResponse($lenderCategory->toArray(), 'Lender Category retrieved successfully');
    }

    /**
     * Update the specified LenderCategory in storage.
     * PUT/PATCH /lenderCategories/{id}
     *
     * @param int $id
     * @param UpdateLenderCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLenderCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var LenderCategory $lenderCategory */
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            return $this->sendError('Lender Category not found');
        }

        $lenderCategory = $this->lenderCategoryRepository->update($input, $id);

        return $this->sendResponse($lenderCategory->toArray(), 'LenderCategory updated successfully');
    }

    /**
     * Remove the specified LenderCategory from storage.
     * DELETE /lenderCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LenderCategory $lenderCategory */
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            return $this->sendError('Lender Category not found');
        }

        $lenderCategory->delete();

        return $this->sendSuccess('Lender Category deleted successfully');
    }
}
