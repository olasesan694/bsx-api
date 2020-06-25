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
            // 'sPhone' => $user->phone
            'sPhone' => $user->email
            // 'sPhone' => $user->domain
        ]); 

        // // added s.o. - user and inc live chat
        // $estas = DB::select('SELECT user_id FROM invites WHERE friend_id = :id', ['id' => auth()->id()]);
        // // inviter's contacts.
        // foreach ($estas as $esta) {
        //     $value = $esta->user_id;
        //     $inviter_ids = User::where('id', $value)->get();
        // }
        
        return "AFFECTED" . $affected . "row(s)."; 
        // return $inviter_ids; 
        // return (['message' => 'MESSAGE HAS BEEN SENT MRS.']);
    }
}
