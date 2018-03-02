<?php
require 'php/Search.php';

$playerSearch = $_GET['player'] ?? null;
$teamSearch = $_GET['team'] ?? null;
$photos= $_GET['photos'] ?? 'show';

$search = new Search($teamSearch, $playerSearch);

$teamList = $search->teamInfo;
$searchResults = $search->results;
