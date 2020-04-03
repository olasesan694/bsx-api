<?php 

namespace App;

class SendSms {

    // returns a string msg not an obj.
    public static function sendSms($phone, $name, $link) {
        $msg = $name . " invited you to shop with them. (1) Confirm with them. (2) Respond in: " . $link;
        $basic  = new \Nexmo\Client\Credentials\Basic('d2654d4f', 'yqTqnVJIVo6xYhmD');
        $client = new \Nexmo\Client($basic);
        // $nexmo = app('Nexmo\Client');
        $client->message()->send([
            'to' => '1' . $phone,
            'from' => '15314660308',
            'text' => $msg, 
        ]);
        return $msg;
    }

}
?>