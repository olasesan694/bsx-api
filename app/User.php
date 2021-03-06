<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'domain', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function friendOfMine() { // gets all the friends of the current user
    //     return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    // }

    // public function friendOf() { // returns users that have requested the user as their friends 
    //     return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    // }

    // public function friends() {
    //     return $this->friendOfMine->merge($this->friendOf);
    // }
}
