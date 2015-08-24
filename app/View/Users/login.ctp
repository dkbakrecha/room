<div class="container login-wrapper">
    <div class="row">
        <div class="col-lg-4">
    <div class="users form login-container">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend>
                <?php echo __('Login to Your Account'); ?>
            </legend>
            <?php
            echo $this->Form->input('email', array(
                'label' => false,
                'placeholder' => 'Enter email address'
            ));
            echo $this->Form->input('password', array(
                'label' => false,
                'placeholder' => 'Enter password'
            ));
            ?>
        </fieldset>

        <?php
        echo $this->Form->submit(__('Login'), array('class' => 'login-submit green'));
        echo $this->Form->end();
        ?>
    </div>
</div>
        <div class="col-lg-8 room-features">
            <div class="row">
                <div class="col-lg-6">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <h3>Post Your Listing Free</h3>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </div>
                <div class="col-lg-6">
                    <i class="glyphicon glyphicon-phone"></i>
                    <h3>Track your multiple enquiries</h3>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <i class="glyphicon glyphicon-certificate"></i>
                    <h3>Enhance Your searching experience</h3>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </div>
                <div class="col-lg-6">
                    <i class="glyphicon glyphicon-comment"></i>
                    <h3>24x7 Support with 100% satisfaction</h3>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </div>
            </div>
        </div>
    </div>
</div>