<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\BaseRepository;

/**
 * Class NewsRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:26 pm UTC
*/

class NewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
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
        return News::class;
    }
}
