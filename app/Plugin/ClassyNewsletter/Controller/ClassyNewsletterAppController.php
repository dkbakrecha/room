<?php

/*
 * Controller/FullCalendarAppController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

class ClassyNewsletterAppController extends AppController
{
	//	var $components = array('Acl', 'Session');
	var $components = array('Session');
	var $helpers = array('Html', 'Form', 'Session', 'Js' => array('Jquery'));

	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->loginAction = array(
			'admin' => false,
			'controller' => 'users',
			'action' => 'login',
			'plugin' => false,
		);

		if (isset($this->request->params['admin']))
		{
			$this->Auth->loginAction = array(
				'admin' => true,
				'plugin' => false,
				'controller' => 'Users',
				'action' => 'admin_login'
			);
		}
	}

}
?>