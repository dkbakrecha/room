<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'admin_login', 'register', 'login','beagent');
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
            $data = $this->request->data;
            $data['User']['role'] = 1;
            $data['User']['status'] = 3;
            //prd($data);
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'profile'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        }
    }
    
    public function beagent() {
        if ($this->request->is('post')) {
            $this->User->create();
            $data = $this->request->data;
            $data['User']['role'] = 2;
            $data['User']['status'] = 3;
            //prd($data);
            if ($this->User->save($data)) {
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

    public function dashboard() {
        $this->loadModel('Room');
        $_userId = $this->_getCurrentUserId();
        $userRooms = $this->Room->find('all',array(
            'conditions' => array(
                'Room.created_by' => $_userId,
                'Room.status !=' => 2,
            )
        ));
        
        $this->set('userRooms',$userRooms);
    }

    public function index() {
        
    }

    public function edit_profile() {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->write('Auth.User.first_name',$this->request->data['User']['first_name']);
                $this->Session->write('Auth.User.last_name',$this->request->data['User']['last_name']);
                $this->Session->write('Auth.User.contact_no',$this->request->data['User']['contact_no']);
                
                $this->Session->setFlash(__('Your profile has been update has been saved !'),'success');
                return $this->redirect(array('action' => 'dashboard'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function login($from = 0) {
        if (!empty($this->user_id)) {
            $this->redirect(array('controller' => 'rooms', 'action' => 'listing'));
        }

        if ($from == 1) {
            $this->layout = "ajax";
            $this->set('from', '1');
        }

        if ($this->request->is('Post')) {
            //prd($this->Auth);
            if ($this->Auth->login()) {
                $userData = array();
                $userData['User']['id'] = $this->_getCurrentUserId();
                $userData['User']['last_login'] = date("Y-m-d H:i");
                
                if (!empty($userData)) {
                    $updateUser = $this->User->save($userData);
                }
                
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
        $statics['pending_user'] = $this->User->find('count', array('conditions' => array('User.status = 3')));
        $statics['total_user'] = $this->User->find('count', array('conditions' => array('User.status = 1')));

        $statics['pending_room'] = $this->Room->find('count', array('conditions' => array('Room.status = 3')));
        $statics['total_room'] = $this->Room->find('count');

        $statics['total_enquiry'] = $this->Enquiry->find('count');

        $statics['latest_enquiry'] = $this->Enquiry->find('all', array(
            'limit' => '5',
            'order' => array('id desc')
        ));

        $this->set('statics', $statics);
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

    public function admin_delete($user_id) {
        $userData = array();
        $userData['User']['id'] = $user_id;
        $userData['User']['status'] = 2;

        $this->User->save($userData);
        $this->redirect(array('action' => 'index'));
    }

}
