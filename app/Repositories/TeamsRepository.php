<?php

namespace App\Repositories;

use App\Models\Teams;
use App\Repositories\BaseRepository;

/**
 * Class TeamsRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:30 pm UTC
*/

class TeamsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'avatar',
        'full_name',
        'title',
        'email',
        'phone',
        'bio',
        'published'
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
        return Teams::class;
    }
}
