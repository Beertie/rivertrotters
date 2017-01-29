<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Utility\Text;

/**
 * Import shell command.
 *
 * @property \App\Model\Table\TeamsTable $Teams
 */
class ImportShell extends Shell
{

   public function __construct($io)
   {
       //Load Models
       $this->loadModel("Teams");

       parent::__construct($io);
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
}
