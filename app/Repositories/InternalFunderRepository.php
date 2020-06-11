<?php

namespace App\Repositories;

use App\Models\InternalFunder;
use App\Repositories\BaseRepository;

/**
 * Class InternalFunderRepository
 * @package App\Repositories
 * @version June 11, 2020, 4:28 pm UTC
*/

class InternalFunderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'fund',
        'currency'
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
        return InternalFunder::class;
    }
}
