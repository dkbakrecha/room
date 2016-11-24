<div id="cms-header">
    <div class="container">
        <h3><?php echo $this->Html->image('lulu/Mail.png',array('class' => 'cms-icon')); ?>  Contact Us</h3>
    </div>
</div>

<div id="cms-primary">
<div class="container">
        <section id="content" role="main" class="col-lg-8">
    <div class="row" id="contact-form">
        
            <div class="users form contact-container">
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->Form->create('Contact'); ?>
                <fieldset>
                    <legend>
                        <div class="lines"></div>
                        <span><?php echo __('We like to hear from you'); ?></span>
                    </legend>
                    
                    <?php
                    echo $this->Form->input('name', array(
                        'label' => false,
                        'class' => false,
                        'div' => 'input text col-lg-6',
                        'placeholder' => 'Enter your name'
                    ));
                    echo $this->Form->input('email', array(
                        'label' => false,
                        'class' => false,
                        'div' => 'input text col-lg-6',
                        'placeholder' => 'Enter your email address'
                    ));
                    
                    echo $this->Form->input('subject', array(
                        'label' => false,
                        'class' => false,
                        'div' => 'input text col-lg-12',
                        'placeholder' => 'Enter subject'
                    ));
                    ?>
                    <div class="col-lg-12">
                    <?php
                    echo $this->Form->textarea('message', array(
                        'label' => false,
                        'placeholder' => 'Enter message',
                        'class' => 'sb-textarea',
                    ));
                    ?>
                    </div>
                </fieldset>

                <?php
                echo $this->Form->submit(__('Submit'), array(
                    'class' => 'login-submit green',
                    'div' => 'submit col-lg-12'
                    ));
                echo $this->Form->end();
                ?>
            </div>
        
        
    </div>
    <div class="row" id="map-location" style="display: none;">
        <div class="col-sm-12">
            <div class="office-detail">
                <fieldset>
                        <legend>
                            <div class="lines"></div>
                            <span><?php echo __('Where to find Us'); ?></span>
                        </legend>
                    </fieldset>
            </div>
        </div>
    </div>
    <div style="position:absolute; z-index:10; width: 100%; display: none;">
    
        <div class="col-md-4 col-md-offset-1">
            <div style="z-index:999; /*border:1px solid #000;*/ background-color:#fff; display:inline-block; width:100%; margin-top:60px; padding:25px 30px;box-shadow: 0px 0px 19px -1px #A5A4A4;">
                <div class="users form contact-container">
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->Form->create('Contact'); ?>
                    <fieldset>
                        <legend>
                            <div class="lines"></div>
                            <span><?php echo __('Request a Quote'); ?></span>
                        </legend>
                        <?php
                        echo $this->Form->input('name', array(
                            'label' => false,
                            'placeholder' => 'Enter your name'
                        ));
                        echo $this->Form->input('email', array(
                            'label' => false,
                            'placeholder' => 'Enter your email address'
                        ));
                        echo $this->Form->input('phone', array(
                            'label' => false,
                            'placeholder' => 'Enter phone'
                        ));
                        echo $this->Form->input('subject', array(
                            'label' => false,
                            'placeholder' => 'Enter subject'
                        ));
                        echo $this->Form->textarea('message', array(
                            'label' => false,
                            'placeholder' => 'Enter message',
                            'class' => 'sb-textarea',
                        ));
                        ?>
                    </fieldset>

                    <?php
                    echo $this->Form->submit(__('Send'), array('class' => 'login-submit green'));
                    echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
    </div>

    </section>
        
        <?php echo $this->element('sidebar_cms'); ?>
    </div>
</div>

<script type="text/javascript">
  $('#ContactContactForm').validate({
  rules: {
    'data[Contact][email]': {
      email: true
    },    
  },
  messages: {
    'data[Contact][email]': {
      required: "Please enter your correct email address",
      email: "Your email address must be in the format of name@domain.com"
    },
    'data[Contact][name]':{
      required: "Please enter your full name",
    },
    'data[Contact][subject]':{
      required: "Please enter your subject",
    },
    'data[Contact][message]':{
      required: "Please enter your message",
    }

  }
});
</script>