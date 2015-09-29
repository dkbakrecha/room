<div class="hr-line"></div>

<div class="container" id="roomContent">
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Shortlist
                </div>
                <div class="panel-body">
                    <?php //pr($favList); ?>

                    <?php
                    if (!empty($favList)) {
                        foreach ($favList as $room) {
                            ?>
                            <div class="listing-block">
                                <div class="row">
                                    <div class="col-lg-4"><?php
                                        $_filename = 'uploads/' . $room['Room']['id'] . '_room.png';

                                        if (file_exists(WWW_ROOT . 'img/' . $_filename)) {
                                            echo $this->Html->image($_filename, array('class' => 'img-responsive'));
                                        } else {
                                            echo $this->Html->image('no_image.png');
                                        }
                                        ?></div>
                                    <div  class="col-lg-8">
                                        <h4><a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'detail', $room['Room']['id'])); ?>"><?php echo __($room['Room']['title']); ?></a></h4>
                                        <div class="row listing-info">
                                            <?php //pr($room); ?>
                                            <div class="col-lg-3 info-block">
                                                <div class="info-value">
                                                    <?php
                                                    if (!empty($room['Room']['price'])) {
                                                        echo __("&#8377; " . $room['Room']['price']);
                                                    } else {
                                                        echo __("Not Metion");
                                                    }
                                                    ?>
                                                </div>
                                                <div class="info-title">Price</div>
                                            </div>

                                            <div class="col-lg-3 info-block">
                                                <div  class="info-value">
                                                    <?php if ($room['Room']['list_for'] == 1) { ?>
                                                        Sale
                                                    <?php } else { ?>
                                                        Rent 
                                                    <?php } ?>
                                                </div>
                                                <div class="info-title"> List For </div>
                                            </div>

                                            <div class="col-lg-3 info-block">
                                                <div  class="info-value">
                                                    <?php if ($room['Room']['created_by'] > 1) {
                                                        ?>
                                                        Owner
                                                        <?php
                                                    } else {
                                                        ?>
                                                        Broker
                                                    <?php }
                                                    ?>
                                                </div>
                                                <div class="info-title"> Posted By </div>
                                            </div>

                                            <div class="col-lg-3 info-block">
                                                <div  class="info-value"><?php echo ($room['Room']['Category']['title']) ? $room['Room']['Category']['title'] : '-'; ?> </div>
                                                <div class="info-title"> Listing Type </div>
                                            </div>
                                        </div>

                                        <div class="room-action">
                                            <a class="btn btn-primary blue show-number" data-id="<?php echo $room['Room']['id']; ?>" id="num<?php echo $room['Room']['id']; ?>">Show Number</a>
                                            <a class="btn btn-primary site-green send-enquiry" data-id="<?php echo $room['Room']['id']; ?>">Send Enquiry</a>
                                            <a class="btn btn-primary green"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                        </div>
                                        <?php
                                        if (date('j-n-Y', strtotime($room['Room']['created'])) == date('j-n-Y')) {
                                            ?>
                                            <a class="new-box">
                                                <span class="new-label">New</span>
                                            </a>
                                            <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

