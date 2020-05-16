<?php

namespace App\Http\Controllers;

use App\DataTables\ContactsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContactsRequest;
use App\Http\Requests\UpdateContactsRequest;
use App\Repositories\ContactsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContactsController extends AppBaseController
{
    /** @var  ContactsRepository */
    private $contactsRepository;

    public function __construct(ContactsRepository $contactsRepo)
    {
        $this->contactsRepository = $contactsRepo;
    }

    /**
     * Display a listing of the Contacts.
     *
     * @param ContactsDataTable $contactsDataTable
     * @return Response
     */
    public function index(ContactsDataTable $contactsDataTable)
    {
        return $contactsDataTable->render('contacts.index');
    }

    /**
     * Show the form for creating a new Contacts.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created Contacts in storage.
     *
     * @param CreateContactsRequest $request
     *
     * @return Response
     */
    public function store(CreateContactsRequest $request)
    {
        $input = $request->all();

        $contacts = $this->contactsRepository->create($input);

        Flash::success('Contacts saved successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified Contacts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            Flash::error('Contacts not found');

            return redirect(route('contacts.index'));
        }

        return view('contacts.show')->with('contacts', $contacts);
    }

    /**
     * Show the form for editing the specified Contacts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            Flash::error('Contacts not found');

            return redirect(route('contacts.index'));
        }

        return view('contacts.edit')->with('contacts', $contacts);
    }

    /**
     * Update the specified Contacts in storage.
     *
     * @param  int              $id
     * @param UpdateContactsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactsRequest $request)
    {
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            Flash::error('Contacts not found');

            return redirect(route('contacts.index'));
        }

        $contacts = $this->contactsRepository->update($request->all(), $id);

        Flash::success('Contacts updated successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified Contacts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            Flash::error('Contacts not found');

            return redirect(route('contacts.index'));
        }

        $this->contactsRepository->delete($id);

        Flash::success('Contacts deleted successfully.');

        return redirect(route('contacts.index'));
    }
}
