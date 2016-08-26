<?php

namespace Cards\Presentation\Card;

use Cards\Components\Model;

class ListModel extends Model
{
    public function getCards()
    {
        return readDataFromJsonFile('cards.json');
    }
}
