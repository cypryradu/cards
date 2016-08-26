<?php

namespace Cards\Components;

use Cards\Components\Model;

abstract class View
{
    protected $model;
    protected $twig;
    protected $templateDir;
    protected $data;
    protected $template;
    public $flashBag;

    public function __construct($model, $twig)
    {
        $this->model = $model;
        $this->twig = $twig;

        $this->twig->getLoader()->addLoader(
            new \Twig_Loader_Filesystem($this->templateDir)
        );
    }

    abstract public function init();

    public function output()
    {
        $this->init();

        $this->data['layout'] = $this->model->getLayout();

        return $this->twig->render($this->template, $this->data);
    }
}
