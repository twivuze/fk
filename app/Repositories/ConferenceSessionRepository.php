<?php

namespace App\Repositories;

use App\Models\ConferenceSession;
use App\Repositories\BaseRepository;

/**
 * Class ConferenceSessionRepository
 * @package App\Repositories
 * @version May 30, 2020, 5:20 am UTC
*/

class ConferenceSessionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contents',
        'image',
        'allow_to_apply'
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
        return ConferenceSession::class;
    }
}
