<?php

App::uses('AppController', 'Controller');

class PaymentsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Admin - Payment ');
        $this->loadModel('User');
        $cond = array();
        $cond['User.role'] = 2;
        $cond['User.status'] = 1;
        $userList = $this->User->find('list', array(
            'conditions' => array($cond),
        ));
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (isset($data) && !empty($data)) {

                if ($this->Payment->save($data)) {
                    $userTableEntry['User']['id'] = $data['Payment']['user_id'];
                    $userTableEntry['User']['plan_id'] = $data['Payment']['plan_id'];
                    $this->User->save($userTableEntry);
                    $this->Session->setFlash('Payment Data saved.', 'default', array('class' => 'alert alert-success'));
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->Session->setFlash('Some error.', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect(array('action' => 'admin_index'));
                }
            } else {
                $this->Session->setFlash('Data not set.', 'default', array('class' => 'alert alert-danger'));
                $this->redirect(array('action' => 'admin_index'));
            }
        }

        $this->set(compact('userList'));
    }

}
