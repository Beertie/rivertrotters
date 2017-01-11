<?php

namespace App\Lib\Nbb;

class Nbb{


    public $url = "http://db.basketball.nl/db/json/wedstrijd.pl";

    function __construct($club_id = 81)
    {
        $this->url .= "?clb_ID=$club_id";
    }

    public function getAllGames(){

        $games = file_get_contents($this->url);
        $games = json_decode($games);

        return $games;

    }

    public function getThisWeek($week_number = null){
        $games = $this->getAllGames();

        if($week_number == null ){
            $week_number = $this->getWeekNumber();
        }

        $date = $this->getStartAndEndDate(($week_number -1), 2017);

        $week = [];
        foreach ($games->wedstrijden as $game){
            if($game->datum == null){
                continue;
            }

            $unix_time = strtotime($game->datum);

            if($unix_time > strtotime($date[0]) AND $unix_time < strtotime($date[1])){
                $week[] = $game;
            }

        }

    }

    public function getLastWeek(){

    }


    public function getStartAndEndDate($week, $year)
    {

        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7*$week)+1-$day)*24*3600;
        $return[0] = date('Y-n-j', $time);
        $time += 6*24*3600;
        $return[1] = date('Y-n-j', $time);
        return $return;
    }

    public function getWeekNumber(){
        $ddate = time();
        $date = new \DateTime($ddate);
        $week = $date->format("W");
        return $week;
    }


}