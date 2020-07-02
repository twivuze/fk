<?php

namespace App\Http\Controllers;

use App\DataTables\LettersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLettersRequest;
use App\Http\Requests\UpdateLettersRequest;
use App\Repositories\LettersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LettersController extends AppBaseController
{
    /** @var  LettersRepository */
    private $lettersRepository;

    public function __construct(LettersRepository $lettersRepo)
    {
        $this->lettersRepository = $lettersRepo;
    }

    /**
     * Display a listing of the Letters.
     *
     * @param LettersDataTable $lettersDataTable
     * @return Response
     */
    public function index(LettersDataTable $lettersDataTable)
    {
        return $lettersDataTable->render('letters.index');
    }

    /**
     * Show the form for creating a new Letters.
     *
     * @return Response
     */
    public function create()
    {
        return view('letters.create');
    }

    /**
     * Store a newly created Letters in storage.
     *
     * @param CreateLettersRequest $request
     *
     * @return Response
     */
    public function store(CreateLettersRequest $request)
    {
        $input = $request->all();

        $letters = $this->lettersRepository->create($input);

        Flash::success('Letters saved successfully.');

        return redirect(route('letters.index'));
    }

    /**
     * Display the specified Letters.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            Flash::error('Letters not found');

            return redirect(route('letters.index'));
        }

        return view('letters.show')->with('letters', $letters);
    }

    /**
     * Show the form for editing the specified Letters.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            Flash::error('Letters not found');

            return redirect(route('letters.index'));
        }

        return view('letters.edit')->with('letters', $letters);
    }

    /**
     * Update the specified Letters in storage.
     *
     * @param  int              $id
     * @param UpdateLettersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLettersRequest $request)
    {
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            Flash::error('Letters not found');

            return redirect(route('letters.index'));
        }

        $letters = $this->lettersRepository->update($request->all(), $id);

        Flash::success('Letters updated successfully.');

        return redirect(route('letters.index'));
    }

    /**
     * Remove the specified Letters from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $letters = $this->lettersRepository->find($id);

        if (empty($letters)) {
            Flash::error('Letters not found');

            return redirect(route('letters.index'));
        }

        $this->lettersRepository->delete($id);

        Flash::success('Letters deleted successfully.');

        return redirect(route('letters.index'));
    }
}
