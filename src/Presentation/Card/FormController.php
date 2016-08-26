<?php

namespace Cards\Presentation\Card;

use Cards\Components\Controller;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    private $cardListUrl;

    protected function setup()
    {
        $this->cardListUrl = $this->app['url_generator']->generate('card_list');
    }

    public function indexAction()
    {
        $cardId = $this->request->query->get('id');
        if (!empty($cardId)) {
            $this->model->selectCardId($cardId);
        }
    }

    public function saveAction()
    {
        $cardId = $this->request->query->get('id');
        $hasCardId = $this->request->query->has('id') && !empty($cardId);
        $cardData = $this->request->request->get('card');

        if (!$hasCardId) {
            $this->model->addNewCard($cardData);

            return $this->app->redirect($this->cardListUrl);
        }

        $this->model->updateCard($cardId, $cardData);

        return $this->app->redirect($this->cardListUrl);
    }

    public function deleteAction()
    {
        $cardId = $this->request->query->get('id');

        $this->model->deleteCard($cardId);

        return $this->app->redirect($this->cardListUrl);
    }
}
