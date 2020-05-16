<?php

namespace App\Repositories;

use App\Models\Photos;
use App\Repositories\BaseRepository;

/**
 * Class PhotosRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:37 pm UTC
*/

class PhotosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image'
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
        return Photos::class;
    }
}
