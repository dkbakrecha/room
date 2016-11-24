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
                <!--                <div class="carousel-caption">
                                    <h2>Just what you expected</h2>
                                </div>-->
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo $this->webroot; ?>img/home-1-slide-2.jpg');"></div>
                <!--                <div class="carousel-caption">
                                    <h2>Caption 2</h2>
                                </div>-->
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo $this->webroot; ?>img/home-1-slide-3.jpg');"></div>
                <!--                <div class="carousel-caption">
                                    <h2>Caption 3</h2>
                                </div>-->
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo $this->webroot; ?>img/home-1-slide-4.jpg');"></div>
                <!--                <div class="carousel-caption">
                                    <h2>Caption 3</h2>
                                </div>-->
            </div>
        </div>

        <!-- Controls -->
        <!--        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>-->
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
                echo $this->Form->input('searchterm', array(
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
                            <?php if (!empty($room['Room']['price'])) { ?>
                                <span class="badge blue pull-right room-rate">
                                    <?php echo $room['Room']['price']; ?>
                                </span>
                            <?php } ?>
                            <?php
                            $_filename = 'uploads/' . $room['Room']['id'] . '_room.png';

                            if (file_exists(WWW_ROOT . 'img/' . $_filename)) {
                                echo $this->Html->image($_filename, array('class' => 'img-responsive'));
                            } else {
                                echo $this->Html->image('no_image.png');
                            }
                            ?>
                            <div class="caption">
                                <?php
                                $_room_for = "For Rent";
                                $_forcolor = "turquoise";
                                if ($room['Room']['list_for'] == 1) {
                                    $_room_for = "For Sale";
                                    $_forcolor = "red";
                                }
                                ?>
                                <span class="badge <?php echo $_forcolor; ?> pull-right room-for">
                                    <?php echo $_room_for; ?>
                                </span>

                                <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'detail', $room['Room']['id'])); ?>">
                                    <?php echo $this->General->short_msg($room['Room']['title'], 25); ?>
                                </a>
                                
                                <span><?php echo $room['Room']['address']; ?></span>

                                <div class="room-metas">
                                    <ul class="feature-info">
                                        <?php if (!empty($room['Room']['beds'])) { ?>
                                            <li><?php echo $this->Html->image('rs_icons/bed.png'); ?> <span><?php echo $room['Room']['beds']; ?></span>
                                            </li>
                                        <?php } ?>

                                        <?php if (!empty($room['Room']['baths'])) { ?>
                                            <li><?php echo $this->Html->image('rs_icons/bathtub.png'); ?> <span><?php echo $room['Room']['baths']; ?></span>
                                            </li>
                                        <?php } ?>

                                        <?php if (!empty($room['Room']['area'])) { ?>
                                            <li>Area<span><?php echo $room['Room']['area']; ?> sqft</span>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                    <ul class="wishlist-compare-wrapper">
                                        <li>
                                            <a class="gl-add-wishlist tip-attached" href="#" title="Add to wishlist">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="gl-add-compare tip-attached" href="#" title="Add to Compare">
                                                <i class="fa fa-book">
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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


<div class="section-services">
    <div class="container">
        <h2 class="section-title">Some <span>good</span> reasons</h2>
        <div class="row" id="homeServices">
            <div class="col-lg-6">
                <div class="servicebox">
                <h3>Genuine listing</h3>
                <p>Room247.in has been created considering our valuable room seekers. Each single listing you will see on our website is genuine. We collect the best correct possible information for the room they advertise and bring it to your screen. We have used standard advanced search methods, which help seekers find the rooms with all the facilities mentioned and in the minimum possible time.</p>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="servicebox">
                <h3>Visual Analysis</h3>
                <p>We have used the HD images and videos for the rooms which helps seekers to see each single corner of the room and the facilities that house holders provide. Room247.in believes that the kind of service if the seekers expect from us we should concentrate on that not on the flashy designs. Room247.in has been crafted to deliver the best possible information along with the detailed visuals.</p>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="servicebox">
                <h3>Customer service</h3>
                <p>Room247.in has a tremendous customer service. We are continuously striving hard to reach improve and to broaden our customers service using various mediums. You can contact us via Skype, Facebook, Twitter, Watsapp, Google App, Email and of course via the numbers given. We value your time and thatswhy we are happy to assist you.</p>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="servicebox">
                <h3>One to one</h3>
                <p>We have shorten the distance between owners and the room seekers. If seekers wants to contact they can contact owners using chat function and they can also call them. Seekers also contact using Facebook.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <hr>
            <div class="col-md-8 col-sm-6 hidden-xs">
                <?php echo $this->Html->image('room-image.png'); ?>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3><span>Get started</span> with Room247.in</h3>
                <p>
                    Room247.in is an endeavor for our esteemed room seekers who are looking for their “Ashiyana”.
                </p>
                <ul class="list_order">
                    <li><span>1</span>Select your preferred tours</li>
                    <li><span>2</span>Purchase tickets and options</li>
                    <li><span>3</span>Pick them directly from your office</li>
                </ul>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>" class="btn btn-primary btn-lg green">Start now</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('document').ready(function () {
        $('#RoomSearchterm').keyup(function () {
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