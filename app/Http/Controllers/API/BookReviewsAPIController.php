<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBookReviewsAPIRequest;
use App\Http\Requests\API\UpdateBookReviewsAPIRequest;
use App\Models\BookReviews;
use App\Repositories\BookReviewsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BookReviewsController
 * @package App\Http\Controllers\API
 */

class BookReviewsAPIController extends AppBaseController
{
    /** @var  BookReviewsRepository */
    private $bookReviewsRepository;

    public function __construct(BookReviewsRepository $bookReviewsRepo)
    {
        $this->bookReviewsRepository = $bookReviewsRepo;
    }

    /**
     * Display a listing of the BookReviews.
     * GET|HEAD /bookReviews
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bookReviews = $this->bookReviewsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bookReviews->toArray(), 'Book Reviews retrieved successfully');
    }

    /**
     * Store a newly created BookReviews in storage.
     * POST /bookReviews
     *
     * @param CreateBookReviewsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookReviewsAPIRequest $request)
    {
        $input = $request->all();

        $bookReviews = $this->bookReviewsRepository->create($input);

        return $this->sendResponse($bookReviews->toArray(), 'Book Reviews saved successfully');
    }

    /**
     * Display the specified BookReviews.
     * GET|HEAD /bookReviews/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BookReviews $bookReviews */
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            return $this->sendError('Book Reviews not found');
        }

        return $this->sendResponse($bookReviews->toArray(), 'Book Reviews retrieved successfully');
    }

    /**
     * Update the specified BookReviews in storage.
     * PUT/PATCH /bookReviews/{id}
     *
     * @param int $id
     * @param UpdateBookReviewsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookReviewsAPIRequest $request)
    {
        $input = $request->all();

        /** @var BookReviews $bookReviews */
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            return $this->sendError('Book Reviews not found');
        }

        $bookReviews = $this->bookReviewsRepository->update($input, $id);

        return $this->sendResponse($bookReviews->toArray(), 'BookReviews updated successfully');
    }

    /**
     * Remove the specified BookReviews from storage.
     * DELETE /bookReviews/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BookReviews $bookReviews */
        $bookReviews = $this->bookReviewsRepository->find($id);

        if (empty($bookReviews)) {
            return $this->sendError('Book Reviews not found');
        }

        $bookReviews->delete();

        return $this->sendSuccess('Book Reviews deleted successfully');
    }
}
