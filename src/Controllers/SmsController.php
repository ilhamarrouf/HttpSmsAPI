<?php

namespace App\Controllers;

/**
* 
*/
class SmsController extends Controller
{
    public function send($request, $response)
    {
        return $send = $this->sms->to($request->getParam('to'))
            ->message($request->getParam('message'))
            ->send();
    }
}