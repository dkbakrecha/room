<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
$siteName = __d('cake_dev', 'room247.com - New fastest growing rooms listing.');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $this->fetch('title'); ?>
            | <?php echo $siteName; ?>
        </title>

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'roomfront',
            'room-responsive',
            'colors',
            'fonts'
        ));

        echo $this->Html->script(array(
            'moment',
            'jquery.min',
            '//code.jquery.com/ui/1.11.4/jquery-ui.js',
            'bootstrap.min',
            'jquery.form.min',
            'jquery.blockUI',
            'lib/jquery-ui.custom.min',
        ));

        // echo $this->element('imp_meta');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="container">
            <?php echo $this->element('header'); ?>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php echo $this->element('_common_js'); ?>
        <?php echo $this->element('footer'); ?>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>