<div class="container login-wrapper">
    <div class="row">
        <div class="col-lg-4">
            <!-- app/View/Users/add.ctp -->
            <div class="users form login-container">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <legend><?php echo __('JOIN Room247.in'); ?><span class="pull-right">Agent ?</span></legend>
                    <?php
                    echo $this->Form->input('name', array(
                        'label' => false,
                        'placeholder' => 'Enter username'
                    ));
                    echo $this->Form->input('email', array(
                        'label' => false,
                        'placeholder' => 'Enter email address'
                    ));
                    echo $this->Form->input('password', array(
                        'label' => false,
                        'placeholder' => 'Enter password'
                    ));
                    echo $this->Form->hidden('role', array(
                        'value' => '2'
                    ));
                    ?>
                </fieldset>
                <?php
                echo $this->Form->submit(__('Register'), array('class' => 'login-submit green'));
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>