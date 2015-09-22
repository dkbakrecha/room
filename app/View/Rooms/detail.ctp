<div class="container">
    <div class="row">
        <div class="col-lg-8 room-detail">
            <?php /* ?>
              <ol class="breadcrumb">
              <li><a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'listing')) ?>"><i class="glyphicon glyphicon-home"></i></a></li>
              <li class="active"><?php echo __($roomInfo['Room']['title']); ?></li>
              </ol>
              <?php */ ?>

            <div class="listing-block panel">
                <div class="row panel-body">
                    <div  class="col-lg-12">
                        <h1 class="room-title"><?php echo __($roomInfo['Room']['title']); ?></h1>
                        <?php
                        if (!empty($roomInfo['Image'])) {
                            $i = 1;
                            ?>
                            <div class="row carousel-holder">

                                <div class="col-md-12">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!--                            <ol class="carousel-indicators">
                                                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                                    </ol>-->
                                        <div class="carousel-inner">
                                            <?php
                                            foreach ($roomInfo['Image'] as $roomImage) {
                                                $actClass = ($i == 1) ? 'active' : '';
                                                ?>
                                                <div class="item <?php echo $actClass; ?>">
                                                    <?php //echo $this->Html->image('uploads/'.$roomImage['title'],array('class' => 'slide-image')); ?>
                                                    <?php echo $this->Image->resize('uploads/' . $roomImage['title'], 400, 500) ?>
                                                    <!--<img class="slide-image" src="http://placehold.it/800x300" alt="">-->
                                                </div>
                                                <?php
                                                $i++;
                                                //pr($roomImage);
                                            }
                                            ?>

                                            <!--                                    <div class="item">
                                                                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                                                                </div>
                                                                                <div class="item">
                                                                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                                                                </div>-->
                                        </div>
                                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <?php
                        } 
                        ?>

                        <div>
                            <div class="col-lg-6">
                                <div class="row listing-info">
                                    <div class="col-lg-4 info-block">
                                        <div class="info-value">
                                            <?php
                                            if (!empty($roomInfo['Room']['price'])) {
                                                echo __("&#8377; " . $roomInfo['Room']['price']);
                                            } else {
                                                echo __("Not Metion");
                                            }
                                            ?>
                                        </div>
                                        <div class="info-title">Price</div>
                                    </div>

                                    <div class="col-lg-4 info-block">
                                        <div  class="info-value">
                                            <?php if ($roomInfo['Room']['list_for'] == 1) { ?>
                                                Sale
                                            <?php } else { ?>
                                                Rent 
                                            <?php } ?>
                                        </div>
                                        <div class="info-title"> List For </div>
                                    </div>

                                    <div class="col-lg-4 info-block">
                                        <div  class="info-value">Broker </div>
                                        <div class="info-title"> Posted By </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pull-right">
                                    <a class="btn btn-primary blue show-number"data-id="<?php echo $roomInfo['Room']['id']; ?>" id="num<?php echo $roomInfo['Room']['id']; ?>">Show Number</a>
                                    <a class="btn btn-primary site-green send-enquiry" data-id="<?php echo $roomInfo['Room']['id']; ?>">Send Enquiry</a>
                                    <a class="btn btn-primary green">
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h2 class="sub-heading">Room Description</h2>
                        <div class="add-info">
                            <span class="add-item">Description : </span>
                            <span class="bold"><?php echo __($roomInfo['Room']['description']); ?></span>
                        </div>

                        <div class="add-info">
                            <span class="add-item">Address : </span>
                            <span class="bold"><?php echo __($roomInfo['Room']['address']); ?></span>
                        </div>

                        <div class="row">
                            <?php
                            if (!empty($roomInfo['RoomOption'])) {
                                foreach ($roomInfo['RoomOption'] as $opt_room) {
                                    ?>
                                    <div class="col-lg-6 add-info">
                                        <span class="add-item"><?php echo $opt_room['Facility']['label']; ?> :</span> 
                                        <span class="bold"><?php echo $opt_room['Facility']['title']; ?></span>
                                    </div>
                                    <?php
                                }
                            }
                            ?>


                            <div class="col-lg-6 add-info">
                                <span class="add-item">Listing ID :</span> 
                                <span class="bold"><?php echo $roomInfo['Room']['room_code']; ?></span>
                            </div>
                            <div class="col-lg-6 add-info">
                                <span class="add-item">Listed date :</span> 
                                <span class="bold"><?php echo $roomInfo['Room']['created']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-right "><a class="text-danger">Report This Listing</a></span>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <?php //echo $this->element('sidebar_enquiery'); ?>
            <?php echo $this->element('sidebar_newsletter'); ?>
        </div>
    </div>
</div> 