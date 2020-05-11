<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Message;
use App\Events\NewMessage;
// use Illuminate\Support\Facades\DB;
use DB;

class ContactsController extends Controller
{
    
    // private $uid;
    // private $fid;
    
    public function get()
    {

        // // get all users except the authenticated one
        // $contacts = User::where('id', '!=', auth()->id())->get();
        // $contacts = DB::select('SELECT friend_id FROM invites WHERE user_id = :id', ['id' => auth()->id()]);
        Invite::select(\DB::raw("'friend_id'"))
            ->where('user_id', auth()->id())
            ->get();

        // // gets user id (inviter) from the invites table
        // $users = DB::select('SELECT user_id FROM invites WHERE user_id = :id LIMIT 1', ['id' => auth()->id()]);
        // foreach ($users as $user) {
        //     $userid = $user->user_id;
        //     $this->uid = $userid;
        // }
        

        // // gets friend id (invitee) from invites table
        // $friends = DB::select('SELECT friend_id FROM invites WHERE friend_id = :id LIMIT 1', ['id' => auth()->id()]);
        // foreach ($friends as $friend) {
        //     $friendid = $friend->friend_id;
        //     $this->fid = $friendid;
        // }
        

        // // gets the user's contacts if they are logged in
        // if (auth()->id() == $this->uid) {  

        //     $these = DB::select('SELECT friend_id FROM invites WHERE user_id = :id', ['id' => auth()->id()]);

        //     foreach ($these as $the) {
        //         $val = $the->friend_id;
        //         $contacts = DB::select('SELECT * FROM users WHERE id = :id', ['id' => $val]);
        //     }
           
        // } else if (auth()->id() == $this->fid) { // gets the friend's contacts if they are logged in 

        //     $estas = DB::select('SELECT user_id FROM invites WHERE friend_id = :id', ['id' => auth()->id()]);

        //     foreach ($estas as $esta) {
        //         $value = $esta->user_id;
        //         $contacts = DB::select('SELECT * FROM users WHERE id = :id', ['id' => $value]);
        //     }

        // } else { // else no contacts.
        //     $contacts = [];
        // }



        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw("'from' as sender_id, count('from') as messages_count"))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });



        
        // returns the contact of the logggin in user.
        return response()->json($contacts);
    }



    public function getMessagesFor($id)
    {

        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get(); // (a = 1 AND b=2) OR (c=1 OR d=2) Two functions and if statements between them.
        
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
