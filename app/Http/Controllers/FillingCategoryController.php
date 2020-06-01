<?php

namespace App\Http\Controllers;

use App\DataTables\FillingCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFillingCategoryRequest;
use App\Http\Requests\UpdateFillingCategoryRequest;
use App\Repositories\FillingCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class FillingCategoryController extends AppBaseController
{
    /** @var  FillingCategoryRepository */
    private $fillingCategoryRepository;

    public function __construct(FillingCategoryRepository $fillingCategoryRepo)
    {
        $this->fillingCategoryRepository = $fillingCategoryRepo;
    }

    /**
     * Display a listing of the FillingCategory.
     *
     * @param FillingCategoryDataTable $fillingCategoryDataTable
     * @return Response
     */
    public function index(FillingCategoryDataTable $fillingCategoryDataTable)
    {
        return $fillingCategoryDataTable->render('filling_categories.index');
    }

    /**
     * Show the form for creating a new FillingCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('filling_categories.create');
    }

    /**
     * Store a newly created FillingCategory in storage.
     *
     * @param CreateFillingCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateFillingCategoryRequest $request)
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

        $fillingCategory = $this->fillingCategoryRepository->create($input);

        Flash::success('Filling Category saved successfully.');

        return redirect(route('fillingCategories.index'));
    }

    /**
     * Display the specified FillingCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            Flash::error('Filling Category not found');

            return redirect(route('fillingCategories.index'));
        }

        return view('filling_categories.show')->with('fillingCategory', $fillingCategory);
    }

    /**
     * Show the form for editing the specified FillingCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            Flash::error('Filling Category not found');

            return redirect(route('fillingCategories.index'));
        }

        return view('filling_categories.edit')->with('fillingCategory', $fillingCategory);
    }

    /**
     * Update the specified FillingCategory in storage.
     *
     * @param  int              $id
     * @param UpdateFillingCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            Flash::error('Filling Category not found');

            return redirect(route('fillingCategories.index'));
        }
        $input = $request->all();

        if($request->file('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);

            $image = $this->updateImage($request);  
            $input['image']=$image;
        }
       
        
      

        $fillingCategory = $this->fillingCategoryRepository->update($input, $id);

        Flash::success('Filling Category updated successfully.');

        return redirect(route('fillingCategories.index'));
    }

    /**
     * Remove the specified FillingCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fillingCategory = $this->fillingCategoryRepository->find($id);

        if (empty($fillingCategory)) {
            Flash::error('Filling Category not found');

            return redirect(route('fillingCategories.index'));
        }

        $this->fillingCategoryRepository->delete($id);

        Flash::success('Filling Category deleted successfully.');

        return redirect(route('fillingCategories.index'));
    }
}
