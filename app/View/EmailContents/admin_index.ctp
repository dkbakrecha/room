<div class="warper container-fluid">
    <div class="page-header"><h1>Site Content <small>Site Static Content</small></h1></div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Site Content
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'add', 'admin' => true)); ?>'>Add Category</a>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
			<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
				<thead>
					<tr role="row" class="heading">
						<th width="5%">Id</th>
						<th width="10%">Title</th>
						<th>Subject</th>
						<th width="15%">Keyword</th>
						<th width="5%">Actions</th>
					</tr>
					
				</thead>
                                <tbody>
                                    <?php 
                                    foreach($emailContent as $row){
                                        ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                            
                                        <?php
                                    }
                                    ?>
                                    
                                    
                                </tbody>
			</table>
		 </div>
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
