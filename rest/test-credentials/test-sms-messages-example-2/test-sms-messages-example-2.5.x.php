<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once '/path/to/vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$token = "your_auth_token";
$client = new Client($sid, $token);

$sms = $client->messages->create(
    "+15005550009",
    array(
        "from" => "+15005550006",
        "body" => "Hey Mr Nugget, you the bomb!"
    )
);

echo $sms->sid;