<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMessageAPIRequest;
use App\Http\Requests\API\UpdateMessageAPIRequest;
use App\Models\Message;
use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MessageController
 * @package App\Http\Controllers\API
 */

class MessageAPIController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the Message.
     * GET|HEAD /messages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $messages = $this->messageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($messages->toArray(), 'Messages retrieved successfully');
    }

    /**
     * Store a newly created Message in storage.
     * POST /messages
     *
     * @param CreateMessageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageAPIRequest $request)
    {
        $input = $request->all();

        $message = $this->messageRepository->create($input);

        return $this->sendResponse($message->toArray(), 'Message saved successfully');
    }

    /**
     * Display the specified Message.
     * GET|HEAD /messages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Message $message */
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        return $this->sendResponse($message->toArray(), 'Message retrieved successfully');
    }

    /**
     * Update the specified Message in storage.
     * PUT/PATCH /messages/{id}
     *
     * @param int $id
     * @param UpdateMessageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Message $message */
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        $message = $this->messageRepository->update($input, $id);

        return $this->sendResponse($message->toArray(), 'Message updated successfully');
    }

    /**
     * Remove the specified Message from storage.
     * DELETE /messages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Message $message */
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        $message->delete();

        return $this->sendSuccess('Message deleted successfully');
    }
}
