<?php

Router::connect('/', array('controller' => 'rooms', 'action' => 'listing'));
Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => TRUE));


CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';