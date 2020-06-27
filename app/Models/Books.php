<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Books
 * @package App\Models
 * @version June 27, 2020, 9:37 am UTC
 *
 * @property string $title
 * @property string $author
 * @property string $edition
 * @property string $publisher
 * @property string $ISBN
 * @property string $Length
 * @property string $Subjects
 * @property string $cover
 * @property string $payment_type
 * @property number $price
 * @property string $description
 * @property boolean $published
 * @property boolean $enable_preview
 */
class Books extends Model
{

    public $table = 'books';
    



    public $fillable = [
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
        'enable_preview', 'book','enable_download','currency'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'author' => 'string',
        'edition' => 'string',
        'publisher' => 'string',
        'ISBN' => 'string',
        'Length' => 'string',
        'cover' => 'string',
        'payment_type' => 'string',
        'price' => 'float',
        'published' => 'boolean',
        'enable_preview' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'author' => 'required'
    ];

    
}
