<div class="container login-wrapper margin-top-20">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <!-- app/View/Users/add.ctp -->
            <div class="users form login-container panel panel-default register">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <legend>
                        <div class="text-turquoise"><?php echo __('Register'); ?></div>      
                    </legend>

                    <?php
                    echo $this->Form->input('name', array(
                        'label' => 'Full Name',
                        'placeholder' => 'Enter first and last name',
                        'class' => 'form-control',
                        'required' => true,
                    ));
                    ?>


                    <?php
                    echo $this->Form->input('email', array(
                        'label' => 'Email',
                        'placeholder' => 'Enter email address',
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

                    <?php
                    echo $this->Form->input('contact_no', array(
                        'type' => 'text',
                        'label' => 'Contact number',
                        'placeholder' => 'Enter mobile number',
                        'required' => true,
                        'class' => 'form-control'
                    ));
                    ?>
                </fieldset>
                <?php
                echo $this->Form->submit(__('Register'), array('class' => 'login-submit green'));
                echo $this->Form->end();
                ?>

                <h4 class="text-blue">
                  <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" class="pull-right">Already have a Account</a>
                </h4>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $('#UserRegisterForm').validate({
  rules: {
    'data[User][name]':{
      required: true,  
    },
    'data[User][email]': {
      required: true,
      email: true
    },
    'data[User][password]':{
      required: true,
    },
    'data[User][contact_no]':{
      required: true,
    }
  },
  messages: {
    'data[User][name]':{
      required: "Please enter your full display name.",
    },
    'data[User][email]': {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    },
    'data[User][password]':{
      required: "We need strong password to protect you",
    },
    'data[User][contact_no]':{
      required: "Please enter your mobile number. We don't send any sully sms :)",
    }
  }
});
</script>