<?php

namespace App\Http\Controllers;

use App\DataTables\RepaymentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRepaymentRequest;
use App\Http\Requests\UpdateRepaymentRequest;
use App\Repositories\RepaymentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RepaymentController extends AppBaseController
{
    /** @var  RepaymentRepository */
    private $repaymentRepository;

    public function __construct(RepaymentRepository $repaymentRepo)
    {
        $this->repaymentRepository = $repaymentRepo;
    }

    /**
     * Display a listing of the Repayment.
     *
     * @param RepaymentDataTable $repaymentDataTable
     * @return Response
     */
    public function index(RepaymentDataTable $repaymentDataTable)
    {
        return $repaymentDataTable->render('repayments.index');
    }

    /**
     * Show the form for creating a new Repayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('repayments.create');
    }

    /**
     * Store a newly created Repayment in storage.
     *
     * @param CreateRepaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateRepaymentRequest $request)
    {
        $input = $request->all();

        $repayment = $this->repaymentRepository->create($input);

        Flash::success('Repayment saved successfully.');

        return redirect(route('repayments.index'));
    }

    /**
     * Display the specified Repayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        return view('repayments.show')->with('repayment', $repayment);
    }

    /**
     * Show the form for editing the specified Repayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        return view('repayments.edit')->with('repayment', $repayment);
    }

    /**
     * Update the specified Repayment in storage.
     *
     * @param  int              $id
     * @param UpdateRepaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepaymentRequest $request)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        $repayment = $this->repaymentRepository->update($request->all(), $id);

        Flash::success('Repayment updated successfully.');

        return redirect(route('repayments.index'));
    }

    /**
     * Remove the specified Repayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $repayment = $this->repaymentRepository->find($id);

        if (empty($repayment)) {
            Flash::error('Repayment not found');

            return redirect(route('repayments.index'));
        }

        $this->repaymentRepository->delete($id);

        Flash::success('Repayment deleted successfully.');

        return redirect(route('repayments.index'));
    }
}
