<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP EnquiriesController
 * @author Jay Soni
 */
class EnquiriesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow(
                'index'
        );
    }

    public function index() {
        $this->layout = 'ajax';
        $this->loadModel('Enquiry');
        $this->loadModel('User');
        $request = $this->request;
        $id = $request->query['room_id'];

        if (!empty($id) && is_numeric($id)) {
            $requestData = $request->data;
            if (isset($requestData) && !empty($requestData)) {
                $user = $this->User->find('first', array(
                    'conditions' => array('User.email' => $requestData['Enquiry']['email']),
                ));

                $enq = array();
                $enq['Enquiry']['user_id'] = ($user['User']['id']) ? $user['User']['id'] : 0;
                $enq['Enquiry']['room_id'] = $id;
                $enq['Enquiry']['fname'] = $requestData['Enquiry']['name'];
                $enq['Enquiry']['email'] = $requestData['Enquiry']['email'];
                $enq['Enquiry']['phone'] = $requestData['Enquiry']['phone_number'];
                $enq['Enquiry']['message'] = $requestData['Enquiry']['message'];
                $enq['Enquiry']['status'] = 1;

                if ($this->Enquiry->save($enq)) {
                    $this->flash_msg('Thanks for showing interest, we will contact you soon.', 1);
                } else {
                    $this->flash_msg('Some Error while sending your request, Please try again :(', 2);
                }
            }
        }
    }
    
    public function admin_index(){
        $enqList = $this->Enquiry->find('all', array(
            'conditions' => array(
                'Enquiry.status !=' => 2,
            ),
            'order' => array('Enquiry.created desc')
        ));
        $this->set('enqList', $enqList);
    }

}