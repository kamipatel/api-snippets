<?php

use Illuminate\Http\Request;
use Twilio\Twiml;

// Note: $app was changed for $router since Lumen 5.5.0
// Reference: https://lumen.laravel.com/docs/5.5/upgrade#upgrade-5.5.0

$router->post('voice', ['middleware' => 'TwilioRequestValidator',
  function() {
    $twiml = new Twiml();
    $twiml->say('Hello World!');

    return response($twiml)->header('Content-Type', 'text/xml');
  }
]);

$router->post('message', ['middleware' => 'TwilioRequestValidator',
  function(Request $request) {
    $bodyLength = strlen($request->input('Body'));

    $twiml = new Twiml();
    $twiml->message("Your text to me was $bodyLength characters long. ".
                    "Webhooks are neat :)");

    return response($twiml)->header('Content-Type', 'text/xml');
  }
]);
