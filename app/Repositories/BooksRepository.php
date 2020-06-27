<?php

namespace App\Repositories;

use App\Models\Books;
use App\Repositories\BaseRepository;

/**
 * Class BooksRepository
 * @package App\Repositories
 * @version June 27, 2020, 9:37 am UTC
*/

class BooksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'author',
        'edition',
        'publisher',
        'ISBN',
        'Length',
        'Subjects',
        'cover',
        'payment_type',
        'price',
        'description',
        'published',
        'enable_preview'
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
        return Books::class;
    }
}
