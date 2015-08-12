        <div class="warper container-fluid">
        	
            <div class="page-header"><h1>Facilities <small>Meta's facilities Collections</small></h1></div>
            
            
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Facilities Table
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('action' => 'add', 'admin' => true)); ?>'>Add Facility</a>
                    </div>
                    <div class="panel-body">
                    
                        <table class="table table-bordered">
                            <tr>
                                <th width="10%">ID</th>
                                <th>Title</th>
                                <th width="15%">Action</th>
                            </tr>
                            <?php foreach($cateList as $row){ ?>
                            <tr>
                                <td><?php echo $row['Facility']['id']; ?></td>
                                <td><?php echo $row['Facility']['title']; ?></td>
                                <td>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-dot-circle-o"></i></span>
                                    <a href="<?php echo $this->Html->url(array('action' => 'edit',$row['Facility']['id'])); ?>"><span class="btn btn-default btn-xs"><i class="fa fa-edit"></i></span></a>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></span>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            
        </div>