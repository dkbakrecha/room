<?php

/*
 * Controller/FullCalendarController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

class ClassyNewsletterController extends ClassyNewsletterAppController {

    var $name = 'ClassyNewsletter';
    var $uses = array('Newsletter');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'add');
    }

    function index() {
        
    }

    public function add() {
        $request = $this->request;
        if(!empty($request)) {
            $dataN = $request['data'];
            //pr($dataN);
            $nData = $this->Newsletter->find('first', array('conditions' => array(
                    'Newsletter.email' => $dataN['ne'])));

            if (!empty($nData)) {
                $dataN['Newsletter']['id'] = $nData['Newsletter']['id'];
            }
            $dataN['Newsletter']['email'] = $dataN['ne'];
            
            $this->Newsletter->save($dataN);
            $this->redirect(array(
                'admin' => false,
                'plugin' => false,
                'controller' => 'newsletters',
                'action' => 'success'
            ));
        }
    }

    public function admin_index() {
        $this->loadModel('Newsletter');

        $allNewsletters = $this->Newsletter->find('all');
        $this->set('NewsletterList', $allNewsletters);
    }

}

?>
