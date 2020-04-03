<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    //
    protected $fillable = [
        'user_id', 'friend_id', 'friend_phone', 'shared_link'
    ];
}
