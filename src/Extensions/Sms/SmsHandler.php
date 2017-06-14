<?php

namespace App\Extensions\Sms;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException as GuzzleException;

/**
* 
*/
class SmsHandler
{
    protected $userKey;
    protected $passKey;
    protected $request;
    protected $url = 'https://reguler.zenziva.net/apps/smsapi.php';

    public function __construct($userKey, $passKey)
    {
        $this->userKey = $userKey;
        $this->passKey = $passKey;
        $this->request = new Client;
    }

    public function to($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function message(string $message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        $request = $this->setRequest();

        try {
            $client = $this->request->request('GET', $this->url, $request);
        } catch (GuzzleException $e) {
            return false;
        }

        return true;
    }

    private function setRequest()
    {
        return $request = [
            'query' => [
                'userkey' => $this->userKey,
                'passkey' => $this->passKey,
                'nohp'    => $this->receiver,
                'pesan'   => $this->message
            ]
        ];
    }
}