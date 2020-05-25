<?php

namespace App\Repositories;

use App\Models\CenterSession;
use App\Repositories\BaseRepository;

/**
 * Class CenterSessionRepository
 * @package App\Repositories
 * @version May 25, 2020, 8:21 am UTC
*/

class CenterSessionRepository extends BaseRepository
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
        return CenterSession::class;
    }
}
