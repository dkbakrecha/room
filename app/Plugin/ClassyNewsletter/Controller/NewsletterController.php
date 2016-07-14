<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsletterController extends ClassyNewsletterAppController {
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function add() {
		$this->loadModel('newsletter');
		$request = $this->request;
		
		if(!empty($request->data)){
			$_data = $request->data;
			
			$_data['Newsletter']['email_address'] = $_data['ne'];
			
			if($this->Newsletter->save($_data)){
				$this->Session->setFlash('Newsletter saved successfully','default',array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'users','action' => 'index','plugin' => false));
			}
			//prd($_data);
		}
	}
}