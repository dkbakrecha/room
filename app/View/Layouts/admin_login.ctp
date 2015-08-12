<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
            'bootstrap/bootstrap',
            'admin/css',
            'admin/app',
            'admin/styles',
            ));
        
        echo $this->Html->script(array(
            'admin/jquery-1',
            'admin/bootstrap',
            ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="bg-primary">
        	<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
            <?php //echo $this->element('admin/footer'); ?>
        
        <footer class="container-fluid footer">
        	Copyright © <?php echo date("Y"); ?>. <a href="http://classyarea.com/" target="_blank">ClassyArea.com</a>
        </footer>
</body>
</html>