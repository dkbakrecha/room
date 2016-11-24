<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Field is required'
            ),
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Field is required'
            ),
            'validEmail' => array(
                'rule' => array('email'),
                'message' => 'Please enter valid email address.'
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'This email id already exists.'
            )
        ),
        'contact_no' => array(
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'This contact number already exists.'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

}
