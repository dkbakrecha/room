<?php
//prd($product);
?>
<div class="container" id="enquiryModal">
    <div class="col-md-6 col-md-offset-3 room-modal">

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-text">
                    <?php echo __("Send Enquiry"); ?>
                </span>

                <button class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <div class="panel-body">
                <?php
                echo $this->Form->create('Enquiry', array(
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'autocomplete' => false));
                ?>
                <?php
                if (!isset($user_id) && empty($user_id)) {
                    ?>
                    <div class="form-group ">
                        <div class="col-sm-12">
                            <?php
                            echo $this->Form->input('name', array(
                                'class' => 'form-control',
                                'div' => false,
                                'label' => false,
                                'placeholder' => 'First Name',
                                'required' => 'required'));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <?php
                            echo $this->Form->input('email', array(
                                'class' => 'form-control',
                                'div' => false,
                                'label' => false,
                                'required' => 'required',
                                'placeholder' => 'Email address'));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 ">
                            <?php
                            echo $this->Form->input('phone_number', array(
                                'class' => 'form-control',
                                'div' => false,
                                'label' => false,
                                'placeholder' => 'Phone number'));
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="col-sm-12 ">
                        <?php
                        echo $this->Form->input('message', array(
                            'class' => 'form-control',
                            'div' => false,
                            'label' => false,
                            'placeholder' => 'Your Message',
                            'required' => 'required',
                            'rows' => 2,
                            'cols' => 2));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 ">
                        <?php
                        echo $this->Form->submit('Send Enquiry', array('class' => 'btn btn-primary site-green'));
                        ?>
                    </div>


                </div>
                <div class="form-group">
                    <span class="col-sm-12">
                        By clicking send you are agreeing to our
                        <a href="" class="blue-text contact-link">Terms & Conditions</a>
                    </span>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>

        </div>    

    </div>
</div>