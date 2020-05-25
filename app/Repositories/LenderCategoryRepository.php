<?php

namespace App\Repositories;

use App\Models\LenderCategory;
use App\Repositories\BaseRepository;

/**
 * Class LenderCategoryRepository
 * @package App\Repositories
 * @version May 25, 2020, 6:10 am UTC
*/

class LenderCategoryRepository extends BaseRepository
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
        return LenderCategory::class;
    }
}
