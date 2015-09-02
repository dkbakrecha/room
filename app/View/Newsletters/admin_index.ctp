<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Newsletters
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'add', 'admin' => true)); ?>'>Add new subscriber</a>
        </div>
        <div class="panel-body">
            <form id="form_sendMail" action='<?php echo $this->html->url(array("admin"=>true,"controller" => "email_contents","action" => "mail")); ?>' method="post" enctype="multipart/form-data" onsubmit="return validate();">

            <table class="table table-bordered">
                <tr>
                    <th width=""></th>
                    <th width="">ID</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th width="15%">Action</th>
                </tr>
                <?php foreach ($letterList as $row) { ?>
                    <tr>
                        <td><?php echo $this->Form->checkbox('email', array('value' => $row['Newsletter']['id'])); ?></td>
                        <td><?php echo $row['Newsletter']['id']; ?></td>
                        <td><?php echo $row['Newsletter']['fullname']; ?></td>
                        <td><?php echo $row['Newsletter']['email']; ?></td>
                        <td>
                            <a href="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'edit', $row['Newsletter']['id'])); ?>">
                                <span class="btn btn-default btn-xs"><i class="fa fa-edit"></i></span>
                            </a>

                            <?php if ($row['Newsletter']['status'] == 1) { ?>
                                <span class="fa fa-dot-circle-o"></span>
                            <?php } else { ?>
                                <span class="fa fa-circle-o"></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <input type="hidden" name="user_ids" id="user_ids" />
<input type="submit" class="header_button" id="sendMail" name="sendMail" value="Send Letter">
            
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

</div>
<script>
    
    
function validate(){
	
	var users; 
        var users = $('input[name="data[email]"]:checked').map(function() {return this.value;}).get().join(',');

	if(users==''){
		alert('Please select users');
		return false;
	}else{
		$("#user_ids").val(users);
		$("#form_sendMail").submit();	
	}

}


    $(function() {
        $('#get_checkbox_values').click(function() {
            var val = [];
            $(':checkbox:checked').each(function(i) {
                val[i] = $(this).val();
            });
        });

         console.log();
    });
</script>