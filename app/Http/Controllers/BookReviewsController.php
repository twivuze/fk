<?php

namespace App\Http\Controllers;

use App\DataTables\BookReviewsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBookReviewsRequest;
use App\Http\Requests\UpdateBookReviewsRequest;
use App\Repositories\BookReviewsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BookReviewsController extends AppBaseController
{
    /** @var  BookReviewsRepository */
    private $bookReviewsRepository;

    public function __construct(BookReviewsRepository $bookReviewsRepo)
    {
        $this->bookReviewsRepository = $bookReviewsRepo;
    }

    /**
     * Display a listing of the BookReviews.
     *
     * @param BookReviewsDataTable $bookReviewsDataTable
     * @return Response
     */
    public function index(BookReviewsDataTable $bookReviewsDataTable)
    {
        return $bookReviewsDataTable->render('book_reviews.index');
    }

    /**
     * Show the form for creating a new BookReviews.
     *
     * @return Response
     */
    public function create()
    {
        return view('book_reviews.create');
    }

    /**
     * Store a newly created BookReviews in storage.
     *
     * @param CreateBookReviewsRequest $request
     *
     * @return Response
     */
    public function store(CreateBookReviewsRequest $request)
    {
        $input = $request->all();

        $bookReviews = $this->bookReviewsRepository->create($input);

        Flash::success('Book Reviews saved successfully.');

        return redirect()->back()->with('success', 'Book Reviews saved successfully.');   
    }

    /**
     * Display the specified BookReviews.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            Flash::error('Book Reviews not found');

            return redirect(route('bookReviews.index'));
        }

        return view('book_reviews.show')->with('bookReviews', $bookReviews);
    }

    /**
     * Show the form for editing the specified BookReviews.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            Flash::error('Book Reviews not found');

            return redirect(route('bookReviews.index'));
        }

        return view('book_reviews.edit')->with('bookReviews', $bookReviews);
    }

    /**
     * Update the specified BookReviews in storage.
     *
     * @param  int              $id
     * @param UpdateBookReviewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookReviewsRequest $request)
    {
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            Flash::error('Book Reviews not found');

            return redirect(route('bookReviews.index'));
        }

        $bookReviews = $this->bookReviewsRepository->update($request->all(), $id);

        Flash::success('Book Reviews updated successfully.');

        return redirect(route('bookReviews.index'));
    }

    /**
     * Remove the specified BookReviews from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            Flash::error('Book Reviews not found');

            return redirect(route('bookReviews.index'));
        }

        $this->bookReviewsRepository->delete($id);

        Flash::success('Book Reviews deleted successfully.');

        return redirect(route('bookReviews.index'));
    }
}
