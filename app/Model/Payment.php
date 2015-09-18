<?php
App::uses('AppModel', 'Model');

class Payment extends AppModel {

    public $belongsTo = array(
        'Plan' => array(
            'className' => 'Plan',
            'foreignKey' => 'plan_id',
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'fields' => array('id','name','email','role','exp_date','status')
        ),
    );
    
}