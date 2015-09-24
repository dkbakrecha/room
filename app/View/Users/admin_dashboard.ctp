<div class="warper container-fluid">

    <div class="page-header"><h1>Dashboard <small>Administrator Area</small></h1></div>
    <?php //pr($statics); ?>

    <div class="row">
        
        <div class="col-md-4">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body text-center">
                        <p class="text-muted"><small></small></p>
                        <div id="dashboard-stats-sparkline5" class="mb10"><i class="fa fa-users fa-3x "></i></div>
                        <h5 class="no-margn"><strong><?php echo $statics['pending_user']; ?> / <?php echo $statics['total_user']; ?></strong></h5>
                    </div>
                    <div class="panel-footer text-center"><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><strong>Users Management</strong></a></div>
                </div>
            

            
                <div class="panel">
                    <div class="panel-body text-center">
                        <p class="text-muted"><small></small></p>
                        <div id="dashboard-stats-sparkline5" class="mb10"><i class="fa fa-home fa-3x "></i></div>
                        <h5 class="no-margn"><strong><?php echo $statics['pending_room']; ?> / <?php echo $statics['total_room']; ?></strong></h5>
                    </div>
                    <div class="panel-footer text-center"><a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'admin_index')); ?>"><strong>Rooms Management</strong></a></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body text-center">
                        <p class="text-muted"><small></small></p>
                        <div id="dashboard-stats-sparkline5" class="mb10"><i class="fa fa-comment fa-3x "></i></div>
                        <h5 class="no-margn"><strong><?php echo $statics['total_enquiry']; ?></strong></h5>
                    </div>
                    <div class="panel-footer text-center"><a href="<?php echo $this->Html->url(array('controller' => 'enquiries', 'action' => 'admin_index')); ?>"><strong>Enquiry Management</strong></a></div>
                </div>
                <div class="panel">
                    <div class="panel-body text-center">
                        <p class="text-muted"><small></small></p>
                        <div id="dashboard-stats-sparkline5" class="mb10"><i class="fa fa-send fa-3x "></i></div>
                        <h5 class="no-margn"><strong>0</strong></h5>
                    </div>
                    <div class="panel-footer text-center"><a href="<?php echo $this->Html->url(array('controller' => 'reviews', 'action' => 'admin_index')); ?>"><strong>Feedback Management</strong></a></div>
                </div>
            </div>
        </div>

    

        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Latest Enquires</div>
                <div class="panel-body">
                    <table class="table table-advance table-bordered table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if (!empty($statics['latest_enquiry'])) {
                            foreach ($statics['latest_enquiry'] as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['Enquiry']['id'] ?></td>
                                    <td><?php echo $row['Enquiry']['message'] ?></td>
                                    <td>
                                        <i class="btn fa fa-envelope"></i>
                                        <i class="btn fa fa-circle-o"></i>
                                        <i class="btn fa fa-trash-o"></i>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading">Task's in progress</div>
                <div class="panel-body">

<!--                    <p><strong>5000 Listing Views</strong> <small class="text-muted">45% completed</small></p>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                            <span class="sr-only">45% Complete</span>
                        </div>
                    </div>-->


                    <?php $listRoom = ($statics['total_room'] / 1000) * 100; ?>
                    <p><strong>1000 Room Listing</strong> <small class="text-muted"><?php echo $listRoom; ?>% completed</small></p>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $listRoom; ?>" aria-valuemin="0" aria-valuemax="1000" style="width: <?php echo $listRoom; ?>%">
                            <span class="sr-only"><?php echo $listRoom; ?>% Complete</span>
                        </div>
                    </div>

                    <?php $listUser = ($statics['total_user'] / 500) * 100; ?>
                    <p><strong>500 Users</strong> <small class="text-muted"><?php echo $listUser; ?>% completed</small></p>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $listUser; ?>" aria-valuemin="0" aria-valuemax="500" style="width: <?php echo $listUser; ?>%">
                            <span class="sr-only"><?php echo $listUser; ?>% Complete</span>
                        </div>
                    </div>


                    <p><strong>50 Enquires</strong> <small class="text-muted"><?php echo ($statics['total_enquiry'] * 2); ?>% completed</small></p>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($statics['total_enquiry'] * 2); ?>" aria-valuemin="0" aria-valuemax="50" style="width: <?php echo ($statics['total_enquiry'] * 2); ?>%">
                            <span class="sr-only"><?php echo ($statics['total_enquiry'] * 2); ?>% Complete</span>
                        </div>
                    </div>  



<!--                    <p><strong>10 Agents</strong> <small class="text-muted">0% completed</small></p>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" style="width: 0%">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>




                    <p><strong>10 Good Reviews</strong> <small class="text-muted">0% completed</small></p>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" style="width: 0%">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>  -->



                </div>
            </div>

        </div>



    </div>
</div>