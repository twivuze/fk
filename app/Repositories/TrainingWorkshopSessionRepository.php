<?php

namespace App\Repositories;

use App\Models\TrainingWorkshopSession;
use App\Repositories\BaseRepository;

/**
 * Class TrainingWorkshopSessionRepository
 * @package App\Repositories
 * @version May 30, 2020, 5:25 am UTC
*/

class TrainingWorkshopSessionRepository extends BaseRepository
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
        return TrainingWorkshopSession::class;
    }
}
