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
$cakeDescription = __d('cake_dev', 'ROOM247.in: New Room Listing Concept');
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
            'datatable/jquery.dataTables.min',
            'datatable/dataTables.bootstrap.min',
            'admin/css',
            'admin/app'
        ));

        echo $this->Html->script(array(
            'admin/jquery-1',
            'admin/bootstrap',
            'admin/jquery',
            '//code.jquery.com/ui/1.11.4/jquery-ui.js',
            'jquery.form.min',
            'admin/wysihtml5-0',
            'admin/bootstrap3-wysihtml5',
            'datatable/jquery.dataTables.min',
            'datatable/dataTables.bootstrap.min',
            'admin/custom',
            'admin/table',
            'jquery.blockUI',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php echo $this->element('admin/header'); ?>
        <section class="content">
            <?php echo $this->element('admin/topNav'); ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('admin/footer'); ?>
            <?php echo $this->element('_admin_common_js'); ?>
        </section>
        <!-- Content Block Ends Here (right box)-->	
    </body>
</html>