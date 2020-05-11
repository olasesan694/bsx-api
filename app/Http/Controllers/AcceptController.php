<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use DB;

class AcceptController extends Controller
{
    //
    public function index () {
        return view ('accept');
    }

    public function send () {
        $user = auth()->user();
        // updates Friendid
        $affected = DB::update('UPDATE invites SET friend_id=:sFriend WHERE friend_phone=:sPhone', [
            'sFriend' => auth()->id(), 
            'sPhone' => $user->phone
        ]); 
        
        return "AFFECTED" . $affected . "row(s)."; 
        // return (['message' => 'MESSAGE HAS BEEN SENT MRS.']);
    }
}
