<?php
App::uses('AppModel', 'Model');

class RoomOption extends AppModel {
    
    public $belongsTo = array(
        'Facility'
    );
    
}