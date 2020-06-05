<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatementAPIRequest;
use App\Http\Requests\API\UpdateStatementAPIRequest;
use App\Models\Statement;
use App\Repositories\StatementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StatementController
 * @package App\Http\Controllers\API
 */

class StatementAPIController extends AppBaseController
{
    /** @var  StatementRepository */
    private $statementRepository;

    public function __construct(StatementRepository $statementRepo)
    {
        $this->statementRepository = $statementRepo;
    }

    /**
     * Display a listing of the Statement.
     * GET|HEAD /statements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $statements = $this->statementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($statements->toArray(), 'Statements retrieved successfully');
    }

    /**
     * Store a newly created Statement in storage.
     * POST /statements
     *
     * @param CreateStatementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatementAPIRequest $request)
    {
        $input = $request->all();

        $statement = $this->statementRepository->create($input);

        return $this->sendResponse($statement->toArray(), 'Statement saved successfully');
    }

    /**
     * Display the specified Statement.
     * GET|HEAD /statements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Statement $statement */
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            return $this->sendError('Statement not found');
        }

        return $this->sendResponse($statement->toArray(), 'Statement retrieved successfully');
    }

    /**
     * Update the specified Statement in storage.
     * PUT/PATCH /statements/{id}
     *
     * @param int $id
     * @param UpdateStatementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Statement $statement */
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            return $this->sendError('Statement not found');
        }

        $statement = $this->statementRepository->update($input, $id);

        return $this->sendResponse($statement->toArray(), 'Statement updated successfully');
    }

    /**
     * Remove the specified Statement from storage.
     * DELETE /statements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Statement $statement */
        $statement = $this->statementRepository->find($id);

        if (empty($statement)) {
            return $this->sendError('Statement not found');
        }

        $statement->delete();

        return $this->sendSuccess('Statement deleted successfully');
    }
}
