<div class="hr-line"></div>
<?php
$this->request->data = $this->Session->read('Auth');
?>
<div class="container" id="roomContent">

    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php 
                    echo $this->Form->create('User',array('class' => 'room-form col-lg-6')); 
                    echo $this->Form->hidden('id');
                    ?>
                    <?php 
                    echo $this->Form->input('name',array(
                        'label' => false,
                        'placeholder' => 'Username',
                        )); 
                    ?>
                    <?php 
                    echo $this->Form->input('first_name',array(
                        'label' => false,
                        'placeholder' => 'First Name',
                        )); 
                    ?>
                    <?php 
                    echo $this->Form->input('last_name',array(
                        'label' => false,
                        'placeholder' => 'Last Name',
                        )); 
                    ?>
                    <?php 
                    echo $this->Form->input('email',array(
                        'label' => false,
                        'placeholder' => 'Email Address',
                        'readonly' => TRUE,
                        )); 
                    ?>
                    <?php 
                    echo $this->Form->input('contact_no',array(
                        'label' => false,
                        'placeholder' => 'Contact Number'
                        ));
                    ?>
                    <?php 
                    echo $this->Form->submit('Save',array(
                        'class' => 'btn btn-primary btn-lg turquoise'
                    )); 
                    ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>

</div>

