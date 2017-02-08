<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Utility\Text;

/**
 * Import shell command.
 *
 *
 * @property \App\Model\Table\TeamsTable $Teams
 * @property \App\Model\Table\YearsTable $Years
 * @property \App\Model\Table\HistoryTeamsTable $HistoryTeams
 */
class ImportShell extends Shell
{

   public function __construct()
   {
       //Load Models
       $this->loadModel("Teams");
       $this->loadModel("Years");
       $this->loadModel("HistoryTeams");

       parent::__construct();
   }

    /**
     * Syc teams form NBB api to local DB
     */
    public function sycTeams(){
        //Get all team
        $url = "http://db.basketball.nl/db/json/team.pl?clb_ID=81";

        //Get json file for api

        //TODO set to api
        $teams = file_get_contents($url);
        $teams = json_decode($teams);


        //TODO filter if there is dubbel comp_id

        //TODO create team categorys for menu
        foreach ($teams->teams as $team){

            //Create new team entity
            $teamEntities = $this->Teams->newEntity();
            $teamEntities->name = $team->naam;

            //Create slug
            $teamEntities->slug = strtolower(Text::slug(trim($team->naam)));
            $teamEntities->nbb_id = $team->id;
            $teamEntities->comp_id = $team->comp_id;

            //Save team
            $this->Teams->save($teamEntities);
        }

    }

    public function addYears(){

        for ($i = 1997; $i < 2016; $i++){
            echo $i. " - ". ($i +1)."\n";

            $year = $this->Years->newEntity();
            $year->name = $i. " - ". ($i +1);
            $year->start = $i;
            $year->end = ($i + 1);
            $year->sort_order = ($i - 1996);
            $this->Years->save($year);


        }
    }

    public function importTeams(){
        //Get years

        $years = $this->Years->find();

        foreach ($years as $year){

            //Get the comp

            $url = "http://db.basketball.nl/db/json/team.pl?clb_ID=81&seizoen=".$year->start."-".$year->end;

            $teams = file_get_contents($url);
            $teams = json_decode($teams);

            //Merge teams
            $mTeams = [];
            foreach ($teams->teams as $team){
                if(!isset($mTeams[$team->id]['name'])){
                    $mTeams[$team->id]['name'] = $team->naam;
                    $mTeams[$team->id]['nbb'] = $team->id;
                    $mTeams[$team->id]['comp_id_1'] = $team->comp_id;
                    $mTeams[$team->id]['comp_id_2'] = null;
                }else{
                    $mTeams[$team->id]['comp_id_2'] = $team->comp_id;
                }
            }

            //debug($mTeams);

            //Save teams
            foreach ($mTeams as $mTeam){
                $hisTeam = $this->HistoryTeams->newEntity();
                $hisTeam->name = $mTeam['name'];
                $hisTeam->slug = strtolower(Text::slug(trim($mTeam['name'])));
                $hisTeam->nbb_id = $mTeam['nbb'];
                $hisTeam->comp_id_1 = $mTeam['comp_id_1'];
                $hisTeam->comp_id_2 = $mTeam['comp_id_2'];
                $hisTeam->year_id = $year->id;

                $this->HistoryTeams->save($hisTeam);
            }


        }


    }
}
