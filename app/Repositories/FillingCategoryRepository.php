<?php

namespace App\Repositories;

use App\Models\FillingCategory;
use App\Repositories\BaseRepository;

/**
 * Class FillingCategoryRepository
 * @package App\Repositories
 * @version June 1, 2020, 5:13 pm UTC
*/

class FillingCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return FillingCategory::class;
    }
}
