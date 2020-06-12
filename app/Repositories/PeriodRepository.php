<?php

namespace App\Repositories;

use App\Models\Period;
use App\Repositories\BaseRepository;

/**
 * Class PeriodRepository
 * @package App\Repositories
 * @version June 11, 2020, 11:17 pm UTC
*/

class PeriodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'period',
        'category'
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
        return Period::class;
    }
}
