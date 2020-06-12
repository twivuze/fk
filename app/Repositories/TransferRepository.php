<?php

namespace App\Repositories;

use App\Models\Transfer;
use App\Repositories\BaseRepository;

/**
 * Class TransferRepository
 * @package App\Repositories
 * @version June 11, 2020, 9:31 pm UTC
*/

class TransferRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'code',
        'enterprise',
        'amount',
        'currency',
        'grace_period',
        'grace_period_from',
        'grace_period_to',
        'instalment',
        'reminder_days',
        'rate',
        'enterprise_id'
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
        return Transfer::class;
    }
}
