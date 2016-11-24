<div class="container login-wrapper room-modal">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="users form login-container panel panel-default">
                
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <legend>
                        <div class="text-turquoise"><?php echo __('User Login'); ?></div>      
                        <?php if (isset($from) && $from == 1) { ?>
                            <button class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <?php
                            echo $this->Form->hidden('fromtype', array('value' => 'ajax'));
                        }
                        ?>
                    </legend>
                    <?php echo $this->Session->flash('auth'); ?>

                    <?php
                    echo $this->Form->input('email', array(
                        'type' => 'text',
                        'label' => 'Email or Contact Number',
                        'placeholder' => 'Enter email address or contact number',
                        'required' => true,
                        'class' => 'form-control'
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('password', array(
                        'label' => 'Password',
                        'placeholder' => 'Enter password',
                        'required' => true,
                        'class' => 'form-control'
                    ));
                    ?>
                </fieldset>

                

                <?php
                echo $this->Form->submit(__('Login'), array('class' => 'login-submit green'));
                echo $this->Form->end();
                ?>

                <h4 class="text-blue">
                  <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'forgot_password')); ?>" class="text-green">Forgot Password?</a> 
                  <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>" class="pull-right">Don't have an Account?</a>
                </h4>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $('#UserLoginForm').validate({
  rules: {
    'data[User][email]': {
      required: true,
    },
    'data[User][password]':{
      required: true,
    }
  },
  messages: {
    'data[User][email]': {
      required: "Please enter your correct email address or contact number",
    },
    'data[User][password]':{
      required: "Please enter your password",
    }
  }
});
</script>