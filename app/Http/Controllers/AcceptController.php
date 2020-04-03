<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class AcceptController extends Controller
{
    //
    public function index () {
        return view ('accept');
    }

    public function send () {
        $user = auth()->user();
        // updates Friendid
        DB::update('UPDATE invites SET friend_id = ? WHERE friend_phone = ?', [auth()->id(), $user->phone]); 
        // DB::update('UPDATE invites SET friend_id = ? WHERE friend_email = ?', [auth()->id(), $user->email]);
        
        return (['message' => 'MESSAGE HAS BEEN SENT MRS.']);
    }
}
