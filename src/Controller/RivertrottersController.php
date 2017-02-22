<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Nbb;

/**
 * Rivertrotters Controller
 *
 */
class RivertrottersController extends AppController
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

        $nbb = new Nbb();
        $home_games_this_weekends = $nbb->getThisWeek(true);


        $home_games_this_weekend = $home_games_this_weekends;
        foreach ($home_games_this_weekends as $game){

            //debug($game);
            //$nbb->getStatsComp($game->cmp_id);

        }

        //exit;

        $this->set(compact('home_games_this_weekend'));
        $this->set('_serialize', ['games', 'filter', 'options']);
    }

    public function games(){

    }

    public function tasks(){

    }

    public function results(){

    }

    public function teams(){

    }


}
