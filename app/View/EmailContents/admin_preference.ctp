<a id="fancyBoxUser" href="" style="display:none"></a>
<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12"> 
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title"><?php echo "Email List";?> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li> <i class="fa fa-home"></i>
					<a href="<?php echo $this->html->url(array("admin"=>true,"controller" => "Users","action" => "dashboard", 'full_base' => true))?>">Home
					</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#"><?php echo "Email System"; ?></a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#"><?php echo "Email List"; ?></a>
				</li>
			</ul>
		</div>
		<!-- END PAGE TITLE & BREADCRUMB--> 
	</div>
</div>
<!-- END PAGE HEADER-->
<div class="portlet">
	<div class="portlet-body">
		<div class="row">
			<?php foreach ($tableData as $key => $emailData) { ?>
				<div class="col-md-6">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-table"></i><?php echo $emailData['EmailCategory']['title']; ?>
								</div>								
							</div>
							<div class="portlet-body">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered table-advance table-hover">
									<thead>
									<tr>
										<th>
											<i class="fa fa-envelope"></i> <?php echo "Title"; ?>
										</th>
										<th class="hidden-xs">
											<i class="fa fa-header"></i> <?php echo "Subject"; ?>
										</th>
										<th style="width:28%;">
											<i class="fa fa-link"></i> <?php echo "Action"; ?>
										</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($emailData['EmailContent'] as $keyContent => $valueContent) { ?>
										<tr>
										<td>
											<?php echo $valueContent['title']; ?>
										</td>
										<td class="hidden-xs">
											<?php echo $valueContent['subject']; ?>
										</td>
										<td>
											<a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'emailContents','action'=>'edit',$valueContent['id']));?>" class="btn purple btn-xs gray-stripe">
											<i class="fa fa-edit"></i>&nbsp;Edit </a>
											&nbsp;&nbsp;
											<a href="<?=$this->webroot."admin/EmailContents/mailpreview/".$valueContent['id']?>" class="btn default btn-xs green-stripe mail_preview">
											<i class="fa fa-eye"></i>&nbsp;Preview </a>
										</td>
									</tr>
									<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
				</div>		
			<?php } ?>		
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){ 
		$('.mail_preview').fancybox({
			type: "iframe",
	      	//width : 700, // or whatever
			margin  : 0,
			minHeight : 300,
			maxHeight : 1100,
			closeBtn   : true,
			autoHeight : true,
		});
	});
</script>