        <div class="warper container-fluid">
        	
            <div class="page-header"><h1>Posts <small>User's Post Collections</small></h1></div>
            
            
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Post
                        <a class='btn btn-purple btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                        <?php echo $this->Form->create('Post'); ?>    
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('title',array(
                                                'class' => 'form-control',
                                                'placeholder' => 'Description',
                                                'label' => false,
                                                'placeholder' => 'Post Title'
                                            ));
                                        ?>
                                    </div>
                                  </div>
                                  
                                  <hr class="dotted">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-7">
                                        <?php 
                                            echo $this->Form->input('desc',array(
                                                'type' => 'textarea',
                                                'class' => 'form-control wysihtml',
                                                'placeholder' => 'Description',
                                                'label' => false
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