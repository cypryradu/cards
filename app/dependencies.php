<?php

require_once 'modules.php';

foreach ($modules as $moduleName => $module) {
    $lcModuleName = strtolower($moduleName);
    foreach ($module['pages'] as $page) {
        $lcPage = strtolower($page);
    }
}

// CARD - LIST
$app['card.list.model'] = function () use ($app) {
    return new Cards\Presentation\Card\ListModel();
};

$app['card.list.view'] = function () use ($app) {
    return new Cards\Presentation\Card\ListView($app['card.list.model'], $app['twig']);
};

$app['card.list.controller'] = function () use ($app) {
    return new Cards\Components\GenericController($app, $app['card.list.model'], $app['card.list.view']);
};

// CARD - FORM
$app['card.form.model'] = function () use ($app) {
    return new Cards\Presentation\Card\FormModel($app['session']);
};

$app['card.form.view'] = function () use ($app) {
    return new Cards\Presentation\Card\FormView($app['card.form.model'], $app['twig']);
};

$app['card.form.controller'] = function () use ($app) {
    return new Cards\Presentation\Card\FormController($app, $app['card.form.model'], $app['card.form.view']);
};
