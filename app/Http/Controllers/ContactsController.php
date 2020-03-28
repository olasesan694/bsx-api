<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Auth;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ContactsController extends Controller
{
    
    private $uid;
    private $fid;
    
    public function get()
    {

        $users = DB::select('SELECT user_id FROM invites WHERE user_id = :id LIMIT 1', ['id' => auth()->id()]);
        foreach ($users as $user) {
            $userid = $user->user_id;
            $this->uid = $userid;
        }
        


        $friends = DB::select('SELECT friend_id FROM invites WHERE friend_id = :id LIMIT 1', ['id' => auth()->id()]);
        foreach ($friends as $friend) {
            $friendid = $friend->friend_id;
            $this->fid = $friendid;
        }
        


        if (auth()->id() == $this->uid) {

            $these = DB::select('SELECT friend_id FROM invites WHERE user_id = :id', ['id' => auth()->id()]);

            foreach ($these as $the) {
                $val = $the->friend_id;
                $contacts = DB::select('SELECT * FROM users WHERE id = :id', ['id' => $val]);
            }
           
        } else if (auth()->id() == $this->fid) {

            $estas = DB::select('SELECT user_id FROM invites WHERE friend_id = :id', ['id' => auth()->id()]);

            foreach ($estas as $esta) {
                $value = $esta->user_id;
                $contacts = DB::select('SELECT * FROM users WHERE id = :id', ['id' => $value]);
            }

        } else {
            $contacts = [];
        }


        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        $messages = Message::where('from', $id)->where('to', auth()->id())->get(); // gets all the messages user sent and messages friend sends

        return response()->json($messages);
    }


    public function send(Request $request) 
    {
        // creates a new message
        $message = Message::create([
            'from' => auth()->id(), 
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        // dispatch this event so the new message event can broadcast all the cahnnels that are listening to this new event.
        broadcast(new NewMessage($message)); // Note: events usually have listens | Passess this $message into the NewMessage contructor

        return response()->json($message);
    }
}
