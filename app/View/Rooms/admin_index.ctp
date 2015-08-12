        <div class="warper container-fluid">
        	
            <div class="page-header"><h1>Rooms <small></small></h1></div>
            
            
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Room Table
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'add', 'admin' => true)); ?>'>Create</a>
                    </div>
                    <div class="panel-body">
                    
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th>Room For</th>
                                <th>Listing Code</th>
                                <th>Title</th>
                                <th>View</th>
                                <th>Created</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <?php foreach($roomList as $row){ ?>
                            <tr>
                                <td><?php echo $row['Room']['id']; ?></td>
                                <td><?php echo ($row['Room']['list_for'] == 1)?"Sale":"Rent"; ?></td>
                                <td><?php echo $row['Room']['room_code']; ?></td>
                                <td><?php echo $row['Room']['title']; ?></td>
                                <td><?php echo $row['Room']['hits']; ?></td>
                                <td><?php echo $row['Room']['created']; ?></td>
                                <td>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-dot-circle-o"></i></span>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'rooms' ,'action' => 'admin_edit', $row['Room']['id'])); ?>"><span class="btn btn-default btn-xs"><i class="fa fa-edit"></i></span></a>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></span>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            
        </div>