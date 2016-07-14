<?php
echo $this->Html->css('/js/owl-carousel/owl.carousel');
echo $this->Html->script('owl-carousel/owl.carousel.min');
?>

<style>
    .section-resent-rooms{
        background: url('<?php echo $this->webroot; ?>img/bg-jodhpur.jpg');
    }
</style>

<div class="section-room-search">
    <!-- Header Carousel -->
    <div id="myCarousel" class="carousel slide home-slider">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('<?php echo $this->webroot; ?>img/home-1-slide-1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Just what you expected</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo $this->webroot; ?>img/home-1-slide-2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo $this->webroot; ?>img/home-1-slide-3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>


    <div class="col-lg-8 col-lg-offset-2 room-filter-wrapper">
        <div class="search-main-filters-title">
            <h6>Find Your</h6>
            <h5>Dream Place</h5>
        </div>
        <?php echo $this->Form->create('Room', array('controller' => 'rooms', 'action' => 'listing')); ?>
        <div class="input-group room-search">
            <div class="input-group-btn">
                <?php
                echo $this->Form->input('roomtype', array(
                    'class' => 'form-control',
                    'options' => array('0' => 'Rent', '1' => 'Sell')
                ));
                ?>
            </div>
            <div>
                <?php
                echo $this->Form->input('searchteam', array(
                    'class' => 'form-control search-text',
                    'placeholder' => 'Enter locality or pincode',
                    'div' => false,
                    'label' => false,
                    'autocomplete' => "off"
                ));
                ?>
                <div class="display_search" id="display_search"></div>
            </div>
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="section-resent-rooms">
    <div class="container">
        <h2 class="section-title">Recent Properties</h2>
        <div class="row" id="resentRoom">
            <?php
            if (!empty($roomList)) {
                foreach ($roomList as $room) {
                    ?>
                    <div class="room recent">
                        <div class="thumbnail">
                            <span class="badge blue pull-right room-for">
                                <?php echo ($room['Room']['list_for'] == 1) ? "For Sale" : "For Rent"; ?>
                            </span>
                            <?php
                            $_filename = 'uploads/' . $room['Room']['id'] . '_room.png';

                            if (file_exists(WWW_ROOT . 'img/' . $_filename)) {
                                echo $this->Html->image($_filename, array('class' => 'img-responsive'));
                            } else {
                                echo $this->Html->image('no_image.png');
                            }
                            ?>
                            <div class="caption">
                                <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'detail', $room['Room']['id'])); ?>"><?php echo $room['Room']['title']; ?></a>
                                <span><?php echo $room['Room']['address']; ?></span>
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


<script type="text/javascript">
    $('document').ready(function () {
        $('#RoomSearchteam').keyup(function () {
            var _term = $(this).val();
            if (_term == "") {
                $("#display_search").html("");
            } else {
                $.ajax({
                    url: '<?php echo $this->Html->url(array("controller" => "rooms", "action" => "searchterm"), true); ?>',
                    type: "GET",
                    data: {term: _term},
                    success: function (data) {
                        $("#display_search").html(data);
                    },
                    error: function (xhr) {
                        ajaxErrorCallback(xhr);
                    }
                });
            }
        });


    });

    function submitFilter(term) {
        $('#RoomSearchteam').val(term);
        $('#RoomListingForm').submit();
    }
</script>