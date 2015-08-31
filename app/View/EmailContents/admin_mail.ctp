<?php
echo $this->Html->css(array(
    'tagit/css/jquery.tagit',
    'jquery/jquery-ui'
));

echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'tagit/js/tag-it.min'
    ));
?>


<div class="portlet box">
    <div class="portlet-title"></div>
    <div class="portlet-body form">
        <?php
        echo $this->Form->create('Mail', array('id' => 'frm_Mail', 'name' => 'frm_Mail', 'class' => 'form-horizontal', 'onsubmit' => 'return validate("message")'));
        if (isset($user_req)) {
            echo $this->Form->input('req', array('type' => 'hidden', 'value' => $user_req));
        }
        ?>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3">To :</label>
                <div class="col-md-6">
                    <?php //pr($user_email); ?>
                    <?php
                    echo $this->Form->hidden('emails', array('class' => 'form_textbox', 'value' => @$user_email, 'label' => false, 'required' => true));
                    echo $this->Form->hidden('names', array('class' => 'form_textbox', 'value' => @$user_names, 'label' => false));
                    ?>
                    <ul id="tags" class="form-control11">
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3">Subject :</label>
                <div class="col-md-6">
                    <?php echo $this->Form->input('subject', array('id' => 'subject', 'class' => 'form-control', 'label' => false)); ?>
                </div>
            </div>				
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3">Message :</label>
                <div class="col-md-6 col-sm-6">
                    <div class="form_ckeditor"><?php
                        $msg = "";
                        if (isset($content['EmailContent']) and ! empty($content['EmailContent']['message'])) {
                            $msg = $content['EmailContent']['message'];
                        }
                        echo $this->Form->input('message', array('id' => 'message', 'rows' => '7', 'class' => 'ckeditor form-control', 'label' => false, 'required' => true, 'value' => $msg));
                        ?>   
                    </div>
                </div>
            </div>
            <div class="form-group margin-top-20">
                <div class="col-md-3"> </div>
                <div class="col-md-6">
                    <?php echo $this->Form->submit('Send', array('value' => 'Submit', 'class' => 'btn green', 'type' => 'submit', 'label' => false, 'div' => false,)); ?> <?php echo $this->Html->link("Cancel", array('admin' => true, 'controller' => 'EmailContents', 'action' => 'index'), array('class' => 'btn default')); ?>
                </div>
            </div>	
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script type="text/javascript">

    $(function () {
        $('#tags').tagit({
            singleField: true,
            singleFieldNode: $('#MailEmails'),
            //autocomplete: {delay: 0, minLength: 200}
        });
    });

    function validateCKEDITORforBlank(field)
    {
        var vArray = new Array();
        vArray = field.split("&nbsp;");
        var vFlag = 0;
        for (var i = 0; i < vArray.length; i++)
        {
            if (vArray[i] == '' || vArray[i] == "")
            {
                continue;
            }
            else
            {
                vFlag = 1;
                break;
            }
        }
        if (vFlag == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function validate(message)
    {
        $(".error-message").remove();
        var subject = $.trim($("#subject").val());
        var email = $("#tags li.tagit-choice").length;

        if (email == '0') {
            $("#MailEmail").parent().append('<div class="error-message">This field is required.</div>');
            return false;
        } else {
            $(".error-message").remove();
        }

        if (subject == '') {
            $("#subject").parent().append('<div class="error-message">This field is required.</div>');
            return false;
        } else {
            //$("#subject").val(subject);
        }

        if (validateCKEDITORforBlank($.trim(CKEDITOR.instances.message.getData().replace(/<[^>]*>|\s/g, ''))))
        {
            $("#" + message).parent().append('<div class="error-message">This field is required.</div>');
            CKEDITOR.instances.message.setData("");
            return false;
        }
        return true;
    }
</script> 
