<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAboutSectionsAPIRequest;
use App\Http\Requests\API\UpdateAboutSectionsAPIRequest;
use App\Models\AboutSections;
use App\Repositories\AboutSectionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AboutSectionsController
 * @package App\Http\Controllers\API
 */

class AboutSectionsAPIController extends AppBaseController
{
    /** @var  AboutSectionsRepository */
    private $aboutSectionsRepository;

    public function __construct(AboutSectionsRepository $aboutSectionsRepo)
    {
        $this->aboutSectionsRepository = $aboutSectionsRepo;
    }

    /**
     * Display a listing of the AboutSections.
     * GET|HEAD /aboutSections
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aboutSections = $this->aboutSectionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($aboutSections->toArray(), 'About Sections retrieved successfully');
    }

    /**
     * Store a newly created AboutSections in storage.
     * POST /aboutSections
     *
     * @param CreateAboutSectionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutSectionsAPIRequest $request)
    {
        $input = $request->all();

        $aboutSections = $this->aboutSectionsRepository->create($input);

        return $this->sendResponse($aboutSections->toArray(), 'About Sections saved successfully');
    }

    /**
     * Display the specified AboutSections.
     * GET|HEAD /aboutSections/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AboutSections $aboutSections */
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            return $this->sendError('About Sections not found');
        }

        return $this->sendResponse($aboutSections->toArray(), 'About Sections retrieved successfully');
    }

    /**
     * Update the specified AboutSections in storage.
     * PUT/PATCH /aboutSections/{id}
     *
     * @param int $id
     * @param UpdateAboutSectionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutSectionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var AboutSections $aboutSections */
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            return $this->sendError('About Sections not found');
        }

        $aboutSections = $this->aboutSectionsRepository->update($input, $id);

        return $this->sendResponse($aboutSections->toArray(), 'AboutSections updated successfully');
    }

    /**
     * Remove the specified AboutSections from storage.
     * DELETE /aboutSections/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AboutSections $aboutSections */
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            return $this->sendError('About Sections not found');
        }

        $aboutSections->delete();

        return $this->sendSuccess('About Sections deleted successfully');
    }
}
