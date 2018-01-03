<?php
// Required if your environment does not handle autoloading
require '/plugins/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC70a46a9c54f0106562111c989740f7fc';
$token = 'e86294f00b2d4b44e1214f73ed3d2668';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$call = $client->messages->create(
    // the number you'd like to send the message to
    '+523333922475',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12512200345',
        // the body of the text message you'd like to send
        'body' => 'Message from localhost'
    )
);

echo "<pre>", $call->sid, "</pre>";