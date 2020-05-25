<?php

namespace App\Http\Controllers;

use App\DataTables\LenderCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLenderCategoryRequest;
use App\Http\Requests\UpdateLenderCategoryRequest;
use App\Repositories\LenderCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LenderCategoryController extends AppBaseController
{
    /** @var  LenderCategoryRepository */
    private $lenderCategoryRepository;

    public function __construct(LenderCategoryRepository $lenderCategoryRepo)
    {
        $this->lenderCategoryRepository = $lenderCategoryRepo;
    }

    /**
     * Display a listing of the LenderCategory.
     *
     * @param LenderCategoryDataTable $lenderCategoryDataTable
     * @return Response
     */
    public function index(LenderCategoryDataTable $lenderCategoryDataTable)
    {
        return $lenderCategoryDataTable->render('lender_categories.index');
    }

    /**
     * Show the form for creating a new LenderCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('lender_categories.create');
    }

    /**
     * Store a newly created LenderCategory in storage.
     *
     * @param CreateLenderCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateLenderCategoryRequest $request)
    {
        $input = $request->all();

        $lenderCategory = $this->lenderCategoryRepository->create($input);

        Flash::success('Lender Category saved successfully.');

        return redirect(route('lenderCategories.index'));
    }

    /**
     * Display the specified LenderCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            Flash::error('Lender Category not found');

            return redirect(route('lenderCategories.index'));
        }

        return view('lender_categories.show')->with('lenderCategory', $lenderCategory);
    }

    /**
     * Show the form for editing the specified LenderCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            Flash::error('Lender Category not found');

            return redirect(route('lenderCategories.index'));
        }

        return view('lender_categories.edit')->with('lenderCategory', $lenderCategory);
    }

    /**
     * Update the specified LenderCategory in storage.
     *
     * @param  int              $id
     * @param UpdateLenderCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLenderCategoryRequest $request)
    {
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            Flash::error('Lender Category not found');

            return redirect(route('lenderCategories.index'));
        }

        $lenderCategory = $this->lenderCategoryRepository->update($request->all(), $id);

        Flash::success('Lender Category updated successfully.');

        return redirect(route('lenderCategories.index'));
    }

    /**
     * Remove the specified LenderCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lenderCategory = $this->lenderCategoryRepository->find($id);

        if (empty($lenderCategory)) {
            Flash::error('Lender Category not found');

            return redirect(route('lenderCategories.index'));
        }

        $this->lenderCategoryRepository->delete($id);

        Flash::success('Lender Category deleted successfully.');

        return redirect(route('lenderCategories.index'));
    }
}
