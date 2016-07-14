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
 
class ClassyFeedbackController extends ClassyNewsletterAppController {

	var $name = 'ClassyFeedback';
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}


	function index() {
		
	}

}
?>
