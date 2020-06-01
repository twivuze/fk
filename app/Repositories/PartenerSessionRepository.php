<?php

namespace App\Repositories;

use App\Models\PartenerSession;
use App\Repositories\BaseRepository;

/**
 * Class PartenerSessionRepository
 * @package App\Repositories
 * @version May 31, 2020, 10:20 pm UTC
*/

class PartenerSessionRepository extends BaseRepository
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
        return PartenerSession::class;
    }
}
