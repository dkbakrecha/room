<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit User
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
        </div>
        <div class="panel-body">

            <?php 
            echo $this->Form->create('User', array('class' => 'form-horizontal')); 
            echo $this->Form->hidden('id'); 
            ?>    
            <div class="form-group">
                <label class="col-sm-2 control-label">username</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('name', array(
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Enter Username'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">

            <div class="form-group">
                <label class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('first_name', array(
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Enter firstname'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">

            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('last_name', array(
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Enter last name'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">

            <div class="form-group">
                <label class="col-sm-2 control-label">Email Address</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('email', array(
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Email Address'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">

            <div class="form-group">
                <label class="col-sm-2 control-label">Role</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('role', array(
                        'class' => 'form-control',
                        'options' => array('1' => 'User Account', '2' => 'Agent Account'),
                        'label' => false,
                        'placeholder' => 'Select Role'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">


            <button type="submit" class="btn btn-purple col-lg-offset-2">Submit</button>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

</div>
<!-- Warper Ends Here (working area) -->    