<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFillingDocumentAPIRequest;
use App\Http\Requests\API\UpdateFillingDocumentAPIRequest;
use App\Models\FillingDocument;
use App\Repositories\FillingDocumentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FillingDocumentController
 * @package App\Http\Controllers\API
 */

class FillingDocumentAPIController extends AppBaseController
{
    /** @var  FillingDocumentRepository */
    private $fillingDocumentRepository;

    public function __construct(FillingDocumentRepository $fillingDocumentRepo)
    {
        $this->fillingDocumentRepository = $fillingDocumentRepo;
    }

    /**
     * Display a listing of the FillingDocument.
     * GET|HEAD /fillingDocuments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fillingDocuments = $this->fillingDocumentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($fillingDocuments->toArray(), 'Filling Documents retrieved successfully');
    }

    /**
     * Store a newly created FillingDocument in storage.
     * POST /fillingDocuments
     *
     * @param CreateFillingDocumentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFillingDocumentAPIRequest $request)
    {
        $input = $request->all();

        $fillingDocument = $this->fillingDocumentRepository->create($input);

        return $this->sendResponse($fillingDocument->toArray(), 'Filling Document saved successfully');
    }

    /**
     * Display the specified FillingDocument.
     * GET|HEAD /fillingDocuments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FillingDocument $fillingDocument */
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            return $this->sendError('Filling Document not found');
        }

        return $this->sendResponse($fillingDocument->toArray(), 'Filling Document retrieved successfully');
    }

    /**
     * Update the specified FillingDocument in storage.
     * PUT/PATCH /fillingDocuments/{id}
     *
     * @param int $id
     * @param UpdateFillingDocumentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFillingDocumentAPIRequest $request)
    {
        $input = $request->all();

        /** @var FillingDocument $fillingDocument */
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            return $this->sendError('Filling Document not found');
        }

        $fillingDocument = $this->fillingDocumentRepository->update($input, $id);

        return $this->sendResponse($fillingDocument->toArray(), 'FillingDocument updated successfully');
    }

    /**
     * Remove the specified FillingDocument from storage.
     * DELETE /fillingDocuments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FillingDocument $fillingDocument */
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            return $this->sendError('Filling Document not found');
        }

        $fillingDocument->delete();

        return $this->sendSuccess('Filling Document deleted successfully');
    }
}
