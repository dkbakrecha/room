        <div class="warper container-fluid">
            <div class="panel panel-default">
                    <div class="panel-heading">
                         Update Newsletter
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
                    </div>
                    <div class="panel-body">
                        
                        <?php echo $this->Form->create('Newsletter',array('class' => 'form-horizontal')); ?>    
                        <?php echo $this->Form->hidden('id'); ?>
                        
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Full Name</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('fullname',array(
                                                'class' => 'form-control',
                                                'placeholder' => 'Full Name',
                                                'label' => false,
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('email',array(
                                                'class' => 'form-control',
                                                'placeholder' => 'Eamil',
                                                'label' => false,
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