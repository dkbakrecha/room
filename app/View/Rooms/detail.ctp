<style>
    .section-room-detail-header{
        background: url('<?php echo $this->webroot; ?>img/bg-jodhpur.jpg');
    }
</style>
<div class="section-room-detail-header">
    <div class="container">
        <h1 class="room-title"><?php echo __($roomInfo['Room']['title']); ?></h1>
    </div>
</div>
<div class="container">
    <div class="room-detail">
        <div class="listing-block panel">
            <div  class="row">
                <div class="col-lg-6">
                    <?php
                    echo $this->Html->image('lulu/Location Pin.png', array('width' => '80', 'class' => 'detail-icon'));
                    ?>
                    <div class="detail-main-top pull-right">
                        <div class="">
                            <h1 class="room-title"><?php echo __($roomInfo['Room']['title']); ?></h1>
                            <h2 class="room-address"><?php echo __($roomInfo['Room']['address']); ?></h2>
                            <div class="listing-info">
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
                        <div class="">
                            <div class="room-actions">
                                <a class="btn btn-primary site-green send-enquiry" data-id="<?php echo $roomInfo['Room']['id']; ?>"><i  class="glyphicon glyphicon-comment"></i> Send Enquiry</a>
                                <a class="btn btn-primary green fav-btn" title="Make Favorite" data-room-id="<?php echo $roomInfo['Room']['id']; ?>">
                                    <?php
                                    $favRoomId = $roomInfo['Favorite']['room_id'];
                                    if (isset($favRoomId) && !empty($favRoomId)) {
                                        ?>
                                        <i  class="fa fa-heart"></i>
                                        <?php
                                    } else {
                                        ?>
                                        <i  class="fa fa-heart-o"></i>
                                        <?php
                                    }
                                    ?>
                                </a>
                                <span><?php echo $fav_count; ?> people make favorite this listing.</span>
                                <!--<a class="btn btn-primary blue show-number" data-id="<?php //echo $roomInfo['Room']['id'];     ?>" id="num<?php //echo $roomInfo['Room']['id'];     ?>">Show Number</a>-->
                            </div>

                            <table class="table table-bordered">
                                <tr>
                                    <td>Contact</td>
                                    <td><?php
                                        if (!empty($roomInfo['Room']['contact'])) {
                                            echo $roomInfo['Room']['contact'];
                                        } else {
                                            echo "Not Metion";
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>ID</td>
                                    <td><?php echo $roomInfo['Room']['room_code']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="room-metas">
                                            <ul class="feature-info">
                                                <?php if (!empty($roomInfo['Room']['beds'])) { ?>
                                                    <li><?php echo $this->Html->image('rs_icons/bed.png'); ?> <span><?php echo $roomInfo['Room']['beds']; ?></span>
                                                    </li>
                                                <?php } ?>

                                                <?php if (!empty($roomInfo['Room']['baths'])) { ?>
                                                    <li><?php echo $this->Html->image('rs_icons/bathtub.png'); ?> <span><?php echo $roomInfo['Room']['baths']; ?></span>
                                                    </li>
                                                <?php } ?>

                                                <?php if (!empty($roomInfo['Room']['area'])) { ?>
                                                    <li>Area<span><?php echo $roomInfo['Room']['area']; ?> sqft</span>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                    if (!empty($roomInfo['Image'])) {
                        $i = 1;
                        ?>
                        <div class="row carousel-holder">
                            <div class="col-md-12">
                                <div id="carousel-example-generic" class="carousel slide room-images" data-ride="carousel">
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
                    } else {

                        $_filename = 'uploads/' . $roomInfo['Room']['id'] . '_room.png';

                        if (file_exists(WWW_ROOT . 'img/' . $_filename)) {
                            ?>
                            <center>     <?php
                                echo $this->Html->image($_filename, array('class' => 'img-responsive'));
                                ?>
                            </center>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>

            <div class="room-detail-info">
                <div class="col-lg-6">
                    <h2 class="sub-heading">Room Description</h2>
                    <div class="add-info">
                        <span class="add-item">Description : </span>
                        <span class="bold"><?php echo __($roomInfo['Room']['description']); ?></span>
                    </div>

                    <div class="add-info">
                        <span class="add-item">Address : </span>
                        <span class="bold"><?php echo __($roomInfo['Room']['address']); ?></span>
                    </div>
                    <?php
                    if (!empty($roomInfo['RoomOption'])) {
                        foreach ($roomInfo['RoomOption'] as $opt_room) {
                            ?>
                            <div class="add-info">
                                <span class="add-item"><?php echo $opt_room['Facility']['label']; ?> :</span> 
                                <span class="bold"><?php echo $opt_room['Facility']['title']; ?></span>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="add-info">
                        <span class="add-item">Listing ID :</span> 
                        <span class="bold"><?php echo $roomInfo['Room']['room_code']; ?></span>
                    </div>
                    <div class="add-info">
                        <span class="add-item">Listed date :</span> 
                        <span class="bold"><?php echo $roomInfo['Room']['created']; ?></span>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h2 class="sub-heading">Property Map</h2>

                    Hello Map
                </div>
            </div>
            <div class="panel-footer">
                <span class="pull-right "><a class="text-danger addcursor" data-room-id="<?php echo $roomInfo['Room']['id']; ?>"  id="report">Report This Listing</a></span>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div> 



<script>
    makeCount('<?php echo $roomInfo['Room']['id']; ?>');
    function makeCount(id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array("controller" => "rooms", "action" => "hitcount")) ?>',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                try {
                    var pd = $.parseJSON(data);
                    if (pd.status == 0) {
                        alert(pd.msg);
                    }
                } catch (e) {
                    window.console && console.log(e);
                }
            },
            error: function (xhr) {
                ajaxErrorCallback(xhr);
            }
        });
    }


</script>
