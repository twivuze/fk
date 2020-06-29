<?php

namespace App\Http\Controllers;

use App\DataTables\PhotosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePhotosRequest;
use App\Http\Requests\UpdatePhotosRequest;
use App\Repositories\PhotosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class PhotosController extends AppBaseController
{
    /** @var  PhotosRepository */
    private $photosRepository;

    public function __construct(PhotosRepository $photosRepo)
    {
        $this->photosRepository = $photosRepo;
    }

    /**
     * Display a listing of the Photos.
     *
     * @param PhotosDataTable $photosDataTable
     * @return Response
     */
    public function index(PhotosDataTable $photosDataTable)
    {
        return $photosDataTable->render('photos.index');
    }

    /**
     * Show the form for creating a new Photos.
     *
     * @return Response
     */
    public function create()
    {

        $photos = $this->photosRepository->paginate(10);

    
        return view('photos.create')->with('photos', $photos);
    }

    /**
     * Store a newly created Photos in storage.
     *
     * @param CreatePhotosRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
     

        $file=$request->file('file');
        $extension = $file->extension();
        $docName ='gallary-'.time().'.'.$extension;

        $request->file->move(public_path('gallaries/'), $docName);
      
        $this->photosRepository->create([
            'image'            =>  'gallaries/'.$docName
        ]);

        return response()->json(['success'=>$file->getClientOriginalName()]);
    }

    /**
     * Display the specified Photos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            Flash::error('Photos not found');

            return redirect(route('photos.index'));
        }

        return view('photos.show')->with('photos', $photos);
    }

    /**
     * Show the form for editing the specified Photos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            Flash::error('Photos not found');

            return redirect(route('photos.index'));
        }

        return view('photos.edit')->with('photos', $photos);
    }

    /**
     * Update the specified Photos in storage.
     *
     * @param  int              $id
     * @param UpdatePhotosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhotosRequest $request)
    {
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            Flash::error('Photos not found');

            return redirect(route('photos.index'));
        }

        $photos = $this->photosRepository->update($request->all(), $id);

        Flash::success('Photos updated successfully.');

        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified Photos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $photos = $this->photosRepository->find($id);

        if (empty($photos)) {
            Flash::error('Photos not found');

            return redirect(route('photos.create'));
        }

        $this->photosRepository->delete($id);

        Flash::success('Photos deleted successfully.');

        return redirect(route('photos.create'));
    }
}
