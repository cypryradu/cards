<?php

namespace Cards\Components;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class Controller
{
    protected $app;
    protected $model;
    protected $view;
    protected $request;

    public function __construct(Application $app, Model $model, View $view)
    {
        $this->app = $app;
        $this->model = $model;
        $this->view = $view;
    }

    public function initAction(Request $request, $action)
    {
        $this->callSetup();

        $this->request = $request;
        if (empty($action)) {
            $action = 'index';
        }
        $actionName = camelize($action) . 'Action';

        $response = null;
        if (method_exists($this, $actionName)) {
            $response = call_user_func([$this, $actionName]);
        }

        if ($response) {
            return $response;
        }

        if ($this->view) {
            return $this->view->output();
        }

        throw new \InvalidArgumentException(sprintf("Action (%s) is not defined in %s!", $action, static::class));
    }

    private function callSetup()
    {
        if (method_exists($this, 'setup')) {
            call_user_func([$this, 'setup']);
        }
    }
}
