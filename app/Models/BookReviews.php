<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BookReviews
 * @package App\Models
 * @version June 27, 2020, 9:56 am UTC
 *
 * @property string $review
 * @property integer $rating
 * @property integer $book_id
 */
class BookReviews extends Model
{

    public $table = 'book_reviews';
    



    public $fillable = [
        'review',
        'rating',
        'book_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rating' => 'integer',
        'book_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'=> 'required',
        'review' => 'required',
        'book_id' => 'required'
    ];

    
}
