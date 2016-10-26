<div id="cms-header">
    <div class="container">
        <h3><?php echo $this->Html->image('lulu/Mail.png',array('class' => 'cms-icon')); ?>  Contact Us</h3>
    </div>
</div>

<div class="login-wrapper">
    <div class="row" id="contact-form">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <div class="users form contact-container">
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->Form->create('Contact'); ?>
                <fieldset>
                    <legend>
                        <div class="lines"></div>
                        <span><?php //echo __('We like to hear from you'); ?></span>
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
                echo $this->Form->submit(__('Submit'), array('class' => 'login-submit green'));
                echo $this->Form->end();
                ?>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
            <div class="office-detail">
                <fieldset>
                    <legend>
                        <div class="lines"></div>
                        <span><?php echo __('Our Location'); ?></span>
                    </legend>
                </fieldset>
                <div class="location-detail">
                    <div class="company-name">Room247 (Head Office)</div>
                    <div class="company-address">Address:- <span>C-88, Shankar Nagar, C.H.B., Jodhpur (Raj.)</span></div>
                    <div class="company-phone">Phone:- <span>1234567890, 1234567890</span></div>
                    <div class="company-email">Email:- <span>abx@xyz.com, demo@user.com</span></div>
                    <div class="company-fax">Fax No.:- <span>1234567890, 1234567890</span></div>
                    <div class="company-website">Website:- <span>http://www.room247.com</span></div>
                </div>
                <div class="spacer-20"></div>
                <div class="location-detail">
                    <div class="company-name">Room247 (Office)</div>
                    <div class="company-address">Address:- <span>C-88, Shankar Nagar, C.H.B., Jodhpur (Raj.)</span></div>
                    <div class="company-phone">Phone:- <span>1234567890, 1234567890</span></div>
                    <div class="company-email">Email:- <span>abx@xyz.com, demo@user.com</span></div>
                    <div class="company-fax">Fax No.:- <span>1234567890, 1234567890</span></div>
                    <div class="company-website">Website:- <span>http://www.room247.com</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="map-location">
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
    <div style="position:absolute; z-index:10; width: 100%;">
    
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
</div>