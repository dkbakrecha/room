<?php
App::uses('AppController', 'Controller');

class AlbumsController extends AppController {

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
        $albumList = $this->Album->find('all',array('conditions' => array('Album.status !=' => 2)));
        $this->set('albumList' , $albumList);
	}
    
    public function admin_add() {
        if(!empty($this->request->data)){
            $data = $this->request->data;
            
            if($this->Album->save($data)){
                $this->Session->setFlash('Album added successfully.', 'default', array('class' => 'alert alert-success'));
            }else{
                $this->Session->setFlash('Album could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
	}
}