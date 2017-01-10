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
     */
    public function index()
    {
        $games = file_get_contents('http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=81');
        $games = json_decode($games);

        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }


}
