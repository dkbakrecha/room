        <div class="warper container-fluid">
        	
            <div class="page-header"><h1>Enquiries <small></small></h1></div>
            
            
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Enquiry Table
                        
                    </div>
                    <div class="panel-body">
                    
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th>Type</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <?php foreach($enqList as $row){ ?>
                            <tr>
                                <td><?php echo $row['Enquiry']['id']; ?></td>
                                <td><?php echo ($row['Enquiry']['type'] == 0)?"Room":"Other"; ?></td>
                                <td><?php echo $row['Enquiry']['phone']; ?></td>
                                <td><?php echo $row['Enquiry']['email']; ?></td>
                                <td><?php echo $row['Enquiry']['message']; ?></td>
                                <td><?php echo $row['Enquiry']['created']; ?></td>
                                <td>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-dot-circle-o"></i></span>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></span>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            
        </div>