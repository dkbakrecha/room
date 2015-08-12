        <div class="warper container-fluid">
        	
            <div class="page-header"><h1>Album <small></small></h1></div>
            
            
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Album Table
                        <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'albums', 'action' => 'add', 'admin' => true)); ?>'>Create</a>
                    </div>
                    <div class="panel-body">
                    
                        <table class="table">
                            <tr>
                                <th width="10%">ID</th>
                                <th>Title</th>
                                <th width="15%">Action</th>
                            </tr>
                            <?php foreach($albumList as $albumRow){ ?>
                            <tr>
                                <td><?php echo $albumRow['Album']['id']; ?></td>
                                <td><?php echo $albumRow['Album']['title']; ?></td>
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