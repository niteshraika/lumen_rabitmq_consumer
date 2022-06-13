<?php

namespace App\Http\Controllers;

use Bschmitt\Amqp\Facades\Amqp;

class ConsumerController extends Controller
{
    public function receive () {

        $message = "apple";

         return $message;
    }
}
