<?php
//prd($product);
?>
<div class="container" id="reportModal">
    <div class="col-md-6 col-md-offset-3 room-modal">

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-text">
                    <?php echo __("Report this listing"); ?>
                </span>

                <button class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <div class="panel-body">
                <?php
                echo $this->Form->create('Report', array(
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'autocomplete' => false));

                echo $this->Form->hidden('room_id');
                ?>
                <?php
                if (!isset($user_id) && empty($user_id)) {
                    ?>
                    <div class="form-group ">
                        <div class="col-sm-12">
                            <?php
                            echo $this->Form->input('radio_input', array(
                                'type' => 'radio',
                                'options' => array(1 => 'Not available', 2 => 'Wrong Contact', 3 => 'Wrong price', 4 => 'Wrong location'),
                                'class' => 'radio inline',
                                'div' => false,
                                'label' => true,
                                'legend' => false,
                                'before' => '<div class="newdiv">',
                                'after' => '</div>',
                            ));
                            ?>
                        </div>
                    </div>



                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="col-sm-12 ">
                        <?php
                        echo $this->Form->input('description', array(
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
                        echo $this->Form->submit('Send Report', array('class' => 'btn btn-primary site-green'));
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
