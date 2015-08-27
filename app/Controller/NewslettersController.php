<?php

App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index() {
        $letterList = $this->Newsletter->find('all', array('conditions' => array('Newsletter.status !=' => 2)));
        $this->set('letterList', $letterList);
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $data['Newsletter']['status'] = 1;
            if ($this->Newsletter->save($data)) {
                $this->Session->setFlash('Newsletter added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Newsletter could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function admin_edit($id) {
        $newsData = $this->Newsletter->findById($id);

        if (!empty($this->request->data)) {
            $data = $this->request->data;
            //prd($data);
            if ($this->Newsletter->save($data)) {
                $this->Session->setFlash('Newsletter added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Newsletter could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }

        $this->request->data = $newsData;
    }

}
