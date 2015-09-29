<div class="container login-wrapper">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <!-- app/View/Users/add.ctp -->
            <div class="users form login-container">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <legend><?php echo __('Register'); ?>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'beagent')); ?>" class="pull-right">
                            As Business
                        </a>
                    </legend>
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
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <?php
                    echo $this->Form->input('password', array(
                        'label' => false,
                        'placeholder' => 'Enter password',
                        'required' => true,
                        ''
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
</div>