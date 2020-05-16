<?php

namespace App\Http\Controllers;

use App\DataTables\AboutContentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAboutContentsRequest;
use App\Http\Requests\UpdateAboutContentsRequest;
use App\Repositories\AboutContentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class AboutContentsController extends AppBaseController
{
    /** @var  AboutContentsRepository */
    private $aboutContentsRepository;

    public function __construct(AboutContentsRepository $aboutContentsRepo)
    {
        $this->aboutContentsRepository = $aboutContentsRepo;
    }

    /**
     * Display a listing of the AboutContents.
     *
     * @param AboutContentsDataTable $aboutContentsDataTable
     * @return Response
     */
    public function index(AboutContentsDataTable $aboutContentsDataTable)
    {
        return $aboutContentsDataTable->render('about_contents.index');
    }

    /**
     * Show the form for creating a new AboutContents.
     *
     * @return Response
     */
    public function create()
    {

        $aboutContents = $this->aboutContentsRepository->paginate(10);

    
        return view('about_contents.create') ->with('aboutContents', $aboutContents);
    }

    /**
     * Store a newly created AboutContents in storage.
     *
     * @param CreateAboutContentsRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $file=$request->file('file');
        $extension = $file->extension();
        $docName ='gallary-'.time().'.'.$extension;

        $request->file->move(public_path('gallaries/'), $docName);
      
        $this->aboutContentsRepository->create([
            'image'            =>  'gallaries/'.$docName,
            'about_section_id' => $input['about_section_id']
        ]);

        return response()->json(['success'=>$file->getClientOriginalName()]);
    }

    /**
     * Display the specified AboutContents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            Flash::error('About Contents not found');

            return redirect(route('aboutContents.index'));
        }

        return view('about_contents.show')->with('aboutContents', $aboutContents);
    }

    /**
     * Show the form for editing the specified AboutContents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            Flash::error('About Contents not found');

            return redirect(route('aboutContents.index'));
        }

        return view('about_contents.edit')->with('aboutContents', $aboutContents);
    }

    /**
     * Update the specified AboutContents in storage.
     *
     * @param  int              $id
     * @param UpdateAboutContentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutContentsRequest $request)
    {
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            Flash::error('About Contents not found');

            return redirect(route('aboutContents.index'));
        }

        $aboutContents = $this->aboutContentsRepository->update($request->all(), $id);

        Flash::success('About Contents updated successfully.');

        return redirect(route('aboutContents.index'));
    }

    /**
     * Remove the specified AboutContents from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aboutContents = $this->aboutContentsRepository->find($id);

        if (empty($aboutContents)) {
            Flash::error('About Contents not found');

            return redirect(route('aboutContents.create'));
        }

        $this->aboutContentsRepository->delete($id);

        Flash::success('About Contents deleted successfully.');

        return redirect(route('aboutContents.create'));
    }
}
