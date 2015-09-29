<style>
    
    
    .content-background {
        background : #2ecc71 url("<?php echo $this->webroot; ?>img/header-property-bg.png") no-repeat scroll 100px bottom !important;
        color: #faf9f7;
    }
    
</style>

<div class="content-background green"></div>
<div class="container">
    <div class="row">
        <div class="mainContent">
            <div class="appbar-top">
                <div class="col-lg-12">
                    <span class="link">
                        Grow Your Business With Us
                    </span>

                </div>
            </div>

            <div class="col-lg-4 col-lg-offset-8">
                <!-- app/View/Users/add.ctp -->
                <div class="users form login-container">
                    <?php echo $this->Form->create('User'); ?>
                    <fieldset>
                        <legend><?php echo __('Business Register !'); ?></legend>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <?php
                            echo $this->Form->input('name', array(
                                'label' => false,
                                'placeholder' => 'Enter username',
                                'required' => true,
                                'div' => false
                            ));
                            ?>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <?php
                            echo $this->Form->input('email', array(
                                'label' => false,
                                'placeholder' => 'Enter email address',
                                'required' => true
                            ));
                            ?>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <?php
                            echo $this->Form->input('contact_no', array(
                                'label' => false,
                                'placeholder' => 'Enter Mobile Number',
                                'required' => true,
                                'type' => 'text'
                            ));
                            ?>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <?php
                            echo $this->Form->input('password', array(
                                'label' => false,
                                'placeholder' => 'Enter password',
                                'required' => true,
                            ));
                            ?>
                        </div>
                    </fieldset>
                    <?php
                    echo $this->Form->submit(__('Register'), array('class' => 'login-submit green'));
                    echo $this->Form->end();
                    ?>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="text-center">
                <h2 class="title"><span>Our Services</span></h2>
            </div>

            <div class="row services">
                <div class="col-sm-6 col-md-4">
                    <div class="service text-center">
                        <div class="icon"> <img alt="" src="/room/img/lulu/Chats.png"></div>
                        <h4>Personal Support</h4>
                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <!--/.service --> 
                </div>
                <!--/column -->
                <div class="col-sm-6 col-md-4">
                    <div class="service text-center">
                        <div class="icon"> <img alt="" src="/room/img/lulu/Mail.png"></div>
                        <h4>Video Support</h4>
                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <!--/.service --> 
                </div>
                <!--/column -->
                <div class="col-sm-6 col-md-4">
                    <div class="service text-center">
                        <div class="icon"> <img alt="" src="/room/img/lulu/Support.png"> </div>
                        <h4>Extensive Documentation</h4>
                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <!--/.service --> 
                </div>
                <!--/column --> 
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <?php echo $this->Html->image('items.png', array('class' => 'img-responsive')); ?>
        </div>
    </div>
</div>