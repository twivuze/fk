<?php

namespace App\Repositories;

use App\Models\Letters;
use App\Repositories\BaseRepository;

/**
 * Class LettersRepository
 * @package App\Repositories
 * @version July 2, 2020, 8:24 am UTC
*/

class LettersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contents',
        'numbering',
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
        return Letters::class;
    }
}
