<?php
App::uses('AppModel', 'Model');

class Favorite extends AppModel {
    
    public $belongsTo = array(
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'room_id',
        ),
    );
        
}