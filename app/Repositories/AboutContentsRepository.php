<?php

namespace App\Repositories;

use App\Models\AboutContents;
use App\Repositories\BaseRepository;

/**
 * Class AboutContentsRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:33 pm UTC
*/

class AboutContentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'about_section_id'
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
        return AboutContents::class;
    }
}
