<?php
App::uses('AppController', 'Controller');

class FacilitiesController extends AppController {

	public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index() {
    
    }
    
    
    /*  ==========  ADMIN SECTION  ==========  */
    
    public function admin_index() {
        $cateList = $this->Facility->find('all',array('conditions' => array('Facility.status !=' => 2)));
        $this->set('cateList' , $cateList);
	}
    
    public function admin_add() {
        if(!empty($this->request->data)){
            $data = $this->request->data;
            if($this->Facility->save($data)){
                $this->Session->setFlash('Facility added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash('Facility could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
	}
        
        public function admin_edit($id) {
        $facilityData = $this->Facility->findById($id);
        
        if(!empty($this->request->data)){
            $data = $this->request->data;
            //prd($data);
            if($this->Facility->save($data)){
                $this->Session->setFlash('Facility added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash('Facility could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
        
        $this->request->data = $facilityData;
	}

}