<?php

$app->get('/', 'HomeController:index');

$app->post('/send', 'App\Controllers\SmsController:send');