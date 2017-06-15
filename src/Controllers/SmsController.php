<?php

namespace App\Controllers;

/**
* 
*/
class SmsController extends Controller
{
    public function get($request, $response)
    {
        return $this->view->render($response, 'message_send.twig');
    }

    public function post($request, $response)
    {
        $this->sms->to($request->getParam('to'))
            ->message($request->getParam('message'))
            ->send();

        return $response->withredirect($this->router->pathFor('home'));
    }
}