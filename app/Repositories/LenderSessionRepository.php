<?php

namespace App\Repositories;

use App\Models\LenderSession;
use App\Repositories\BaseRepository;

/**
 * Class LenderSessionRepository
 * @package App\Repositories
 * @version May 23, 2020, 5:18 pm UTC
*/

class LenderSessionRepository extends BaseRepository
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
        return LenderSession::class;
    }
}
