<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $fillable = ['user_id', 'friend_id', 'discussion', 'user_email', 'friend_email', 'selector', 'token', 'token_expiration'];
}
