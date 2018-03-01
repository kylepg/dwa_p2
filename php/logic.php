<?php
require 'php/Filter.php';

$player = $_GET['player'] ?? null;
$team = $_GET['team'] ?? 'all';

# Instantiate a new filter object
$filter = new Filter($team, $player);

# Use object to get data and return filtered array
$teamList = $filter->teamInfo;
$filteredResults = $filter->results;
