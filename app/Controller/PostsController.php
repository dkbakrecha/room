<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index() {
        $data = $this->request->data;
        
    
    }
    
    
    /*  ==========  ADMIN SECTION  ==========  */
    
    public function admin_index() {

	}
    
    public function admin_add() {

	}
}