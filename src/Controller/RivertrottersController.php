<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Nbb;

/**
 * Rivertrotters Controller
 *
 * @property \App\Model\Table\RivertrottersTable $Rivertrotters
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
        $games = file_get_contents('http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=81');
        $games = json_decode($games);

        $filter = ['h1', 'h2', 'h3', 'd1'];

        $options = [ 1 => 'Thuis', 2 => 'Uit' ];

        $nbb = new Nbb();
        $home_games_this_weekends = $nbb->getThisWeek(true);

        //debug($home_games_this_weekends);

        $home_games_this_weekend = $home_games_this_weekends;
        foreach ($home_games_this_weekends as $game){

            //debug($game);
            //$nbb->getStatsComp($game->cmp_id);

        }

        //exit;

        $this->set(compact('games', 'filter', 'options', 'home_games_this_weekend'));
        $this->set('_serialize', ['games', 'filter', 'options']);
    }
}
