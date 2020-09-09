<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'to_user_id',
        'message',
    ];
}
