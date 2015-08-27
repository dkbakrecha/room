<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Newsletters
                                   <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'add', 'admin' => true)); ?>'>Add new subscriber</a>
        </div>
        <div class="panel-body">

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
                        <td><?php echo $this->Form->checkbox('letterMail', array('value' => $row['Newsletter']['email'])); ?></td>
                        <td><?php echo $row['Newsletter']['id']; ?></td>
                        <td><?php echo $row['Newsletter']['fullname']; ?></td>
                        <td><?php echo $row['Newsletter']['email']; ?></td>
                        <td>
                            <a href="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'edit', $row['Newsletter']['id'])); ?>">
                                <span class="btn btn-default btn-xs"><i class="fa fa-edit"></i></span>
                            </a>
                            
                            <?php if($row['Newsletter']['status'] == 1){ ?>
                            <span class="fa fa-dot-circle-o"></span>
                            <?php }else{ ?>
                            <span class="fa fa-circle-o"></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

</div>