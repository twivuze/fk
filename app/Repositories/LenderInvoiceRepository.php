<?php

namespace App\Repositories;

use App\Models\LenderInvoice;
use App\Repositories\BaseRepository;

/**
 * Class LenderInvoiceRepository
 * @package App\Repositories
 * @version June 3, 2020, 6:44 am UTC
*/

class LenderInvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enterprise_id',
        'lender_id',
        'lender',
        'enterprise',
        'amount',
        'center_id'
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
        return LenderInvoice::class;
    }
}
