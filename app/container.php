<?php

$container = $app->getContainer();

################################### Service ###################################
// View engine
$container['view'] = function ($container) {
    $settings = $container->get('settings');

    $view = new \Slim\Views\Twig(
        $settings['view']['template_path'],
        $settings['view']['twig']
    );
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->get('router'),
        $container->get('request')->getUri())
    );
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['sms'] = function ($container) {
    $settings = $container->get('settings')['sms-gateway'];

    $sms = new \App\Extensions\Sms\SmsHandler(
        $settings['user_key'],
        $settings['pass_key']
    );

    return $sms;
};

################################# Controllers #################################
$container['HomeController'] = function ($container) {
    return new \App\Controllers\HomeController($container);
};