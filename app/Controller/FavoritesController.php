<?php

App::uses('AppController', 'Controller');

class FavoritesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    public function index() {
        $favList = $this->Favorite->find('all', array(
            'conditions' => array(
                'Favorite.user_id' => $this->user_id,
                'Favorite.status' => 1
            ),
            'recursive' => 2
        ));
        
        $this->set('favList', $favList);
    }

}
