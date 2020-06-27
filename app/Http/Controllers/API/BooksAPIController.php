<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBooksAPIRequest;
use App\Http\Requests\API\UpdateBooksAPIRequest;
use App\Models\Books;
use App\Repositories\BooksRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BooksController
 * @package App\Http\Controllers\API
 */

class BooksAPIController extends AppBaseController
{
    /** @var  BooksRepository */
    private $booksRepository;

    public function __construct(BooksRepository $booksRepo)
    {
        $this->booksRepository = $booksRepo;
    }

    /**
     * Display a listing of the Books.
     * GET|HEAD /books
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $books = $this->booksRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($books->toArray(), 'Books retrieved successfully');
    }

    /**
     * Store a newly created Books in storage.
     * POST /books
     *
     * @param CreateBooksAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBooksAPIRequest $request)
    {
        $input = $request->all();

        $books = $this->booksRepository->create($input);

        return $this->sendResponse($books->toArray(), 'Books saved successfully');
    }

    /**
     * Display the specified Books.
     * GET|HEAD /books/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Books $books */
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            return $this->sendError('Books not found');
        }

        return $this->sendResponse($books->toArray(), 'Books retrieved successfully');
    }

    /**
     * Update the specified Books in storage.
     * PUT/PATCH /books/{id}
     *
     * @param int $id
     * @param UpdateBooksAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBooksAPIRequest $request)
    {
        $input = $request->all();

        /** @var Books $books */
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            return $this->sendError('Books not found');
        }

        $books = $this->booksRepository->update($input, $id);

        return $this->sendResponse($books->toArray(), 'Books updated successfully');
    }

    /**
     * Remove the specified Books from storage.
     * DELETE /books/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Books $books */
        $books = $this->booksRepository->find($id);

        if (empty($books)) {
            return $this->sendError('Books not found');
        }

        $books->delete();

        return $this->sendSuccess('Books deleted successfully');
    }
}
