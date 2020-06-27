<?php

namespace App\Http\Controllers;

use App\DataTables\StatementDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStatementRequest;
use App\Http\Requests\UpdateStatementRequest;
use App\Repositories\StatementRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StatementController extends AppBaseController
{
    /** @var  StatementRepository */
    private $statementRepository;

    public function __construct(StatementRepository $statementRepo)
    {
        $this->statementRepository = $statementRepo;
    }

    /**
     * Display a listing of the Statement.
     *
     * @param StatementDataTable $statementDataTable
     * @return Response
     */
    public function index(StatementDataTable $statementDataTable)
    {
        return $statementDataTable->render('statements.index');
    }

    /**
     * Show the form for creating a new Statement.
     *
     * @return Response
     */
    public function create()
    {
        return view('statements.create');
    }

    /**
     * Store a newly created Statement in storage.
     *
     * @param CreateStatementRequest $request
     *
     * @return Response
     */
    public function store(CreateStatementRequest $request)
    {
        $input = $request->all();

        $statement = $this->statementRepository->create($input);

        Flash::success('Statement saved successfully.');

        return redirect(route('statements.index'));
    }

    /**
     * Display the specified Statement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        return view('statements.show')->with('statement', $statement);
    }

    /**
     * Show the form for editing the specified Statement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        return view('statements.edit')->with('statement', $statement);
    }

    /**
     * Update the specified Statement in storage.
     *
     * @param  int              $id
     * @param UpdateStatementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatementRequest $request)
    {
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        $statement = $this->statementRepository->update($request->all(), $id);

        Flash::success('Statement updated successfully.');

        return redirect(route('statements.index'));
    }

    /**
     * Remove the specified Statement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            Flash::error('Statement not found');

            return redirect(route('statements.index'));
        }

        $this->statementRepository->delete($id);

        Flash::success('Statement deleted successfully.');

        return redirect(route('statements.index'));
    }
}
