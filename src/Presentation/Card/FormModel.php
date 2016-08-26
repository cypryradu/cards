<?php

namespace Cards\Presentation\Card;

use Cards\Components\Model;

class FormModel extends Model
{
    private $session;

    private $dataFile = 'cards.json';
    private $selectedCardId = 0;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function isUpdateMode()
    {
        return (bool) $this->selectedCardId;
    }

    public function selectCardId($cardId)
    {
        $this->selectedCardId = $cardId;
    }

    public function getSelectedCard()
    {
        $cards = $this->getAllCards();

        $selectedCards = array_filter($cards, function ($card) {
            return $card['id'] == $this->selectedCardId;
        });

        return array_shift($selectedCards);
    }

    private function getAllCards()
    {
        return readDataFromJsonFile($this->dataFile);
    }

    public function addNewCard($data)
    {
        $cards = $this->getAllCards();

        $cardIds = array_column($cards, 'id');
        $cardIds[] = 0;

        $maxId = max($cardIds);
        $data['id'] = $maxId + 1;

        $cards[] = $data;

        $this->saveCards($cards);
    }

    public function updateCard($cardId, $data)
    {
        $cards = $this->getAllCards();

        $data['id'] = $cardId;
        foreach ($cards as $key => $card) {
            if ($cardId == $card['id']) {
                $cards[$key] = $data;
                break;
            }
        }

        $this->saveCards($cards);
    }

    public function deleteCard($cardId)
    {
        $cards = $this->getAllCards();

        $remainingCards = array_filter($cards, function ($card) use ($cardId) {
            return $card['id'] !== (int) $cardId;
        });

        $this->saveCards($remainingCards);

        $this->session->getFlashBag()->add('success_message', 'Card successfully deleted!');
    }

    private function saveCards($cards)
    {
        saveDataToJsonFile($this->dataFile, $cards);
    }
}
