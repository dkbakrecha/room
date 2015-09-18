<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Subscriber Plan
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard', 'admin' => true)); ?>'>Back</a>
        </div>
        <div class="panel-body">

            <?php
            echo $this->Form->create('Payment', array('class' => 'form-horizontal'));
            //   echo $this->Form->hidden('id');
            ?>    
            <div class="form-group">
                <label class="col-sm-2 control-label">Payment Type</label>
                <div class="col-sm-7">
                    <?php
                    $options = array('1' => 'Cash');
                    echo $this->Form->input('payment_type', array(
                        'class' => 'form-control',
                        'label' => false,
                        'empty' => 'Select',
                        'options' => $options,
                        'required' => 'required',
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">
            <div class="form-group">
                <label class="col-sm-2 control-label">Payment Plan</label>
                <div class="col-sm-7">
                    <?php
                    $options = array('1' => 'Silver', '2' => 'Gold');
                    echo $this->Form->input('plan_id', array(
                        'class' => 'form-control',
                        'label' => false,
                        'empty' => 'Select',
                        'options' => $options,
                        'required' => 'required',
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">
            <div class="form-group">
                <label class="col-sm-2 control-label">Select User</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('user_id', array(
                        'class' => 'form-control',
                        'label' => false,
                        'empty' => 'Select',
                        'options' => $userList,
                        'required' => 'required',
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">
            <div class="form-group">
                <label class="col-sm-2 control-label">Amount</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('amount', array(
                        'class' => 'form-control',
                        'label' => false,
                        'required' => 'required',
                        'placeholder' => 'Enter amount'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">
            <div class="form-group">
                <label class="col-sm-2 control-label">Remark</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('remark', array(
                        'class' => 'form-control',
                        'label' => false,
                        'rows' => 3,
                        'placeholder' => 'Remarks',
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


