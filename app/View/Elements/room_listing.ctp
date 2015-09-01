<?php
if (!empty($roomList)) {
    foreach ($roomList as $room) {
        ?>
        <div class="listing-block">
            <div class="row">
                <div class="col-lg-4"><?php echo $this->Html->image('no_image.png'); ?></div>
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
                            <div  class="info-value"><?php echo ($room['Category']['title'])?$room['Category']['title']:'-'; ?> </div>
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

<?php echo $this->Form->hidden('filter', array('value' => json_encode($statics))); ?>

<div class="row">
    <div class="col-lg-12 paging-center">
        <nav class="nea_pagination">
            <ul class="pagination pager">
                <li>
                    <?php
                    //prd(http_build_query($_REQUEST));
                    $this->Paginator->options(array(
                        'update' => '#roomList',
                        'url' => array('controller' => 'rooms', 'action' => 'room_listing', 'type' => 'page'),
                        'method' => 'POST',
                        //'data' => "data=" . @$search,
                        'data' => http_build_query($_REQUEST),
                        'evalScripts' => true,
                        'modulus' => 4, 'currentTag' => 'a'
                    ));

                    if ($this->Paginator->hasPrev()) {
                        echo $this->Paginator->prev(__("Previous"), array());
                    }
                    ?>
                </li>
                <li>
                    <?php echo $this->Paginator->numbers(array("separator" => " ")); ?>
                <li>
                <li>
                    <?php
                    if ($this->Paginator->hasNext()) {
                        echo $this->Paginator->next(__("Next"), array());
                    }
                    ?>
                </li>
            </ul>
        </nav> 
    </div>
</div>

<?php echo $this->Js->writeBuffer(); ?>