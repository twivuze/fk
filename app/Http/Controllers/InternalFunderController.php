<?php

namespace App\Http\Controllers;

use App\DataTables\InternalFunderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInternalFunderRequest;
use App\Http\Requests\UpdateInternalFunderRequest;
use App\Repositories\InternalFunderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InternalFunderController extends AppBaseController
{
    /** @var  InternalFunderRepository */
    private $internalFunderRepository;

    public function __construct(InternalFunderRepository $internalFunderRepo)
    {
        $this->internalFunderRepository = $internalFunderRepo;
    }

    /**
     * Display a listing of the InternalFunder.
     *
     * @param InternalFunderDataTable $internalFunderDataTable
     * @return Response
     */
    public function index(InternalFunderDataTable $internalFunderDataTable)
    {
        return $internalFunderDataTable->render('internal_funders.index');
    }

    /**
     * Show the form for creating a new InternalFunder.
     *
     * @return Response
     */
    public function create()
    {
        return view('internal_funders.create');
    }

    /**
     * Store a newly created InternalFunder in storage.
     *
     * @param CreateInternalFunderRequest $request
     *
     * @return Response
     */
    public function store(CreateInternalFunderRequest $request)
    {
        $input = $request->all();

        $internalFunder = $this->internalFunderRepository->create($input);

        Flash::success('Internal Funder saved successfully.');

        return redirect(route('internalFunders.index'));
    }

    /**
     * Display the specified InternalFunder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            Flash::error('Internal Funder not found');

            return redirect(route('internalFunders.index'));
        }

        return view('internal_funders.show')->with('internalFunder', $internalFunder);
    }

    /**
     * Show the form for editing the specified InternalFunder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            Flash::error('Internal Funder not found');

            return redirect(route('internalFunders.index'));
        }

        return view('internal_funders.edit')->with('internalFunder', $internalFunder);
    }

    /**
     * Update the specified InternalFunder in storage.
     *
     * @param  int              $id
     * @param UpdateInternalFunderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInternalFunderRequest $request)
    {
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            Flash::error('Internal Funder not found');

            return redirect(route('internalFunders.index'));
        }

        $internalFunder = $this->internalFunderRepository->update($request->all(), $id);

        Flash::success('Internal Funder updated successfully.');

        return redirect(route('internalFunders.index'));
    }

    /**
     * Remove the specified InternalFunder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $internalFunder = $this->internalFunderRepository->find($id);

        if (empty($internalFunder)) {
            Flash::error('Internal Funder not found');

            return redirect(route('internalFunders.index'));
        }

        $this->internalFunderRepository->delete($id);

        Flash::success('Internal Funder deleted successfully.');

        return redirect(route('internalFunders.index'));
    }
}
