<?php

namespace App\Http\Controllers;

use App\DataTables\FillingDocumentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFillingDocumentRequest;
use App\Http\Requests\UpdateFillingDocumentRequest;
use App\Repositories\FillingDocumentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class FillingDocumentController extends AppBaseController
{
    /** @var  FillingDocumentRepository */
    private $fillingDocumentRepository;

    public function __construct(FillingDocumentRepository $fillingDocumentRepo)
    {
        $this->fillingDocumentRepository = $fillingDocumentRepo;
    }

    /**
     * Display a listing of the FillingDocument.
     *
     * @param FillingDocumentDataTable $fillingDocumentDataTable
     * @return Response
     */
    public function index(FillingDocumentDataTable $fillingDocumentDataTable)
    {
        return $fillingDocumentDataTable->render('filling_documents.index');
    }

    /**
     * Show the form for creating a new FillingDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('filling_documents.create');
    }

    /**
     * Store a newly created FillingDocument in storage.
     *
     * @param CreateFillingDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateFillingDocumentRequest $request)
    {
        $input = $request->all();

        if(!$request->file('file_name')){
            $request->validate([
                'file_name' => "required|mimes:pdf",
            ]);
          
        }else{
        $file2=$request->file('file_name');
        $docName2 ='file_name-'.time().'.'.$file2->extension();
        $request->file_name->move(public_path('documents/'), $docName2);
        }
        $input['file_name']=$docName2;
        $fillings = \App\Models\FillingCategory::find($request->filling_category_id);
        $input['filling_category']=$fillings->name;

        $fillingDocument = $this->fillingDocumentRepository->create($input);

        Flash::success('Filling Document saved successfully.');

        return redirect(route('fillingDocuments.index'));
    }

    /**
     * Display the specified FillingDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            Flash::error('Filling Document not found');

            return redirect(route('fillingDocuments.index'));
        }

        return view('filling_documents.show')->with('fillingDocument', $fillingDocument);
    }

    /**
     * Show the form for editing the specified FillingDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            Flash::error('Filling Document not found');

            return redirect(route('fillingDocuments.index'));
        }

        return view('filling_documents.edit')->with('fillingDocument', $fillingDocument);
    }

    /**
     * Update the specified FillingDocument in storage.
     *
     * @param  int              $id
     * @param UpdateFillingDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            Flash::error('Filling Document not found');

            return redirect(route('fillingDocuments.index'));
        }

        $input = $request->all();

        if($request->file('file_name')){
            $request->validate([
                'file_name' => "required|mimes:pdf",
            ]);

        $file2=$request->file('file_name');
        $docName2 ='file_name-'.time().'.'.$file2->extension();
        $request->file_name->move(public_path('documents/'), $docName2);

        }

        $fillings = \App\Models\FillingCategory::find($request->filling_category_id);
        $input['filling_category']=$fillings->name;
        $fillingDocument = $this->fillingDocumentRepository->update($input , $id);

        Flash::success('Filling Document updated successfully.');

        return redirect(route('fillingDocuments.index'));
    }

    /**
     * Remove the specified FillingDocument from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fillingDocument = $this->fillingDocumentRepository->find($id);

        if (empty($fillingDocument)) {
            Flash::error('Filling Document not found');

            return redirect(route('fillingDocuments.index'));
        }

        $this->fillingDocumentRepository->delete($id);

        Flash::success('Filling Document deleted successfully.');

        return redirect(route('fillingDocuments.index'));
    }
}
