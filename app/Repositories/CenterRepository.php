<?php

namespace App\Repositories;

use App\Models\Center;
use App\Repositories\BaseRepository;

/**
 * Class CenterRepository
 * @package App\Repositories
 * @version May 25, 2020, 7:19 am UTC
*/

class CenterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'address',
        'country',
        'region',
        'occupation',
        'organization',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'passport_size_photos_zipped',
        'copies_national_identity_card_zipped',
        'application_letter_written_by_applicant_pdf',
        'cover_image',
        'short_summary',
        'description',
        'status',
        'session_id'
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
        return Center::class;
    }
}
