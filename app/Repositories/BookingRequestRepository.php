<?php

namespace App\Repositories;

use App\Models\BookingRequest;
use App\Repositories\BaseRepository;

/**
 * Class BookingRequestRepository
 * @package App\Repositories
 * @version June 29, 2020, 7:04 am UTC
*/

class BookingRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'address',
        'street_address',
        'phone_number',
        'city',
        'province',
        'country',
        'company_or_Initiative',
        'title',
        'function',
        'q1',
        'q2'
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
        return BookingRequest::class;
    }
}
