<?php

namespace App\Repositories;

use App\Models\FillingDocument;
use App\Repositories\BaseRepository;

/**
 * Class FillingDocumentRepository
 * @package App\Repositories
 * @version June 1, 2020, 5:24 pm UTC
*/

class FillingDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'file_name',
        'filling_category_id',
        'center_id',
        'microfund_manager_id',
        'filling_category',
        'country',
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
        return FillingDocument::class;
    }
}
