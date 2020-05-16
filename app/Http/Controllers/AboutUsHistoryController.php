<?php

namespace App\Http\Controllers;

use App\DataTables\AboutUsHistoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAboutUsHistoryRequest;
use App\Http\Requests\UpdateAboutUsHistoryRequest;
use App\Repositories\AboutUsHistoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AboutUsHistoryController extends AppBaseController
{
    /** @var  AboutUsHistoryRepository */
    private $aboutUsHistoryRepository;

    public function __construct(AboutUsHistoryRepository $aboutUsHistoryRepo)
    {
        $this->aboutUsHistoryRepository = $aboutUsHistoryRepo;
    }

    /**
     * Display a listing of the AboutUsHistory.
     *
     * @param AboutUsHistoryDataTable $aboutUsHistoryDataTable
     * @return Response
     */
    public function index(AboutUsHistoryDataTable $aboutUsHistoryDataTable)
    {
        return $aboutUsHistoryDataTable->render('about_us_histories.index');
    }

    /**
     * Show the form for creating a new AboutUsHistory.
     *
     * @return Response
     */
    public function create()
    {
        return view('about_us_histories.create');
    }

    /**
     * Store a newly created AboutUsHistory in storage.
     *
     * @param CreateAboutUsHistoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutUsHistoryRequest $request)
    {
        $input = $request->all();

        if(!$request->file('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $image = $this->updateImage($request);  
        }
        
        $input['image']=$image;

        $aboutUsHistory = $this->aboutUsHistoryRepository->create($input);

        Flash::success('About Us History saved successfully.');

        return redirect(route('aboutUsHistories.index'));
    }

    /**
     * Display the specified AboutUsHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            Flash::error('About Us History not found');

            return redirect(route('aboutUsHistories.index'));
        }

        return view('about_us_histories.show')->with('aboutUsHistory', $aboutUsHistory);
    }

    /**
     * Show the form for editing the specified AboutUsHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            Flash::error('About Us History not found');

            return redirect(route('aboutUsHistories.index'));
        }

        return view('about_us_histories.edit')->with('aboutUsHistory', $aboutUsHistory);
    }

    /**
     * Update the specified AboutUsHistory in storage.
     *
     * @param  int              $id
     * @param UpdateAboutUsHistoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutUsHistoryRequest $request)
    {
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            Flash::error('About Us History not found');

            return redirect(route('aboutUsHistories.index'));
        }

        $input = $request->all();

        if($request->file('image')){
            $image = $this->updateImage($request);  
            $input['image']=$image;
        }else{
            $input['image']=$aboutUsHistory->image; 
        }

        $aboutUsHistory = $this->aboutUsHistoryRepository->update($input, $id);

        Flash::success('About Us History updated successfully.');

        return redirect(route('aboutUsHistories.index'));
    }

    /**
     * Remove the specified AboutUsHistory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aboutUsHistory = $this->aboutUsHistoryRepository->find($id);

        if (empty($aboutUsHistory)) {
            Flash::error('About Us History not found');

            return redirect(route('aboutUsHistories.index'));
        }

        $this->aboutUsHistoryRepository->delete($id);

        Flash::success('About Us History deleted successfully.');

        return redirect(route('aboutUsHistories.index'));
    }
}
