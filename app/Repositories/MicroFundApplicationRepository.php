<?php

namespace App\Repositories;

use App\Models\MicroFundApplication;
use App\Repositories\BaseRepository;

/**
 * Class MicroFund ApplicationRepository
 * @package App\Repositories
 * @version May 20, 2020, 8:57 am UTC
*/

class MicroFundApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'email',
        'address',
        'religion',
        'marital_status',
        'gender',
        'q1_1',
        'q1_2',
        'q1_3',
        'q1_4',
        'q2_1',
        'q2_2',
        'q2_3',
        'q3_1',
        'q3_2',
        'q3_3',
        'q4_1',
        'q4_2',
        'q4_3',
        'q4_4',
        'q5_1',
        'q5_2',
        'q5_3',
        'phone_number'
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
        return MicroFundApplication::class;
    }
}
