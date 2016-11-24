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
            'fontawesome/font-awesome.min',
            'roomfront',
            'room-responsive',
            'colors',
            'fonts'
        ));

        echo $this->Html->script(array(
            'moment',
            'jquery.min',
            'jQueryUi',
            'bootstrap.min',
            'jquery.form.min',
            'jquery.blockUI',
            'lib/jquery-ui.custom.min',
            'jquery.validate.min'
        ));

        // echo $this->element('imp_meta');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <meta name="description" content="Room247.in is an endeavor for our esteemed room seekers who are looking for their “Ashiyana”.">
        <meta name="keywords" content="rooms in jodhpur, flats in jodhpur, properties in jodhpur, rooms for rent in jodhpur, plot to sell in jodhpur, jodhpur properties, properties in jodhpur, properties in rajasthan, flats for rent in jodhpur, flats on cheap price in jodhpur, jodhpur properties, jodhpur flats, sell  your properties, sell your flat, purchase property in rajasthan, purchase flats in rajasthan, jodhpur flats to buy, purchase house in jodhpur, house for rent, house for buy, house to purchase, free room listings, property website, online property listing, listing for rooms, listings for home to sell, listing for home to buy, genuine properties in jodhpur, genuine home purchase, properties in rajasthan, 2 BHK flats, 3 BHK flats">
        <meta name="author" content="Room247.in Team">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="container">
            <?php echo $this->element('header'); ?>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <div id="flash-msg" style="display: none" class="alert alert-success"></div>

                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php echo $this->element('ClassyNewsletter.newsletterbar'); ?>
        <?php echo $this->element('footer'); ?>
        <?php //echo $this->element('enquerybox');?>
        <?php echo $this->element('_common_js'); ?>
        
    </body>
</html>