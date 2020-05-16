<?php

namespace App\Http\Controllers;

use App\DataTables\AboutSectionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAboutSectionsRequest;
use App\Http\Requests\UpdateAboutSectionsRequest;
use App\Repositories\AboutSectionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AboutSectionsController extends AppBaseController
{
    /** @var  AboutSectionsRepository */
    private $aboutSectionsRepository;

    public function __construct(AboutSectionsRepository $aboutSectionsRepo)
    {
        $this->aboutSectionsRepository = $aboutSectionsRepo;
    }

    /**
     * Display a listing of the AboutSections.
     *
     * @param AboutSectionsDataTable $aboutSectionsDataTable
     * @return Response
     */
    public function index(AboutSectionsDataTable $aboutSectionsDataTable)
    {
        return $aboutSectionsDataTable->render('about_sections.index');
    }

    /**
     * Show the form for creating a new AboutSections.
     *
     * @return Response
     */
    public function create()
    {
        return view('about_sections.create');
    }

    /**
     * Store a newly created AboutSections in storage.
     *
     * @param CreateAboutSectionsRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutSectionsRequest $request)
    {
        $input = $request->all();

        $aboutSections = $this->aboutSectionsRepository->create($input);

        Flash::success('About Sections saved successfully.');

        return redirect(route('aboutSections.index'));
    }

    /**
     * Display the specified AboutSections.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            Flash::error('About Sections not found');

            return redirect(route('aboutSections.index'));
        }

        return view('about_sections.show')->with('aboutSections', $aboutSections);
    }

    /**
     * Show the form for editing the specified AboutSections.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            Flash::error('About Sections not found');

            return redirect(route('aboutSections.index'));
        }

        return view('about_sections.edit')->with('aboutSections', $aboutSections);
    }

    /**
     * Update the specified AboutSections in storage.
     *
     * @param  int              $id
     * @param UpdateAboutSectionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutSectionsRequest $request)
    {
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            Flash::error('About Sections not found');

            return redirect(route('aboutSections.index'));
        }

        $aboutSections = $this->aboutSectionsRepository->update($request->all(), $id);

        Flash::success('About Sections updated successfully.');

        return redirect(route('aboutSections.index'));
    }

    /**
     * Remove the specified AboutSections from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aboutSections = $this->aboutSectionsRepository->find($id);

        if (empty($aboutSections)) {
            Flash::error('About Sections not found');

            return redirect(route('aboutSections.index'));
        }

        $this->aboutSectionsRepository->delete($id);

        Flash::success('About Sections deleted successfully.');

        return redirect(route('aboutSections.index'));
    }
}
