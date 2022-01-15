<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class TwilioSMSController extends Controller
{
    public function index()
    {
        $receiverNumber = "+18295213582";
        $message = "This is testing from ItSolutionStuff.com";

        try {

            $sid    = "AC552df8a6ec5f75a5112e9f25a95ad6cc";
            $token  = "8c070f9c0bbd613f950afc00a6036b56";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                            ->create($receiverNumber, // to
                                    array(
                                        "messagingServiceSid" => "MG2af4a97b98a435d19ce15e7f0567fc71",
                                        "body" => "Holaa"
                                    )
                            );

            print($message->sid);

        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}
