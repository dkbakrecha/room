<div class="container" id="roomContent">
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Show Enquiries
                </div>
                <div class="panel-body">
                    <?php
                    if (!empty($enq_list)) {
                        pr($enq_list);
                    } else {
                        ?>
                        <div class="center margin-top-20 padd-top-100">
                            <?php echo $this->Html->image('lulu/Chats.png'); ?>
                            <p>No Enquiries yet!! If someone enquiry on your listing then It is show here. </p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>