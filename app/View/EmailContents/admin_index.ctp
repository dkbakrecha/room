<a id="fancyBoxUser" href="" style="display:none"></a>
<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12"> 
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title"><?php echo "Email System";?> </h3>
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
		<div class="table-container">
			<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
				<thead>
					<tr role="row" class="heading">
						<th width="5%">Id</th>
						<th width="10%">Title</th>
						<th>Subject</th>
						<th width="15%">Keyword</th>
						<th width="5%">Actions</th>
					</tr>
					<tr role="row" class="filter">
						<td>
							<input type="text" class="form-control form-filter input-sm" name="id">
						</td>
						<td>
							<input type="text" class="form-control form-filter input-sm" name="title">
						</td>
						<td>
							<input type="text" class="form-control form-filter input-sm" name="subject">
						</td>
						<td>
							<input type="text" class="form-control form-filter input-sm" name="keyword">
						</td>
						<td>
							<div class="margin-bottom-5">
								<button class="btn btn-sm yellow filter-submit margin-bottom">
									<i class="fa fa-search"></i>
									Search
								</button>
							</div>
							<button class="btn btn-sm red filter-cancel">
								<i class="fa fa-times"></i>
								Reset
							</button>
						</td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
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

  var handleRecords = function () {

        var grid = new Datatable();

        grid.init({
            src: $("#datatable_ajax"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
				//UIExtendedModals();
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 
                "lengthMenu": [
                    [20, 50, 100, 150, -1],
                    [20, 50, 100, 150, "All"] // change per page values here
                ],
                "pageLength": 20, // default record count per page
                "ajax": {
                   // "url": "demo/table_ajax.php", // ajax source
					"url": "<?php echo $this->html->url(array("admin"=>true, "controller" => "emailContents", "action" => "EmailContentGrid"))?>", // ajax source
                },
				"columns": [
						{ "name": "EmailContent.id" },
						{ "name": "EmailContent.title" },
						{ "name": "EmailContent.subject" },
						{ "name": "EmailContent.keyword" },
						{ "name": "" },
						], // Set column names to use in sorting
                "order": [
                    	[1, "desc"]
                		], // set column as a default sort by asc
				"aoColumnDefs": [
					  { 'bSortable': false, 
					  	'aTargets': [ 0, 2, 3, 4] }
				   ],				
		    }
        });

        // handle group actionsubmit button click
        grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
            e.preventDefault();
            var action = $(".table-group-action-input", grid.getTableWrapper());
            if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
                grid.setAjaxParam("customActionType", "group_action");
                grid.setAjaxParam("customActionName", action.val());
                grid.setAjaxParam("id", grid.getSelectedRows());
                grid.getDataTable().ajax.reload();
                grid.clearAjaxParams();
            } else if (action.val() == "") {
                Metronic.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'Please select an action',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            } else if (grid.getSelectedRowsCount() === 0) {
                Metronic.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'No record selected',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            }
        });
    }
 
$(document).ready(function() {
	handleRecords();
});


function changeEmailContentStatus(id,status){
	
	URL = '<?php echo $this->Html->url(array("controller" => "EmailContents","action" => "changeStatus"));?>';
	
	$.ajax({
		url : URL,
		method : 'POST',
		data : ({id:id,status:status}),
		beforeSend: function (XMLHttpRequest) {
			$("#busy-indicator").fadeIn();
		},
		complete: function (XMLHttpRequest, textStatus) {
			$("#busy-indicator").fadeOut();
		},
		success : function(data){
			jQuery("#list").trigger("reloadGrid");
		}
	});
}

</script>
