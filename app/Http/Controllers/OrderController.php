<?php

namespace App\Http\Controllers;

use Bschmitt\Amqp\Facades\Amqp;
//use Bschmitt\Amqp;
use Illuminate\Http\Request;
use PHPUnit\Exception;
//use Twilio\TwiML\Voice\Client;
use Twilio\Rest\Client;

class OrderController extends Controller
{
    public function index()
    {
        // dd('Hello MQ');

        try {
            $min = 1;
            $max = 10000;
            $order = rand($min, $max);
            $message = "Thanks for using eCommerce, your orderId: " . $order;
            Amqp::publish('routing-key', $message, ['queue' => 'test']);
            $this->notification();
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    public function notification()
    {
        try {
            Amqp::consume('test', function ($message, $resolver) {
               $sid = env('TWILIO_ACCOUNT_SID');
               $token = env('twilio_auth_token');
               $client = new Client($sid, $token);

               $client->messages->create(
                   env('user_number'),
                   [
                       'from' => env('twilio_number'),
                       'body' => $message->body
                   ]
               );
                $resolver->acknowledge($message);
                $resolver->stopWhenProcessed();
            });

            $data = [
                'status' => 'Success'
            ];

            return response($data, 200);

        } catch (\Exception $ex) {
//            dd($ex);

            return response('error', 500);
        }
    }
}
