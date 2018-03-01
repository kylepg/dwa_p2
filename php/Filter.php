<?php

class Filter
{
    # Get team and player data
    private $playerJson;
    private $playerInfo;

    private $teamJson;
    public $teamInfo;

    public $results = [1,2];

    public function __construct($team = 'all', $player = null)
    {
        $this->playerJson = file_get_contents('./data/players.json');
        $this->playerInfo = json_decode($this->playerJson);
        $this->teamJson = file_get_contents('./data/teams.json');
        $this->teamInfo = json_decode($this->teamJson);
        $this->teamInfo = $this->teamInfo->tms->t;

        if ($team !== 'all') {
            echo '1';
            $this->searchTeam($team);
        } elseif ($player !== null) {
            echo '2';
            $this->searchPlayer($player);
        } else {
            echo '3';
            $this->team();
        }
    }

    public function searchPlayer()
    {
        $this->results = 'PLAYER SEARCH';
    }

    public function team($team = 'all')
    {
        // for ($i = 0; $i < sideof($this->playerJson); $i++){
        //     $this->results.push()
        // }
        if ($team = 'all') {
            $this->results = $this->playerInfo;
        } else {
            foreach ($this->playerInfo as $player) {
                if ($player[2] == $team) {
                    $this->results.push($player);
                }
            }
        }
    }
}
