<?php

namespace App\Http\Controllers;

use App\DataTables\QuotesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuotesRequest;
use App\Http\Requests\UpdateQuotesRequest;
use App\Repositories\QuotesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class QuotesController extends AppBaseController
{
    /** @var  QuotesRepository */
    private $quotesRepository;

    public function __construct(QuotesRepository $quotesRepo)
    {
        $this->quotesRepository = $quotesRepo;
    }

    /**
     * Display a listing of the Quotes.
     *
     * @param QuotesDataTable $quotesDataTable
     * @return Response
     */
    public function index(QuotesDataTable $quotesDataTable)
    {
        return $quotesDataTable->render('quotes.index');
    }

    /**
     * Show the form for creating a new Quotes.
     *
     * @return Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created Quotes in storage.
     *
     * @param CreateQuotesRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotesRequest $request)
    {
        $input = $request->all();

        if(!$request->file('avatar')){
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $avatar = $this->updateImage($request,'avatar');  
        }

        if(!$request->file('slider_image')){
            $request->validate([
                'slider_image' => 'required|image|mimes:jpeg,png,jpg',  
            ]);
          
        }else{
        $file1=$request->file('slider_image');
        $cover ='cover-'.time().'.'.$file1->extension();
        $request->slider_image->move(public_path('images/'), $cover);
        }


        $input['avatar']=$avatar;
        $input['slider_image']=$cover;

        $quotes = $this->quotesRepository->create($input);

        Flash::success('Quotes saved successfully.');

        return redirect(route('quotes.index'));
    }

    /**
     * Display the specified Quotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            Flash::error('Quotes not found');

            return redirect(route('quotes.index'));
        }

        return view('quotes.show')->with('quotes', $quotes);
    }

    /**
     * Show the form for editing the specified Quotes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            Flash::error('Quotes not found');

            return redirect(route('quotes.index'));
        }

        return view('quotes.edit')->with('quotes', $quotes);
    }

    /**
     * Update the specified Quotes in storage.
     *
     * @param  int              $id
     * @param UpdateQuotesRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            Flash::error('Quotes not found');

            return redirect(route('quotes.index'));
        }

        $input = $request->all();


        if($request->file('avatar')){
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg',
            ]);
     
            $avatar = $this->updateImage($request,'avatar'); 
            $input['avatar']=$avatar; 
        }else{
            $input['avatar']=$quotes->avatar;
        }

        if($request->file('slider_image')){
            $request->validate([
                'slider_image' => 'required|image|mimes:jpeg,png,jpg',  
            ]);
  
        $file1=$request->file('slider_image');
        $cover ='cover-'.time().'.'.$file1->extension();
        $request->slider_image->move(public_path('images/'), $cover);
        $input['slider_image']=$cover;
        }else{
            $input['slider_image']=$quotes->slider_image;
        }



        $quotes = $this->quotesRepository->update($input, $id);

        Flash::success('Quotes updated successfully.');

        return redirect(route('quotes.index'));
    }

    /**
     * Remove the specified Quotes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quotes = $this->quotesRepository->find($id);

        if (empty($quotes)) {
            Flash::error('Quotes not found');

            return redirect(route('quotes.index'));
        }

        $this->quotesRepository->delete($id);

        Flash::success('Quotes deleted successfully.');

        return redirect(route('quotes.index'));
    }
}
