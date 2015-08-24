<?php echo $this->Html->css(array('admin/tagit/css/jquery.tagit'));
	  echo $this->Html->script(array('admin/tagit/js/tag-it.min'));
	  $categoryName = '';
	  if(isset($this->request->data['EmailCategory']['title']))
	  {
	  	$categoryName = $this->request->data['EmailCategory']['title'];
	  }
	  ?>
<!-- BEGIN PAGE HEADER--> 
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"><?php echo "Email List";?> </h3>
    <div class="page-bar">
    	<ul class="page-breadcrumb">
    		<li> <i class="fa fa-home"></i>
    			<a href="<?php echo $this->html->url(array("admin"=>true,"controller" => "emailContents","action" => "edit", 'full_base' => true))?>">Home</a> <i class="fa fa-angle-right"></i>
    		</li>
    		<li>
    			<a href="#"><?php echo "Email System"; ?></a> <i class="fa fa-angle-right"></i>
    		</li>
    		<li>
    			<a href="<?php echo $this->html->url(array("admin"=>true,"controller" => "emailContents","action" => "index"))?>"><?php echo "Email List"; ?></a> <i class="fa fa-angle-right"></i>
    		</li>
    		<?php if(!empty($categoryName)){ ?>
    		<li>
    			<a href="#"><?php echo $categoryName; ?></a> <i class="fa fa-angle-right"></i>
    		</li>
    		<?php } ?>
    		<li>
    			<a href="#"><?php  echo $this->request->data['EmailContent']['title']; ?></a>
    		</li>
    	</ul>
    </div>
    <?php echo $this->Session->flash();?>
	<!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
	<div class="col-md-12">
		<!--BEGIN TABS-->
					<div class="row profile-account">
						<div class="col-md-12">
									<?php 
										echo $this->Form->create('EmailContent', array('url'=>array('controller'=>'emailContents','action'=>'edit','admin'=>true),'class'=>'form-horizontal'));
										
										$id = $this->request->data['EmailContent']['id'];
										$keyword = $this->request->data['EmailContent']['keywords'];
										echo $this->Form->input('id',array('class' => 'form-control hide'));
										echo $this->Form->input('keywords',array('class' => 'form-control hide','label'=>false,'value'=>$keyword));
										echo $this->Form->hidden('from',array('class' => 'form-control hide','value'=>$this->request->data['EmailContent']['from'],'required'=>true)); 
									?>
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-3">Title</label>
											<div class="col-md-6">
												<?php echo $this->Form->input('title', array('class' => 'form-control','label' => false));?>
											</div>						
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">From</label>
											    <div class="col-md-9">
								    		       <ul id="from" class="form_textbox" style="margin-left:200px;"></ul>
 												</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Subject</label>
											<div class="col-md-6">
												<?php echo $this->Form->input('subject', array('class' => 'form-control','label' => false));?>
											</div>						
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Message</label>
										    <div class="col-md-9">
									        	<?php echo $this->Form->input('message', array('class' => 'form-control ckeditor','type'=>'textarea','label' => false,'rows'=>'6','data-error-container'=>'#editor2_error'));?>
												<div id="editor2_error">
												</div>
											</div>
										</div>								
										<div class="form-group">
											<label class="control-label col-md-3">Email Category</label>
											<div class="col-md-6">
											<?php
											foreach ($emailCategories as $key => $val) {
												$email_cat[$val['EmailCategory']['id']]= $val['EmailCategory']['title'];
											}
											echo $this->Form->input('email_category_id', array( 'options' => $email_cat,'class'=>'form-control','tabindex'=>'3','label' => false)); ?>
											</div>		
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Keyword</label>
											<div class="col-md-6">
												<p class="form-control-static">
												<?php echo $keyword;?>
												</p>
											</div>						
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Status</label>
											<div class="col-md-6">
											<?php echo $this->Form->input('status', array( 'options' => array('1' => 'Active', '0' => 'Inactive'),'class'=>'form-control','tabindex'=>'3','label' => false)); ?>
											</div>		
										</div>
										<div class="form-group margiv-top-10">
											<label class="control-label col-md-3"></label>
											<div class="col-md-6">
											<?php echo $this->Form->submit('Save Changes',array('value'=>'Submit','class'=>'btn green','type'=>'submit','label' => false,'div'=>false,));?> 
											</div>
										</div>
									<?php echo $this->Form->end();?> 
									</div>
									<div class="form-group">
											<div class="col-md-1">
											<?php
											if(isset($pr_item) && !empty($pr_item))
												echo $this->Html->link('<< Prev',array('admin'=>true, 'controller'=>'emailContents', 'action'=>'edit',$pr_item));
											else
												echo "<< Prev";
											?>
											</div>
											<div class="col-md-10"></div>
											<div class="col-md-1" style="text-align:right;">
											<?php
											if(isset($nx_item) && !empty($nx_item))
												echo $this->Html->link('Next >>',array('admin'=>true, 'controller'=>'emailContents', 'action'=>'edit',$nx_item));
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
<!-- END PAGE CONTENT-->
<script type="text/javascript">

$(function(){
	$('#from').tagit({
		singleField: true,
		singleFieldNode: $('#EmailContentFrom'),
	});
});
	
</script> 