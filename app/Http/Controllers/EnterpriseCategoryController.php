<?php

namespace App\Http\Controllers;

use App\DataTables\EnterpriseCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnterpriseCategoryRequest;
use App\Http\Requests\UpdateEnterpriseCategoryRequest;
use App\Repositories\EnterpriseCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EnterpriseCategoryController extends AppBaseController
{
    /** @var  EnterpriseCategoryRepository */
    private $enterpriseCategoryRepository;

    public function __construct(EnterpriseCategoryRepository $enterpriseCategoryRepo)
    {
        $this->enterpriseCategoryRepository = $enterpriseCategoryRepo;
    }

    /**
     * Display a listing of the EnterpriseCategory.
     *
     * @param EnterpriseCategoryDataTable $enterpriseCategoryDataTable
     * @return Response
     */
    public function index(EnterpriseCategoryDataTable $enterpriseCategoryDataTable)
    {
        return $enterpriseCategoryDataTable->render('enterprise_categories.index');
    }

    /**
     * Show the form for creating a new EnterpriseCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('enterprise_categories.create');
    }

    /**
     * Store a newly created EnterpriseCategory in storage.
     *
     * @param CreateEnterpriseCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateEnterpriseCategoryRequest $request)
    {
        $input = $request->all();

        $enterpriseCategory = $this->enterpriseCategoryRepository->create($input);

        Flash::success('Enterprise Category saved successfully.');

        return redirect(route('enterpriseCategories.index'));
    }

    /**
     * Display the specified EnterpriseCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            Flash::error('Enterprise Category not found');

            return redirect(route('enterpriseCategories.index'));
        }

        return view('enterprise_categories.show')->with('enterpriseCategory', $enterpriseCategory);
    }

    /**
     * Show the form for editing the specified EnterpriseCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            Flash::error('Enterprise Category not found');

            return redirect(route('enterpriseCategories.index'));
        }

        return view('enterprise_categories.edit')->with('enterpriseCategory', $enterpriseCategory);
    }

    /**
     * Update the specified EnterpriseCategory in storage.
     *
     * @param  int              $id
     * @param UpdateEnterpriseCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnterpriseCategoryRequest $request)
    {
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            Flash::error('Enterprise Category not found');

            return redirect(route('enterpriseCategories.index'));
        }

        $enterpriseCategory = $this->enterpriseCategoryRepository->update($request->all(), $id);

        Flash::success('Enterprise Category updated successfully.');

        return redirect(route('enterpriseCategories.index'));
    }

    /**
     * Remove the specified EnterpriseCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enterpriseCategory = $this->enterpriseCategoryRepository->find($id);

        if (empty($enterpriseCategory)) {
            Flash::error('Enterprise Category not found');

            return redirect(route('enterpriseCategories.index'));
        }

        $this->enterpriseCategoryRepository->delete($id);

        Flash::success('Enterprise Category deleted successfully.');

        return redirect(route('enterpriseCategories.index'));
    }
}
