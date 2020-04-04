<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// define a gateway | Same name (messages.) used in NewMessage Event | Passing the user id
Broadcast::channel('messages.{id}', function ($user, $id) { // $user is the logged in user, and $id is the id we get from the front end.
    // dd($user->id, $id); 
    return true;
    // return $user->id === (int) $id; // only if it is the user's channel can they receive incoming events | If they change the channel name they won't be able to listen
});
