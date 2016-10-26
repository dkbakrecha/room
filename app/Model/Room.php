<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Room extends AppModel {
    
    var $virtualFields = array(
        'room_code' => "CONCAT(Room.unique_code,Room.unique_number)"
    );

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Room title is required'
            ),
        ),

    );
    
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
        ),
    );
        
    public $hasMany = array(
        'RoomOption' => array(
            'foreignKey' => 'room_id',
        )
    );
    
    public function beforeSave($options = array()) 
    {
        
    }
}