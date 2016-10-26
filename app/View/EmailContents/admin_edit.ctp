<?php
echo $this->Html->script('ckeditor/ckeditor');
echo $this->Html->script('ckeditor/adapters/jquery');
?>

<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Email Content EDIT
        </div>
        <div class="panel-body">
            <div class="row profile">
                <div class="col-md-12">
                    <!--BEGIN TABS-->
                    <div class="row profile-account">
                        <div class="col-md-12">
                            <?php
                            echo $this->Form->create('EmailContent', array('url' => array('controller' => 'emailContents', 'action' => 'edit', 'admin' => true), 'class' => 'form-horizontal'));

                            $id = $this->request->data['EmailContent']['id'];
                            $keyword = $this->request->data['EmailContent']['keywords'];
                            echo $this->Form->input('id', array('class' => 'form-control hide'));
                            echo $this->Form->input('keywords', array('class' => 'form-control hide', 'label' => false, 'value' => $keyword));
                            ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Title</label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => false)); ?>
                                    </div>						
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">From</label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('from', array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Subject</label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('subject', array('class' => 'form-control', 'label' => false)); ?>
                                    </div>						
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Message</label>
                                    <div class="col-md-9">
                                        <?php echo $this->Form->input('message', array('class' => 'form-control ckeditor', 'type' => 'textarea', 'label' => false, 'rows' => '6', 'data-error-container' => '#editor2_error')); ?>
                                        <div id="editor2_error">
                                        </div>
                                    </div>
                                </div>								

                                <div class="form-group">
                                    <label class="control-label col-md-3">Keyword</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">
                                            <?php echo $keyword; ?>
                                        </p>
                                    </div>						
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('status', array('options' => array('1' => 'Active', '0' => 'Inactive'), 'class' => 'form-control', 'tabindex' => '3', 'label' => false)); ?>
                                    </div>		
                                </div>
                                <div class="form-group margiv-top-10">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->submit('Save Changes', array('value' => 'Submit', 'class' => 'btn green', 'type' => 'submit', 'label' => false, 'div' => false,)); ?> 
                                    </div>
                                </div>
                                <?php echo $this->Form->end(); ?> 
                            </div>
                            <div class="form-group">
                                <div class="col-md-1">
                                    <?php
                                    if (isset($pr_item) && !empty($pr_item))
                                        echo $this->Html->link('<< Prev', array('admin' => true, 'controller' => 'emailContents', 'action' => 'edit', $pr_item));
                                    else
                                        echo "<< Prev";
                                    ?>
                                </div>
                                <div class="col-md-10"></div>
                                <div class="col-md-1" style="text-align:right;">
                                    <?php
                                    if (isset($nx_item) && !empty($nx_item))
                                        echo $this->Html->link('Next >>', array('admin' => true, 'controller' => 'emailContents', 'action' => 'edit', $nx_item));
                                    else
                                        echo "Next >>";
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <!--end col-md-9-->							
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>