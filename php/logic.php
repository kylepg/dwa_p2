<?php
require 'php/Search.php';
require 'php/Form.php';

use DWA\Form;

$form = new Form($_GET);

$playerSearch = $form->get('player', null);
$teamSearch = $form->get('team', null);
$photos= $form->get('photos','show');

$errors = $form->validate(
    [
        'player' => 'charMin:1',
    ]
);

$search = new Search($teamSearch, $playerSearch);

$teamList = $search->teamInfo;
$searchResults = $search->results;
