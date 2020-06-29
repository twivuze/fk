<?php

namespace App\Repositories;

use App\Models\SubsidiaryCompanies;
use App\Repositories\BaseRepository;

/**
 * Class SubsidiaryCompaniesRepository
 * @package App\Repositories
 * @version June 29, 2020, 10:08 am UTC
*/

class SubsidiaryCompaniesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'url',
        'published'
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
        return SubsidiaryCompanies::class;
    }
}
