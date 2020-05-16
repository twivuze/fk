<?php

namespace App\Repositories;

use App\Models\AboutSections;
use App\Repositories\BaseRepository;

/**
 * Class AboutSectionsRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:32 pm UTC
*/

class AboutSectionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'position'
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
        return AboutSections::class;
    }
}
