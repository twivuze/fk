<?php

namespace App\Repositories;

use App\Models\Contacts;
use App\Repositories\BaseRepository;

/**
 * Class ContactsRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:39 pm UTC
*/

class ContactsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'phone'
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
        return Contacts::class;
    }
}
