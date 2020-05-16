<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAboutContentsAPIRequest;
use App\Http\Requests\API\UpdateAboutContentsAPIRequest;
use App\Models\AboutContents;
use App\Repositories\AboutContentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AboutContentsController
 * @package App\Http\Controllers\API
 */

class AboutContentsAPIController extends AppBaseController
{
    /** @var  AboutContentsRepository */
    private $aboutContentsRepository;

    public function __construct(AboutContentsRepository $aboutContentsRepo)
    {
        $this->aboutContentsRepository = $aboutContentsRepo;
    }

    /**
     * Display a listing of the AboutContents.
     * GET|HEAD /aboutContents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aboutContents = $this->aboutContentsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($aboutContents->toArray(), 'About Contents retrieved successfully');
    }

    /**
     * Store a newly created AboutContents in storage.
     * POST /aboutContents
     *
     * @param CreateAboutContentsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutContentsAPIRequest $request)
    {
        $input = $request->all();

        $aboutContents = $this->aboutContentsRepository->create($input);

        return $this->sendResponse($aboutContents->toArray(), 'About Contents saved successfully');
    }

    /**
     * Display the specified AboutContents.
     * GET|HEAD /aboutContents/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AboutContents $aboutContents */
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            return $this->sendError('About Contents not found');
        }

        return $this->sendResponse($aboutContents->toArray(), 'About Contents retrieved successfully');
    }

    /**
     * Update the specified AboutContents in storage.
     * PUT/PATCH /aboutContents/{id}
     *
     * @param int $id
     * @param UpdateAboutContentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutContentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var AboutContents $aboutContents */
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            return $this->sendError('About Contents not found');
        }

        $aboutContents = $this->aboutContentsRepository->update($input, $id);

        return $this->sendResponse($aboutContents->toArray(), 'AboutContents updated successfully');
    }

    /**
     * Remove the specified AboutContents from storage.
     * DELETE /aboutContents/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AboutContents $aboutContents */
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            return $this->sendError('About Contents not found');
        }

        $aboutContents->delete();

        return $this->sendSuccess('About Contents deleted successfully');
    }
}
