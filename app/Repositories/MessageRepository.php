<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\BaseRepository;

/**
 * Class MessageRepository
 * @package App\Repositories
 * @version May 27, 2020, 8:19 pm UTC
*/

class MessageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'message',
        'sender_id',
        'receiver_id',
        'checked',
        'read'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Message::class;
    }
}
