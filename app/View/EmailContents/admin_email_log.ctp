<a id="fancyBoxUser" href="" style="display:none"></a>
<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12"> 
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title"><?php echo "Email Log";?> </h3>
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
					<a href="#"><?php echo "Email Log"; ?></a>
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
						<th width="5%">#</th>
						<th width="15%">User Email</th>
						<th>Mail Title</th>
						<th width="25%">Subject</th>
						<th width="17%">Sending Date</th>
						<th width="10%">Actions</th>
					</tr>
					<tr role="row" class="filter">
						<td></td>
						<td>
							<input type="text" class="form-control form-filter input-sm" name="email">
						</td>
						<td>
							<input type="text" class="form-control form-filter input-sm" name="title">
						</td>
						<td>
							<input type="text" class="form-control form-filter input-sm" name="subject">
						</td>
						<td>
							<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
							<input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="From">
							<span class="input-group-btn">
								<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</span> </div>
							<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="To">
								<span class="input-group-btn">
									<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
								</span> </div>
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
					"url": "<?php echo $this->html->url(array("admin"=>true, "controller" => "emailContents", "action" => "EmailLogGrid"))?>", // ajax source
                },
				"columns": [
						{ "name": "" },
						{ "name": "User.email" },
						{ "name": "EmailContent.title" },
						{ "name": "UserMail.subject" },
						{ "name": "UserMail.created" },
						{ "name": "" },
						], // Set column names to use in sorting
                "order": [
                    	[4, "desc"]
                		], // set column as a default sort by asc
				"aoColumnDefs": [
					  { 'bSortable': false, 
					  	'aTargets': [ 0, 2, 3, 5] }
				   ],				
		    }
        });        
    }
 
$(document).ready(function() {
	handleRecords();
});
</script>
