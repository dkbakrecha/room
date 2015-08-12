<div>
    <?php echo $this->Form->create('Enquiry', array('class' => 'form-horizontal')); ?>
    <legend>Contact our <span>Personal concierge</span>: </legend>


    <div class="form-group">
        <div class="col-sm-12">
            <?php
            echo $this->Form->input('type', array(
                'class' => 'form-control',
                'options' => Configure::read('EnquieryType'),
                'label' => false
            ));
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php
            echo $this->Form->input('phone', array(
                'class' => 'form-control',
                'label' => false
            ));
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php
            echo $this->Form->input('email', array(
                'class' => 'form-control',
                'label' => false
            ));
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php
            echo $this->Form->input('message', array(
                'class' => 'form-control',
                'label' => false
            ));
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php
            echo $this->Form->submit('Send Enquiry', array('class' => 'btn btn-primary btn-lg pull-right site-green'));
            ?>
        </div>
    </div>
</div>