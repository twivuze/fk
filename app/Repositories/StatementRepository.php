<?php

namespace App\Repositories;

use App\Models\Statement;
use App\Repositories\BaseRepository;

/**
 * Class StatementRepository
 * @package App\Repositories
 * @version June 5, 2020, 6:36 pm UTC
*/

class StatementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contents',
        'numbering'
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
        return Statement::class;
    }
}
