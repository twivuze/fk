<?php

namespace App\Repositories;

use App\Models\FunderManagerSession;
use App\Repositories\BaseRepository;

/**
 * Class FunderManagerSessionRepository
 * @package App\Repositories
 * @version May 30, 2020, 5:22 am UTC
*/

class FunderManagerSessionRepository extends BaseRepository
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
        return FunderManagerSession::class;
    }
}
