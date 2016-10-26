<div class="hr-line"></div>
<?php
$userData = $this->Session->read('Auth');
//pr($userData);
//pr($userRooms);
?>
<div class="container" id="roomContent">


    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>


        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <blockquote>
                        <?php //pr($userData); ?>
                        <p>Welcome, <?php echo $userData['User']['first_name'] . " " . @$userData['User']['last_name'] ?></p>
                        <small><cite title="Source Title"> <?php echo $userData['User']['email']; ?> </cite></small>
                    </blockquote>

                    <div class="btn-submitproperties pull-right">
                        <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'add')); ?>">
                            <span id="subup"><i class="fa fa-upload"></i></span>
                            <span id="subct">Submit a Property</span>
                        </a>
                    </div>


                    <?php if (!empty($userRooms)) { ?>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Listing Code</th>
                                <th>Listing Title</th>
                                <th>Total Views</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($userRooms as $room) {
                                    ?>
                                <tr>
                                    <td><?php echo $room['Room']['room_code']; ?></td>
                                    <td><?php echo $room['Room']['title']; ?></td>
                                    <td><?php echo $room['Room']['hits']; ?></td>
                                    <td><?php echo date('d M Y', strtotime($room['Room']['created'])); ?></td>
                                    <td> 
                                        <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'detail', $room['Room']['id'])); ?>">View</a> 
                                        | <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'edit', $room['Room']['id'])); ?>">Edit</a>
                                        | Delete 
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tr>
                        </table>
                    <?php } else {
                        ?>
                        <div class="dashboard-content">
                            <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'add')); ?>" class="btn btn-primary btn-circle">Add Free Listing</a>
                        </div>            
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

