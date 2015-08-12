        <div class="warper container-fluid">
            <div class="page-header"><h1>Add <small>Category</small></h1></div>
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Category
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
                    </div>
                    <div class="panel-body">
                        
                        <?php 
                        echo $this->Form->create('Facility',array('class' => 'form-horizontal')); 
                        echo $this->Form->hidden('id');
                        ?>    
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('title',array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => 'Category Title'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Label</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('label',array(
                                                'class' => 'form-control',
                                                'placeholder' => 'Label',
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