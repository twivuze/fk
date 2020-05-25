<?php

namespace App\Repositories;

use App\Models\LoanSessions;
use App\Repositories\BaseRepository;

/**
 * Class LoanSessionsRepository
 * @package App\Repositories
 * @version May 23, 2020, 3:20 pm UTC
*/

class LoanSessionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contents',
        'images',
        'allow_application'
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
        return LoanSessions::class;
    }
}
