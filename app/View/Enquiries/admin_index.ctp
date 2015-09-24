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
                                    <a href="<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'admin_mail', $row['Enquiry']['id'])); ?>"><span class="btn btn-default btn-xs"><i class="fa fa-envelope"></i></span></a>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'enquiries', 'action' => 'admin_delete', $row['Enquiry']['id'])); ?>" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            
        </div>