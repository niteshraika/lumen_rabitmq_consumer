<?php

namespace App\Http\Controllers;

use KamiOrz\Amqp\Facades\Amqp;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function receive () {
        $queueName = 'notice';

        //* Consume messages, acknowledge and stop when no message is left
        Amqp::consume($queueName, function ($message, $resolver) {
            $this -> message($message->body);

            $resolver->acknowledge($message);
            $resolver->stopWhenProcessed();
        });

        //* Consume messages forever
        // Amqp::consume($queueName, function ($message, $resolver) {
        //     $this -> message($message->body);

        //     $resolver->acknowledge($message);
        // });

        //* Consume messages, with custom settings
        // Amqp::consume($queueName, function ($message, $resolver) {
        //     $this -> message($message->body);

        //     $resolver->acknowledge($message);
        // }, [
        //     'timeout' => 2,
        //     'vhost'   => 'vhost3'
        // ]);

    }

    private function message($message){
        dd($message);
    }
}
