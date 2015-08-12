<?php
App::uses('AppController', 'Controller');

class ProductsController extends AppController {

	public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    

    public function index(){
        
    }
    
    /********** ADMIN SECTION  **********/

    public function admin_index() {
        
	}
    
    public function admin_add() {

	}

}