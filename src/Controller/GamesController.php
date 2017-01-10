<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Games Controller
 *
 * "alt": "River Trotters",
"adres": "Postbus 9",
"shirt": "Geel",
"plaats": "Hardinxveld-Giessendam",
"web": "http://www.rivertrotters.nl/",
"org_id": "2",
"id": "81",
"naam": "River Trotters",
"postcode": "3370AA",
"vestpl": "Hardinxveld-Giessendam",
"nr": "2182"
 *
 */
class GamesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     *
     * date      : alleen wedstrijden ophalen die bijgewerkt zijn na deze datum.
    datum moet in formaat yyyy-mm-dd HH:MM:SS zijn
     */
    public function index()
    {
        $games = file_get_contents('http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=81');
        $games = json_decode($games);

        $filter = ['h1', 'h2', 'h3', 'd1'];

        $options = [ 1 => 'Thuis', 2 => 'Uit' ];

        $this->set(compact('games', 'filter', 'options'));
        $this->set('_serialize', ['games', 'filter', 'options']);
    }

    public function week(){

        $games = file_get_contents('http://db.basketball.nl/db/json/wedstrijd.pl?seizoen=2017&clb_ID=81');
        $games = json_decode($games);

        $week = [];
        foreach ($games->wedstrijden as $game){
            if($game->datum == null){
                continue;
            }

            $unix_time = strtotime($game->datum);
            //1484179200
            //1484438400

            if($unix_time > 1484179200 AND $unix_time < 1484438400){
                $week[] = $game;
            }

        }


        $this->set(compact('week'));
        $this->set('_serialize', ['week']);
    }


}
