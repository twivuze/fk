<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLettersAPIRequest;
use App\Http\Requests\API\UpdateLettersAPIRequest;
use App\Models\Letters;
use App\Repositories\LettersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LettersController
 * @package App\Http\Controllers\API
 */

class LettersAPIController extends AppBaseController
{
    /** @var  LettersRepository */
    private $lettersRepository;

    public function __construct(LettersRepository $lettersRepo)
    {
        $this->lettersRepository = $lettersRepo;
    }

    /**
     * Display a listing of the Letters.
     * GET|HEAD /letters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $letters = $this->lettersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($letters->toArray(), 'Letters retrieved successfully');
    }

    /**
     * Store a newly created Letters in storage.
     * POST /letters
     *
     * @param CreateLettersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLettersAPIRequest $request)
    {
        $input = $request->all();

        $letters = $this->lettersRepository->create($input);

        return $this->sendResponse($letters->toArray(), 'Letters saved successfully');
    }

    /**
     * Display the specified Letters.
     * GET|HEAD /letters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Letters $letters */
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            return $this->sendError('Letters not found');
        }

        return $this->sendResponse($letters->toArray(), 'Letters retrieved successfully');
    }

    /**
     * Update the specified Letters in storage.
     * PUT/PATCH /letters/{id}
     *
     * @param int $id
     * @param UpdateLettersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLettersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Letters $letters */
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            return $this->sendError('Letters not found');
        }

        $letters = $this->lettersRepository->update($input, $id);

        return $this->sendResponse($letters->toArray(), 'Letters updated successfully');
    }

    /**
     * Remove the specified Letters from storage.
     * DELETE /letters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Letters $letters */
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            return $this->sendError('Letters not found');
        }

        $letters->delete();

        return $this->sendSuccess('Letters deleted successfully');
    }
}
