<?php

namespace App\Http\Controllers;

use App\DataTables\BooksDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Repositories\BooksRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
class BooksController extends AppBaseController
{
    /** @var  BooksRepository */
    private $booksRepository;

    public function __construct(BooksRepository $booksRepo)
    {
        $this->booksRepository = $booksRepo;
    }

    /**
     * Display a listing of the Books.
     *
     * @param BooksDataTable $booksDataTable
     * @return Response
     */
    public function index(BooksDataTable $booksDataTable)
    {
        return $booksDataTable->render('books.index');
    }

    /**
     * Show the form for creating a new Books.
     *
     * @return Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created Books in storage.
     *
     * @param CreateBooksRequest $request
     *
     * @return Response
     */
    public function store(CreateBooksRequest $request)
    {
        $input = $request->all();

        if(!$request->file('cover')){
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $cover = $this->updateImage($request,'cover');  
        }

        if(!$request->file('book')){
            $request->validate([
                'book' => "required|mimes:pdf",
            ]);
          
        }else{

        $file1=$request->file('book');

        $docName1 ='book-'.time().'.'.$file1->extension();
        $request->book->move(public_path('book_files/'), $docName1);
        }

        $input['cover']=$cover;
        $input['book']=$docName1;

        $books = $this->booksRepository->create($input);

        Flash::success('Books saved successfully.');

        return redirect(route('books.index'));
    }

    /**
     * Display the specified Books.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            Flash::error('Books not found');

            return redirect(route('books.index'));
        }

        return view('books.show')->with('books', $books);
    }

    /**
     * Show the form for editing the specified Books.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            Flash::error('Books not found');

            return redirect(route('books.index'));
        }

        return view('books.edit')->with('books', $books);
    }

    /**
     * Update the specified Books in storage.
     *
     * @param  int              $id
     * @param UpdateBooksRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            Flash::error('Books not found');

            return redirect(route('books.index'));
        }

        if($request->file('cover')){
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $cover = $this->updateImage($request,'cover');  
        }else{
            $cover=$books->cover;
        }

        if($request->file('book')){
            $request->validate([
                'book' => "required|mimes:pdf",
            ]);

            $file1=$request->file('book');

            $docName1 ='book-'.time().'.'.$file1->extension();
            $request->book->move(public_path('book_files/'), $docName1);
          
        }else{

            $docName1=$books->book;
        }

        $input['cover']=$cover;
        $input['book']=$docName1;

        $books = $this->booksRepository->update($input, $id);

        Flash::success('Books updated successfully.');

        return redirect(route('books.index'));
    }

    /**
     * Remove the specified Books from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            Flash::error('Books not found');

            return redirect(route('books.index'));
        }

        $this->booksRepository->delete($id);

        Flash::success('Books deleted successfully.');

        return redirect(route('books.index'));
    }
}
