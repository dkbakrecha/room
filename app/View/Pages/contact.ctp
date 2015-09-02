<div id="cms-header">
    <div class="container">
        <h3><i class="glyphicon glyphicon-home"></i> Contact Us</h3>
    </div>
</div>

<div class="container login-wrapper">
    <!-- <div class="row" id="contact-form">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3577.4151028414835!2d73.003812!3d26.28064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418da148d875d9%3A0xc20aad6138315bd2!2sCG+Technosoft!5e0!3m2!1sen!2sin!4v1440616933183" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div> -->
    <div class ="row" style="position:absolute; z-index:10">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
            <div style="z-index:999; /*border:1px solid #000;*/ background-color:#fff; display:inline-block; width:300px; margin-top:160px; padding:25px 30px;box-shadow: 0px 0px 19px -1px #A5A4A4;">
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
        <div class="col-sm-6">
        </div>
    </div>
    <div class ="row" style="overflow:hidden;">
        <div class="col-sm-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3577.4151028414835!2d73.003812!3d26.28064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418da148d875d9%3A0xc20aad6138315bd2!2sCG+Technosoft!5e0!3m2!1sen!2sin!4v1441132524975" width="100%" height="850" frameborder="0" style="border:0; margin-top: -150px;" allowfullscreen></iframe>
        </div>
    </div>
</div>