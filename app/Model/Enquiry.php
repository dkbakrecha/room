<?php
App::uses('AppModel', 'Model');

class Enquiry extends AppModel {
    
    public $belongsTo = array(
        'Room'
    );        
    
}