<?php

define('APPLICATION_PATH', dirname(__DIR__));
define('SRC_PATH', APPLICATION_PATH . '/src');
define('LAYOUTS_PATH', APPLICATION_PATH . '/src/Presentation/layouts');
define('DEFAULT_LAYOUT_FILE', 'main.twig.html');
define('EMPTY_LAYOUT_FILE', 'empty.twig.html');

define('DEFAULT_MODULE', 'card');
define('DEFAULT_PAGE', 'list');

$config = [
    'debug' => true,
    'layout' => 'main.twig.html'
];

return $config;
