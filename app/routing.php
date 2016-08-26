<?php

$app->match('/card/list/{action}', "card.list.controller:initAction")
    ->value('action', '')
    ->bind('card_list')
    ->method('GET|POST')
;

$app->match('/card/form/{action}', "card.form.controller:initAction")
    ->value('action', '')
    ->bind('card_form')
    ->method('GET|POST')
;
