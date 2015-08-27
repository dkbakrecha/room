<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Contact extends AppModel {

	public $validate = array(
		'name' => array(
			'rule' => 'alphaNumeric',
            'message' => 'Only alphabets and numbers allowed',
            'required' => true,
            'allowEmpty' => false,
		),
		'email' => array(
			'rule' => 'email',
            'required' => true,
            'allowEmpty' => false,
		),
		'subject' => array(
			'length' => array(
				'rule' => array('minLength', 10),
	            'required' => true,
	            'allowEmpty' => false,
	            'message' => 'Minimum required length is 10 characters.'
            ),
            'notEmpty' => array(
            	'rule' => 'notEmpty',
    			'required' => true,	
    			'message' => 'This field cannot be left blank',
            ),
		),
		'message' => array(
            'rule' => 'notEmpty',
    		'required' => true
		),
    );
}