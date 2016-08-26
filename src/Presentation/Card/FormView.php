<?php

namespace Cards\Presentation\Card;

use Cards\Components\View;

class FormView extends View
{
    protected $templateDir = __DIR__ . '/templates';
    protected $template = 'card-form.twig.html';

    public function init()
    {
        $this->data['button_value'] = "Add Card";
        if ($this->model->isUpdateMode()) {
            $this->data['button_value'] = "Update Card";
        }

        $this->data['card'] = $this->model->getSelectedCard() ?: [
            'id' => '',
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'jobtitle' => '',
            'website' => '',
            'company' => '',
            'country' => '',
            'county' => '',
            'town' => '',
        ];
    }
}
