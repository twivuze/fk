<?php

namespace App\Repositories;

use App\Models\BookReviews;
use App\Repositories\BaseRepository;

/**
 * Class BookReviewsRepository
 * @package App\Repositories
 * @version June 27, 2020, 9:56 am UTC
*/

class BookReviewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'review',
        'rating',
        'book_id'
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
        return BookReviews::class;
    }
}
