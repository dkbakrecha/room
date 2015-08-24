<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'admin_login', 'opauth_complete', 'req_complete','register');
    }

    public function opauth_complete() {
        debug($this->data);
    }

    public function req_complete() {
        $authCode = trim($this->request->query("code"));


        // Exchange authorization code for access token
        $accessToken = $this->client->authenticate($authCode);
        $this->client->setAccessToken($accessToken);


        pr($accessToken);
        prd($oAuthToken);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        }
    }
    
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'profile'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        }
    }
    
    public function profile() {
    
        
    }

    public function index() {
        
    }
    
    public function edit_profile(){
        //pr($this->user_info);
        //$this->request->data['User'] = $this->user_info;
    }

    public function login() {

        if ($this->request->is('Post')) {
            //prd($this->Auth);
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_login() {
        $this->set('title_for_layout', 'Admin Login');

        if (isset($this->Session) && $this->Session->read('Auth.Admin.id') != '') {
            $this->redirect($this->Auth->loginRedirect);
        }

        AuthComponent::$sessionKey = 'Auth.Admin';

        $this->layout = "admin_login";

        if ($this->request->is('post')) {
            $data = $this->request->data;

            if (empty($data['User']['email']) || empty($data['User']['password'])) {
                $this->Session->setFlash('Invalid Login.');
                $this->redirect($this->Auth->loginAction);
            }

            $username_email = $data['User']['email'];

            //$conditions['OR'][0]['email'] = $username_email;
            //$conditions['OR'][1]['username'] = $username_email;
            $conditions['email'] = $username_email;
            $conditions['password'] = AuthComponent::password($data['User']['password']);
            $conditions['role'] = 0;

            $userDetail = $this->User->find("first", array('conditions' => $conditions));

            if (isset($userDetail['User'])) {
                $this->Auth->login($userDetail['User']);

                /*
                  if ($data['User']['Remember_me'] == 1) {
                  $expire = time() + 3600 * 24 * 30;

                  setcookie("username_email", $data['User']['username_email'], $expire);
                  setcookie("password", $data['User']['password'], $expire);
                  setcookie("remember_me", true, $expire);
                  } else {
                  setcookie("username_email", '', -1);
                  setcookie("password", '', -1);
                  setcookie("remember_me", false, -1);
                  }
                 */

                $this->Session->setFlash('Welcom Admin', 'default', array('class' => 'alert alert-success'));
                $this->redirect($this->Auth->loginRedirect);
            } else {
                $this->Session->setFlash('Invalid Login', 'default', array('class' => 'alert alert-danger'));
                $this->redirect($this->Auth->loginAction);
            }
        }
    }

    public function admin_logout() {
        $user = $this->Auth->user();
        $this->Session->destroy();
        $this->Session->setFlash(sprintf(__d('users', '%s you have successfully logged out'), $user[$this->{$this->modelClass}->displayField]), 'default', array('class' => 'alert alert-success'));
        $this->redirect($this->Auth->logout());
    }

    public function admin_dashboard() {
        $this->loadModel('Room');
        $this->loadModel('Enquiry');
        
        $statics = array();
        $statics['pending_user']  = $this->User->find('count',array('conditions' => array('User.status = 3')));
        $statics['total_user']  = $this->User->find('count');
        
        $statics['pending_room']  = $this->Room->find('count',array('conditions' => array('Room.status = 3')));
        $statics['total_room']  = $this->Room->find('count');
        
        $statics['total_enquiry']  = $this->Enquiry->find('count');
        
        $this->set('statics',$statics);
    }

    public function admin_index() {
        $userList = $this->User->find('all', array('conditions' => array('User.status !=' => 2, 'User.role !=' => 0)));
        $this->set('userList', $userList);
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            if ($this->User->save($data)) {
                $this->Session->setFlash('User added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash('User could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

}