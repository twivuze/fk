<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactsAPIRequest;
use App\Http\Requests\API\UpdateContactsAPIRequest;
use App\Models\Contacts;
use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContactsController
 * @package App\Http\Controllers\API
 */

class ContactsAPIController extends AppBaseController
{
    /** @var  ContactsRepository */
    private $contactsRepository;

    public function __construct(ContactsRepository $contactsRepo)
    {
        $this->contactsRepository = $contactsRepo;
    }

    /**
     * Display a listing of the Contacts.
     * GET|HEAD /contacts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contacts = $this->contactsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contacts->toArray(), 'Contacts retrieved successfully');
    }

    /**
     * Store a newly created Contacts in storage.
     * POST /contacts
     *
     * @param CreateContactsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContactsAPIRequest $request)
    {
        $input = $request->all();

        $contacts = $this->contactsRepository->create($input);

        return $this->sendResponse($contacts->toArray(), 'Contacts saved successfully');
    }

    /**
     * Display the specified Contacts.
     * GET|HEAD /contacts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Contacts $contacts */
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            return $this->sendError('Contacts not found');
        }

        return $this->sendResponse($contacts->toArray(), 'Contacts retrieved successfully');
    }

    /**
     * Update the specified Contacts in storage.
     * PUT/PATCH /contacts/{id}
     *
     * @param int $id
     * @param UpdateContactsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Contacts $contacts */
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            return $this->sendError('Contacts not found');
        }

        $contacts = $this->contactsRepository->update($input, $id);

        return $this->sendResponse($contacts->toArray(), 'Contacts updated successfully');
    }

    /**
     * Remove the specified Contacts from storage.
     * DELETE /contacts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Contacts $contacts */
        $contacts = $this->contactsRepository->find($id);

        if (empty($contacts)) {
            return $this->sendError('Contacts not found');
        }

        $contacts->delete();

        return $this->sendSuccess('Contacts deleted successfully');
    }
}
