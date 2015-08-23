<?php 
	echo $this->Html->css(array('admin/tagit/css/jquery.tagit'));
	echo $this->Html->script(array('admin/tagit/js/tag-it.min'));
    echo $this->element('admin/OuterboxStart');
?>

<?php echo $this->Form->create('Mail', array('id' => 'frm_Mail', 'name'=>'frm_Mail', 'onsubmit'=>'return validate("message")')); 

	if(isset($user_req))
	{
		echo $this->Form->input('req',array('type'=>'hidden','value'=>$user_req));
	}
?>

<div class="required_fields"><img style="margin-right:4px;" src="<?=$this->webroot?>img/trader_required.png" /></span>Required Fields </div>
<div style="clear:both"></div>
<div class="form_content">
<div class="form_c_inner">
  <div class="form_elements">
    <div class=" form_ele_mid">
      <div class="form_txt"><img style="margin-right:4px;" src="<?=$this->webroot?>img/trader_required.png" />To</div>
      <div><?php echo $this->Form->hidden('email',array('class' => 'form_textbox','value'=>@$user_email,'label' => false,'required'=>true)); ?>
        <ul id="tags" class="form_textbox">
        </ul>
      </div>
    </div>
    <div class=" form_ele_mid">
      <div class="form_txt"><img style="margin-right:4px;" src="<?=$this->webroot?>img/trader_required.png" />Subject</div>
      <div><?php echo $this->Form->input('subject', array('id'=>'subject','class' => 'form_textbox','label' => false));?> </div>
    </div>
    <div class=" form_ele_mid">
      <div class="form_txt"><img style="margin-right:4px;" src="<?=$this->webroot?>img/trader_required.png" />Message</div>
      <div class="form_ckeditor"><?php echo $this->Form->input('message', array('id'=>'message','class' => 'form_textbox','label' => false,'required'=>true,'type'=>'textarea'));?> </div>
    </div>
    <div class=" form_ele_bot"> <?php echo $this->Form->submit('Send',array('value'=>'Submit','class'=>' ','type'=>'submit','label' => false,'div'=>false,));?> <?php echo $this->Html->link("Cancel", array('admin' => true, 'controller' => 'EmailContents', 'action' => 'index'),array('class'=>'button button_cancel'));?> </div>
  </div>
</div>
<?php echo $this->Form->end();?>
<style>
#tags {
	margin: -18px 0 10px 200px;
    width: 64%;
}
</style>
<script type="text/javascript">
var editor =CKEDITOR.replace('message', {height:300,width:492,toolbar:'MyToolbar'});	
	
$(function(){
	$('#tags').tagit({
		singleField: true,
		singleFieldNode: $('#MailEmail'),
		
	});
});



function validateCKEDITORforBlank(field)
{
	var vArray = new Array();
	vArray = field.split("&nbsp;");
	var vFlag = 0;
	for(var i=0;i<vArray.length;i++)
	{
		if(vArray[i] == '' || vArray[i] == "")
		{
			continue;
		}
		else
		{
			vFlag = 1;
			break;
		}
	}
	if(vFlag == 0)
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
	
	
	var subject = trim($("#subject").val());
	
	var email = $( "#tags li.tagit-choice" ).length ;
	
	if(email == '0'){
		$("#MailEmail").parent().append('<div class="error-message">This field is required.</div>');
		return false;
	}
	else{
		$(".error-message").remove();
	}

	
	if(subject == ''){
		$("#subject").parent().append('<div class="error-message">This field is required.</div>');
		return false;
	}
	else{
		$("#subject").val(subject);
	}

	
	if(validateCKEDITORforBlank($.trim(CKEDITOR.instances.message.getData().replace(/<[^>]*>|\s/g, ''))))
	{
		$("#"+message).parent().append('<div class="error-message">This field is required.</div>');
		CKEDITOR.instances.message.setData("");
		return false;
	}
	return true;
}
	
</script> 
<?php echo $this->element('admin/OuterboxEnd');?> 