<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Message
 * @package App\Models
 * @version May 27, 2020, 8:19 pm UTC
 *
 * @property string $message
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property boolean $checked
 * @property boolean $read
 */
class Message extends Model
{

    public $table = 'messages';
    



    public $fillable = [
        'message',
        'sender_id',
        'receiver_id',
        'checked',
        'read'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sender_id' => 'integer',
        'receiver_id' => 'integer',
        'checked' => 'boolean',
        'read' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
