<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Games Controller
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
        $games = "";

        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }


}
