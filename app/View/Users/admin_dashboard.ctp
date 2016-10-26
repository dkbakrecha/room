<div class="warper container-fluid">

    <div class="row">
        
        <div class="col-md-12">
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


    </div>
</div>