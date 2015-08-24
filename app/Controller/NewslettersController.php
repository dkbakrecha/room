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
            $data['Category']['code'] = strtoupper($data['Category']['code']);
            //prd($data);
            if ($this->Category->save($data)) {
                $this->Session->setFlash('Category added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Category could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function admin_edit($id) {
        $cateData = $this->Category->findById($id);

        if (!empty($this->request->data)) {
            $data = $this->request->data;
            //prd($data);
            if ($this->Category->save($data)) {
                $this->Session->setFlash('Category added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Category could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }

        $this->request->data = $cateData;
    }

}
