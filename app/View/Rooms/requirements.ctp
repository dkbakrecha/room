<?php
//prd($cateList);
?>
<div class="container" >
    <div class="col-md-6 col-md-offset-3 room-modal">

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-text">
                    <?php echo __("Post Requirement"); ?>
                </span>

                <button class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <div class="panel-body">
                <?php
                echo $this->Form->create('PostRequirement', array(
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'autocomplete' => false));

                echo $this->Form->hidden('user_id');
                ?>
                <div class="form-group ">
                    <label class="col-sm-4">Looking For </label>
                    <div class="col-sm-8">
                        <?php
                        echo $this->Form->input('category_id', array(
                            'empty' => 'Select',
                            'class' => 'form-control',
                            'options' => $cateList,
                            'div' => false,
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-4">Budget</label>
                    <div class="col-sm-8">
                        <?php
                        echo $this->Form->input('budget', array(
                            'class' => 'form-control',
                            'div' => false,
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-4">Contact Person</label>
                    <div class="col-sm-8">
                        <?php
                        echo $this->Form->input('contact_person', array(
                            'class' => 'form-control',
                            'div' => false,
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-4">Contact Number</label>
                    <div class="col-sm-8">
                        <?php
                        echo $this->Form->input('contact_no', array(
                            'class' => 'form-control',
                            'div' => false,
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>


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
                    <div id="postSave" class="col-sm-12 btn btn-primary site-green ">
                        Post Me
                    </div>


                </div>
                <?php
                echo $this->Form->end();
                ?>
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

<script>
    $(document).ready(function() {
        $('#postSave').click(function() {

            //callback handler for form submit
            $("#PostRequirementRequirementsForm").submit(function(e)
            {
                var postData = $(this).serializeArray();
                URL = '<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'savePostRequirement')); ?>';
                $.ajax(
                        {
                            url: URL,
                            type: "POST",
                            data: postData,
                            success: function(data)
                            {
                                console.log(data);
                                if (data == 1) {
                                    $("#postRequirement").modal('hide');
                                    $('#flash-msg').css('display', 'block');
                                    $('#flash-msg').html('Post saved');

                                } else {

                                }
                                //data: return data from server
                            },
                            error: function(xhr) {
                                $.unblockUI();
                                ajaxErrorCallback(xhr);
                            }
                        });
                e.preventDefault(); //STOP default action
                //  e.unbind(); //unbind. to stop multiple form submit.
            });
            $("#PostRequirementRequirementsForm").submit(); //Submit  the FORM
        });
    });
</script>