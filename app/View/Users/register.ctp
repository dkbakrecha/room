<div class="container login-wrapper margin-top-20">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <!-- app/View/Users/add.ctp -->
            <div class="users form register">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <legend>
                        <?php echo __('Register'); ?>
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
                echo $this->Form->submit(__('Register'), array('class' => 'btn green'));
                echo $this->Form->end();
                ?>
            </div>
        </div>




    </div>
</div>