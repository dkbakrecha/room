<div class="hr-line"></div>
<?php
$userData = $this->Session->read('Auth');
?>
<div class="container" id="roomContent">
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    My Listing
                    <a class='btn btn-primary btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'add')); ?>'>Add</a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>Listing Code</th>
                            <th>Listing Title</th>
                            <th>Total Views</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        foreach ($myListing as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['Room']['room_code']; ?></td>
                                <td><?php echo $row['Room']['title']; ?></td>
                                <td><?php echo $row['Room']['hits']; ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'rooms','action' => 'detail', $row['Room']['id'])); ?>">View</a> 
                                    |
                                    <a href="<?php echo $this->Html->url(array('controller' => 'rooms','action' => 'edit', $row['Room']['id'])); ?>">Edit</a>
                                    | Delete 
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

