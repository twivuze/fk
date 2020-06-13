<?php

namespace App\Repositories;

use App\Models\Repayment;
use App\Repositories\BaseRepository;

/**
 * Class RepaymentRepository
 * @package App\Repositories
 * @version June 13, 2020, 9:57 am UTC
*/

class RepaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'loan_id',
        'enterprise_id',
        'repay_code',
        'status',
        'currency',
        'repayer',
        'repay_date',
        'next_repay_date',
        'interest_amount',
        'amount_without_interst',
        'total_amount',
        'repay_reminder_day',
        'center_id',
        'did_repay',
        'total_loan_remain_amount'
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
        return Repayment::class;
    }
}
