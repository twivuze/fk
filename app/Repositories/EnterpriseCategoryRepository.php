<?php

namespace App\Repositories;

use App\Models\EnterpriseCategory;
use App\Repositories\BaseRepository;

/**
 * Class EnterpriseCategoryRepository
 * @package App\Repositories
 * @version May 25, 2020, 6:14 am UTC
*/

class EnterpriseCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'positioning',
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
        return EnterpriseCategory::class;
    }
}
