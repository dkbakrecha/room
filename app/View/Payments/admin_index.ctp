<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Plan Informations
            <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'payments', 'action' => 'add', 'admin' => true)); ?>'>Entry</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>Payment ID</th>
                    <th>Payment Type</th>
                    <th>Plan Name</th>
                    <th>User</th>
                    <th>Exp Date</th>
                    <th>Created</th>
                    <th>Payment Status</th>
                </tr>
                <?php
                foreach ($paymentList as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['Payment']['id']; ?></td>
                        <td>Plan Credit</td>
                        <td><?php echo $row['Plan']['title']; ?></td>
                        <td><?php echo $row['User']['name'] . " (". $row['User']['email'] .")"; ?></td>
                        <td><?php echo $row['User']['exp_date']; ?></td>
                        <td><?php echo $row['Payment']['created']; ?></td>
                        <td><?php echo $row['Payment']['status']; ?></td>
                    </tr> 
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>