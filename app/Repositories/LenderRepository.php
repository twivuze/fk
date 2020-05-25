<?php

namespace App\Repositories;

use App\Models\Lender;
use App\Repositories\BaseRepository;

/**
 * Class LenderRepository
 * @package App\Repositories
 * @version May 23, 2020, 4:41 pm UTC
*/

class LenderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'contact',
        'country',
        'Occupation',
        'which_business_you_are_willing_to_lend_to',
        'why_did_you_choose_such_business',
        'recurring',
        'lenders_bank_details',
        'lenders_passport_photo',
        'lenders_copy_of_identity_card_or_passport',
        'session_id',
        'status',
        'email'
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
        return Lender::class;
    }
}
