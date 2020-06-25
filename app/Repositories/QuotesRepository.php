<?php

namespace App\Repositories;

use App\Models\Quotes;
use App\Repositories\BaseRepository;

/**
 * Class QuotesRepository
 * @package App\Repositories
 * @version June 25, 2020, 4:15 pm UTC
*/

class QuotesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quote_owner',
        'quote',
        'avatar',
        'slider_image',
        'publish'
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
        return Quotes::class;
    }
}
