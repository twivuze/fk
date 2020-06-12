<?php

namespace App\Http\Controllers;

use App\DataTables\VistorsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVistorsRequest;
use App\Http\Requests\UpdateVistorsRequest;
use App\Repositories\VistorsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VistorsController extends AppBaseController
{
    /** @var  VistorsRepository */
    private $vistorsRepository;

    public function __construct(VistorsRepository $vistorsRepo)
    {
        $this->vistorsRepository = $vistorsRepo;
    }

    /**
     * Display a listing of the Vistors.
     *
     * @param VistorsDataTable $vistorsDataTable
     * @return Response
     */
    public function index(VistorsDataTable $vistorsDataTable)
    {
        return $vistorsDataTable->render('vistors.index');
    }

    /**
     * Show the form for creating a new Vistors.
     *
     * @return Response
     */
    public function create()
    {
        return view('vistors.create');
    }

    /**
     * Store a newly created Vistors in storage.
     *
     * @param CreateVistorsRequest $request
     *
     * @return Response
     */
    public function store(CreateVistorsRequest $request)
    {
        $input = $request->all();

        $vistors = $this->vistorsRepository->create($input);

        Flash::success('Vistors saved successfully.');

        return redirect(route('vistors.index'));
    }

    /**
     * Display the specified Vistors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            Flash::error('Vistors not found');

            return redirect(route('vistors.index'));
        }

        return view('vistors.show')->with('vistors', $vistors);
    }

    /**
     * Show the form for editing the specified Vistors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            Flash::error('Vistors not found');

            return redirect(route('vistors.index'));
        }

        return view('vistors.edit')->with('vistors', $vistors);
    }

    /**
     * Update the specified Vistors in storage.
     *
     * @param  int              $id
     * @param UpdateVistorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVistorsRequest $request)
    {
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            Flash::error('Vistors not found');

            return redirect(route('vistors.index'));
        }

        $vistors = $this->vistorsRepository->update($request->all(), $id);

        Flash::success('Vistors updated successfully.');

        return redirect(route('vistors.index'));
    }

    /**
     * Remove the specified Vistors from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vistors = $this->vistorsRepository->find($id);

        if (empty($vistors)) {
            Flash::error('Vistors not found');

            return redirect(route('vistors.index'));
        }

        $this->vistorsRepository->delete($id);

        Flash::success('Vistors deleted successfully.');

        return redirect(route('vistors.index'));
    }
}
