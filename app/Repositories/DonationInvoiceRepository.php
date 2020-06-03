<?php

namespace App\Repositories;

use App\Models\DonationInvoice;
use App\Repositories\BaseRepository;

/**
 * Class DonationInvoiceRepository
 * @package App\Repositories
 * @version June 3, 2020, 6:46 am UTC
*/

class DonationInvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'donor_id',
        'enterprise_id',
        'donor',
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
        return DonationInvoice::class;
    }
}
