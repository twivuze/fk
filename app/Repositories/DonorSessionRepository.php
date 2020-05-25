<?php

namespace App\Repositories;

use App\Models\DonorSession;
use App\Repositories\BaseRepository;

/**
 * Class DonorSessionRepository
 * @package App\Repositories
 * @version May 23, 2020, 5:20 pm UTC
*/

class DonorSessionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contents',
        'image',
        'allow_to_apply'
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
        return DonorSession::class;
    }
}
