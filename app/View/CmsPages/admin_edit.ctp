<?php echo $this->Session->flash(); ?>

<?php 

echo $this->Html->script('ckeditor/ckeditor'); 
echo $this->Html->script('ckeditor/adapters/jquery'); 
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span><?php echo $this->request->data['CmsPage']['title']; ?></span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <?php
                                echo $this->Form->create("CmsPage", array(
                                    'action' => 'admin_edit',
                                    'autocomplete' => 'off',
                                    'class' => 'form-horizontal formAdmin',
                                        //'onsubmit'=>'return validate("description")'
                                        )
                                );
                                echo $this->Form->input('id', array('type' => 'hidden'));
                                ?>

                                <?php
                                echo $this->Form->input('title', array(
                                    'class' => 'form-control',
                                    'type' => 'text'
                                ));

                                echo $this->Form->input('description', array(
                                    'class' => 'form-control'
                                ));
                                ?>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <?php
                                        echo $this->Form->submit('Update', array(
                                            'div' => FALSE,
                                            'class' => 'btn btn-primary',
                                            'value' => 'Save changes'
                                        ));
                                        ?>
                                        <?php
                                        echo $this->Html->link(
                                                'Cancel', array('admin' => TRUE, 'controller' => 'cms_pages', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-warning')
                                        );
                                        ?>
                                    </div>
                                </div>
                                <?php
                                echo $this->Form->end();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('textarea#CmsPageDescription').ckeditor();
    });
</script>