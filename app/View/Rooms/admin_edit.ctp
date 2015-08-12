        <div class="warper container-fluid">
            <div class="page-header"><h1>Edit <small>Room</small></h1></div>
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Room
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
                    </div>
                    <div class="panel-body">
                        
                        <?php 
                        echo $this->Form->create('Room',array('class' => 'form-horizontal')); 
                        echo $this->Form->hidden('id'); 
                        ?>    
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('title',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Room Title'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('description',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Room description ...'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('price',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Price'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('contact',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Contact Number'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('address',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Address'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">List For</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('list_for',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => array('0' => 'Rent', '1' => 'Sale'),
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Remark</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('remark',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Remark Here'
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