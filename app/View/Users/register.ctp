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
                        'placeholder' => 'Enter username',
                        'required' => true
                    ));
                    echo $this->Form->input('email', array(
                        'label' => false,
                        'placeholder' => 'Enter email address',
                        'required' => true
                    ));
                    echo $this->Form->input('password', array(
                        'label' => false,
                        'placeholder' => 'Enter password',
                        'required' => true
                    ));
                    ?>
                </fieldset>
                <?php
                echo $this->Form->submit(__('Register'), array('class' => 'login-submit green'));
                echo $this->Form->end();
                ?>
            </div>
        </div>
        
        
        
        <div class="registration-form-section">
                <form>
                    <div data-animation="fadeInDown" class="section-title reg-header animated fadeInDown">
                        <h3>Get your Account Here </h3>

                    </div>
                    <div class="clearfix">
                        <div data-animation="fadeInUp" class="col-sm-6 registration-left-section animated fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap focused">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" required="required" placeholder="FirstName" class="form-control ">
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" required="required" placeholder="LastName" class="form-control ">
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-envelope icon-color"></i></span>
                                        <input type="email" required="required" placeholder="Email Id" class="form-control ">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div data-animation="fadeInUp" class="col-sm-6 registration-right-section animated fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" required="required" placeholder="UserName" class="form-control ">
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input type="password" required="required" placeholder="Password" class="form-control ">
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input type="password" required="required" placeholder="Confirm-Password" class="form-control ">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div data-animation-delay=".15s" data-animation="fadeInUp" class="registration-form-action clearfix animated fadeInUp" style="animation-delay: 0.15s;">
                        <a class="btn btn-success pull-left blue-btn " href="#demo1">
                            <i class="icon-chevron-left"></i>&nbsp; &nbsp;Back To Login  
                        </a>
                        <button class="btn btn-success pull-right green-btn " type="submit">Register Now &nbsp; <i class="icon-chevron-right"></i></button>

                    </div>
                </form>
            </div>
    </div>
</div>