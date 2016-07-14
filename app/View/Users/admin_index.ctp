<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Users List
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?>'>Create</a>
        </div>
        <div class="panel-body">

            <table class="table table-bordered" id="basic-datatable">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Last Login</th>

                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <?php foreach ($userList as $row) { ?>
                    <tr>
                        <td><?php echo $row['User']['id']; ?></td>
                        <td><?php echo $row['User']['name'] . " ( " . $row['User']['first_name'] . " " . $row['User']['last_name'] . " )"; ?></td>
                        <td><?php echo $row['User']['email']; ?></td>
                        <td><?php echo ($row['User']['role'] == 1) ? "User" : "Agent"; ?></td>
                        <td><?php echo $row['User']['last_login']; ?></td>

                        <td>
                            <span class="btn btn-default btn-xs"><i class="fa fa-dot-circle-o"></i></span>
                            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'users', 'action' => 'edit', $row['User']['id'])); ?>"><span class="btn btn-default btn-xs"><i class="fa fa-edit"></i></span></a>
                            <a href="<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'admin_mail', $row['User']['id'])); ?>"><span class="btn btn-default btn-xs"><i class="fa fa-envelope"></i></span></a>
                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_delete', $row['User']['id'])); ?>" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

</div>