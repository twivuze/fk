<?php

namespace App\Repositories;

use App\Models\Donor;
use App\Repositories\BaseRepository;

/**
 * Class DonorRepository
 * @package App\Repositories
 * @version May 23, 2020, 4:50 pm UTC
*/

class DonorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'address',
        'contact',
        'Occupation',
        'which_business_models_are_you_willing_to_donate_to',
        'why_did_you_choose_such_business',
        'requiring',
        'donors_bank_details',
        'donors_passport_photo',
        'donors_copy_of_identity_card_or_passport',
        'session_id',
        'status'
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
        return Donor::class;
    }
}
