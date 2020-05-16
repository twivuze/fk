<?php

namespace App\Repositories;

use App\Models\AboutUsHistory;
use App\Repositories\BaseRepository;

/**
 * Class AboutUsHistoryRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:36 pm UTC
*/

class AboutUsHistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'image',
        'description'
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
        return AboutUsHistory::class;
    }
}
