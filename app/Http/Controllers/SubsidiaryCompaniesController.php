<?php

namespace App\Http\Controllers;

use App\DataTables\SubsidiaryCompaniesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubsidiaryCompaniesRequest;
use App\Http\Requests\UpdateSubsidiaryCompaniesRequest;
use App\Repositories\SubsidiaryCompaniesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubsidiaryCompaniesController extends AppBaseController
{
    /** @var  SubsidiaryCompaniesRepository */
    private $subsidiaryCompaniesRepository;

    public function __construct(SubsidiaryCompaniesRepository $subsidiaryCompaniesRepo)
    {
        $this->subsidiaryCompaniesRepository = $subsidiaryCompaniesRepo;
    }

    /**
     * Display a listing of the SubsidiaryCompanies.
     *
     * @param SubsidiaryCompaniesDataTable $subsidiaryCompaniesDataTable
     * @return Response
     */
    public function index(SubsidiaryCompaniesDataTable $subsidiaryCompaniesDataTable)
    {
        return $subsidiaryCompaniesDataTable->render('subsidiary_companies.index');
    }

    /**
     * Show the form for creating a new SubsidiaryCompanies.
     *
     * @return Response
     */
    public function create()
    {
        return view('subsidiary_companies.create');
    }

    /**
     * Store a newly created SubsidiaryCompanies in storage.
     *
     * @param CreateSubsidiaryCompaniesRequest $request
     *
     * @return Response
     */
    public function store(CreateSubsidiaryCompaniesRequest $request)
    {
        $input = $request->all();

        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->create($input);

        Flash::success('Subsidiary Companies saved successfully.');

        return redirect(route('subsidiaryCompanies.index'));
    }

    /**
     * Display the specified SubsidiaryCompanies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            Flash::error('Subsidiary Companies not found');

            return redirect(route('subsidiaryCompanies.index'));
        }

        return view('subsidiary_companies.show')->with('subsidiaryCompanies', $subsidiaryCompanies);
    }

    /**
     * Show the form for editing the specified SubsidiaryCompanies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            Flash::error('Subsidiary Companies not found');

            return redirect(route('subsidiaryCompanies.index'));
        }

        return view('subsidiary_companies.edit')->with('subsidiaryCompanies', $subsidiaryCompanies);
    }

    /**
     * Update the specified SubsidiaryCompanies in storage.
     *
     * @param  int              $id
     * @param UpdateSubsidiaryCompaniesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubsidiaryCompaniesRequest $request)
    {
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            Flash::error('Subsidiary Companies not found');

            return redirect(route('subsidiaryCompanies.index'));
        }

        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->update($request->all(), $id);

        Flash::success('Subsidiary Companies updated successfully.');

        return redirect(route('subsidiaryCompanies.index'));
    }

    /**
     * Remove the specified SubsidiaryCompanies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subsidiaryCompanies = $this->subsidiaryCompaniesRepository->find($id);

        if (empty($subsidiaryCompanies)) {
            Flash::error('Subsidiary Companies not found');

            return redirect(route('subsidiaryCompanies.index'));
        }

        $this->subsidiaryCompaniesRepository->delete($id);

        Flash::success('Subsidiary Companies deleted successfully.');

        return redirect(route('subsidiaryCompanies.index'));
    }
}
