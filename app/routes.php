<?php

$app->get('/', 'SmsController:get')->setName('home');
$app->post('/', 'SmsController:post');