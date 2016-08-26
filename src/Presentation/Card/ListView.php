<?php

namespace Cards\Presentation\Card;

use Cards\Components\View;

class ListView extends View
{
    protected $templateDir = __DIR__ . '/templates';
    protected $template = 'card-list.twig.html';

    public function init()
    {
        $this->data['cards'] = $this->model->getCards();
    }
}
