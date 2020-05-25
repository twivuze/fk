<?php

namespace App\Http\Controllers;

use App\DataTables\BusinessCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessCategoryRequest;
use App\Http\Requests\UpdateBusinessCategoryRequest;
use App\Repositories\BusinessCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusinessCategoryController extends AppBaseController
{
    /** @var  BusinessCategoryRepository */
    private $businessCategoryRepository;

    public function __construct(BusinessCategoryRepository $businessCategoryRepo)
    {
        $this->businessCategoryRepository = $businessCategoryRepo;
    }

    /**
     * Display a listing of the BusinessCategory.
     *
     * @param BusinessCategoryDataTable $businessCategoryDataTable
     * @return Response
     */
    public function index(BusinessCategoryDataTable $businessCategoryDataTable)
    {
        return $businessCategoryDataTable->render('business_categories.index');
    }

    /**
     * Show the form for creating a new BusinessCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('business_categories.create');
    }

    /**
     * Store a newly created BusinessCategory in storage.
     *
     * @param CreateBusinessCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessCategoryRequest $request)
    {
        $input = $request->all();

        $businessCategory = $this->businessCategoryRepository->create($input);

        Flash::success('Business Category saved successfully.');

        return redirect(route('businessCategories.index'));
    }

    /**
     * Display the specified BusinessCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            Flash::error('Business Category not found');

            return redirect(route('businessCategories.index'));
        }

        return view('business_categories.show')->with('businessCategory', $businessCategory);
    }

    /**
     * Show the form for editing the specified BusinessCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            Flash::error('Business Category not found');

            return redirect(route('businessCategories.index'));
        }

        return view('business_categories.edit')->with('businessCategory', $businessCategory);
    }

    /**
     * Update the specified BusinessCategory in storage.
     *
     * @param  int              $id
     * @param UpdateBusinessCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessCategoryRequest $request)
    {
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            Flash::error('Business Category not found');

            return redirect(route('businessCategories.index'));
        }

        $businessCategory = $this->businessCategoryRepository->update($request->all(), $id);

        Flash::success('Business Category updated successfully.');

        return redirect(route('businessCategories.index'));
    }

    /**
     * Remove the specified BusinessCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            Flash::error('Business Category not found');

            return redirect(route('businessCategories.index'));
        }

        $this->businessCategoryRepository->delete($id);

        Flash::success('Business Category deleted successfully.');

        return redirect(route('businessCategories.index'));
    }
}
