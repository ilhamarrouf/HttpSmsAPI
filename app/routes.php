<?php

$app->get('/', 'App\Controllers\SmsController:get')->setName('home');
$app->post('/', 'App\Controllers\SmsController:post');