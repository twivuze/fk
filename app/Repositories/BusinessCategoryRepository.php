<?php

namespace App\Repositories;

use App\Models\BusinessCategory;
use App\Repositories\BaseRepository;

/**
 * Class BusinessCategoryRepository
 * @package App\Repositories
 * @version May 25, 2020, 6:11 am UTC
*/

class BusinessCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'used'
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
        return BusinessCategory::class;
    }
}
