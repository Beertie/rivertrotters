<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\Nbb\Nbb;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 */
class TeamsController extends AppController
{
    public function index($id){

        $team = $this->Teams->get($id);

        $comp_id = $team->comp_id_1;
        if($team->comp_id_2 != null){
            $comp_id = $team->comp_id_2;
        }

        $nbb = new Nbb();

        $stand = $nbb->getScore($comp_id);

        $competition = $nbb->getCompetition($comp_id);

        $this->set(compact('team', 'competition', 'stand'));
        $this->set('_serialize', ['team']);

    }

    public function roster($id){

    }

    public function standing(){

    }

    public function schedule(){

    }

    public function gallery(){

    }

}
