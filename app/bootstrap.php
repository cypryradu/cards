<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

require_once 'utilities.php';

$app = new Silex\Application();

require_once 'dependencies.php';
require_once 'routing.php';

$app['config'] = require 'config.php';
$app['debug'] = $app['config']['debug'];

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => [ LAYOUTS_PATH ]
));

return $app;
