        <div class="warper container-fluid">
        	
            <div class="page-header"><h1>Categories <small>Meta's categories Collections</small></h1></div>
            
            
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Category Table
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'add', 'admin' => true)); ?>'>Add Category</a>
                    </div>
                    <div class="panel-body">
                    
                        <table class="table table-bordered">
                            <tr>
                                <th width="10%">ID</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th width="15%">Action</th>
                            </tr>
                            <?php foreach($cateList as $cateRow){ ?>
                            <tr>
                                <td><?php echo $cateRow['Category']['id']; ?></td>
                                <td><?php echo $cateRow['Category']['code']; ?></td>
                                <td><?php echo $cateRow['Category']['title']; ?></td>
                                <td>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-dot-circle-o"></i></span>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-edit"></i></span>
                                    <span class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></span>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            
        </div>