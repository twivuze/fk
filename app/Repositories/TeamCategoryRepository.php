<?php

namespace App\Repositories;

use App\Models\TeamCategory;
use App\Repositories\BaseRepository;

/**
 * Class TeamCategoryRepository
 * @package App\Repositories
 * @version June 27, 2020, 9:20 am UTC
*/

class TeamCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'numbering',
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
        return TeamCategory::class;
    }
}
