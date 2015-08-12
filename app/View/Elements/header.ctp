<!-- Navigation -->
<nav class="navbar homepage-header" role="navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3 color-patch yellow"></div>
            <div class="col-xs-3 color-patch blue"></div>
            <div class="col-xs-3 color-patch red"></div>
            <div class="col-xs-3 color-patch turquoise"></div>
        </div>
    </div>
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'listing')); ?>">
                <?php echo $this->Html->image('room-logo.png', array('alt' => 'Room247.in','width' => '180')); ?>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav pull-right">

                <?php
                $sessionUser = $this->Session->read('Auth.User');
                if (!empty($sessionUser)) {
                    ?>

                    <li>
                        <a href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile')); ?>'>Profile</a>
                    </li>
                    <li>
                        <a href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>'>LOGOUT</a>
                    </li>

                <?php } else {
                    ?>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" id="loginOpen">Login</a>
                    </li>
                    <li>
                        <a class="btn btn-primary green" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>" >Register</a>
                    </li>

                    <?php }
                ?>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="clear"></div>





