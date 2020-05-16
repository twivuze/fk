<?php

namespace App\Http\Controllers;

use App\DataTables\VideosLinksDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVideosLinksRequest;
use App\Http\Requests\UpdateVideosLinksRequest;
use App\Repositories\VideosLinksRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VideosLinksController extends AppBaseController
{
    /** @var  VideosLinksRepository */
    private $videosLinksRepository;

    public function __construct(VideosLinksRepository $videosLinksRepo)
    {
        $this->videosLinksRepository = $videosLinksRepo;
    }

    /**
     * Display a listing of the VideosLinks.
     *
     * @param VideosLinksDataTable $videosLinksDataTable
     * @return Response
     */
    public function index(VideosLinksDataTable $videosLinksDataTable)
    {
        return $videosLinksDataTable->render('videos_links.index');
    }

    /**
     * Show the form for creating a new VideosLinks.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos_links.create');
    }

    /**
     * Store a newly created VideosLinks in storage.
     *
     * @param CreateVideosLinksRequest $request
     *
     * @return Response
     */
    public function store(CreateVideosLinksRequest $request)
    {
        $input = $request->all();

        $videosLinks = $this->videosLinksRepository->create($input);

        Flash::success('Videos Links saved successfully.');

        return redirect(route('videosLinks.index'));
    }

    /**
     * Display the specified VideosLinks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            Flash::error('Videos Links not found');

            return redirect(route('videosLinks.index'));
        }

        return view('videos_links.show')->with('videosLinks', $videosLinks);
    }

    /**
     * Show the form for editing the specified VideosLinks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            Flash::error('Videos Links not found');

            return redirect(route('videosLinks.index'));
        }

        return view('videos_links.edit')->with('videosLinks', $videosLinks);
    }

    /**
     * Update the specified VideosLinks in storage.
     *
     * @param  int              $id
     * @param UpdateVideosLinksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideosLinksRequest $request)
    {
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            Flash::error('Videos Links not found');

            return redirect(route('videosLinks.index'));
        }

        $videosLinks = $this->videosLinksRepository->update($request->all(), $id);

        Flash::success('Videos Links updated successfully.');

        return redirect(route('videosLinks.index'));
    }

    /**
     * Remove the specified VideosLinks from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $videosLinks = $this->videosLinksRepository->find($id);

        if (empty($videosLinks)) {
            Flash::error('Videos Links not found');

            return redirect(route('videosLinks.index'));
        }

        $this->videosLinksRepository->delete($id);

        Flash::success('Videos Links deleted successfully.');

        return redirect(route('videosLinks.index'));
    }
}
