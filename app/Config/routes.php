<?php

Router::connect('/', array('controller' => 'rooms', 'action' => 'index'));
Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => TRUE));


Router::connect('/about-us', array('controller' => 'pages', 'action' => 'about'));
Router::connect('/terms-and-conditions', array('controller' => 'pages', 'action' => 'terms'));
Router::connect('/contact-us', array('controller' => 'pages', 'action' => 'contact'));

Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));


Router::connect('/start-your-business', array('controller' => 'users', 'action' => 'beagent'));


CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
