<?php

namespace App\Repositories;

use App\Models\Stories;
use App\Repositories\BaseRepository;

/**
 * Class StoriesRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:08 pm UTC
*/

class StoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'image',
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
        return Stories::class;
    }
}
