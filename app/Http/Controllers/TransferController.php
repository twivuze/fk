<?php

namespace App\Http\Controllers;

use App\DataTables\TransferDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Repositories\TransferRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TransferController extends AppBaseController
{
    /** @var  TransferRepository */
    private $transferRepository;

    public function __construct(TransferRepository $transferRepo)
    {
        $this->transferRepository = $transferRepo;
    }

    /**
     * Display a listing of the Transfer.
     *
     * @param TransferDataTable $transferDataTable
     * @return Response
     */
    public function index(TransferDataTable $transferDataTable)
    {
        return $transferDataTable->render('transfers.index');
    }

    /**
     * Show the form for creating a new Transfer.
     *
     * @return Response
     */
    public function create()
    {
        return view('transfers.create');
    }

    /**
     * Store a newly created Transfer in storage.
     *
     * @param CreateTransferRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferRequest $request)
    {
        $input = $request->all();

        $transfer = $this->transferRepository->create($input);

        Flash::success('Transfer saved successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Display the specified Transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.show')->with('transfer', $transfer);
    }

    /**
     * Show the form for editing the specified Transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.edit')->with('transfer', $transfer);
    }

    /**
     * Update the specified Transfer in storage.
     *
     * @param  int              $id
     * @param UpdateTransferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferRequest $request)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        $transfer = $this->transferRepository->update($request->all(), $id);

        Flash::success('Transfer updated successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Remove the specified Transfer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        $this->transferRepository->delete($id);

        Flash::success('Transfer deleted successfully.');

        return redirect(route('transfers.index'));
    }
}
