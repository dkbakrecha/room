<div class="section-room-listing">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-blue room-filter">

                <div class="row">
                    <div class=" listing-block">
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>"  class="btn btn-primary btn-lg green makeglow">Post Listing</a>
                        <a class="btn btn-primary btn-lg site-green send-enquiry-main" id="postRequirment"  data-id="0">Post Requirement</a>
                    </div>
                    <div class=" listing-block">

                    </div>
                </div>

                <div id="roomFilter">
                    <?php echo $this->element('room_filter', array('category' => $statics['category_filter'])); ?>
                </div>


                <div class="row cream">
                    <div class=" col-lg-12 listing-block">
                        <h4>Best place for add free listing and contact directly to buyer. Update daily Listing</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 room-list" id="roomList">
                <?php echo $this->element('room_listing', array('roomList' => $roomList)); ?>
            </div>
        </div>
    </div> 
</div>
<script type="text/javascript">
    function searchRooms() {


        var URL = '<?php echo $this->Html->url(array("controller" => "rooms", "action" => "listing")); ?>';
        var form = $('#searchForm');
        var formData = form.serializeArray();
        //console.log(formData);
        formData.push({'name': 'sort_by', 'value': $("#sort_by").val()});
        formData.push({'name': 'show', 'value': $("#show").val()});
        formData.push({'name': 'searchby', 'value': 'filter'});
        //console.log((formData));
        //return false;
        $.ajax({
            beforeSend: function (XMLHttpRequest) {
                $("#loading-image").fadeIn();
            },
            complete: function (XMLHttpRequest, textStatus) {
                $("#loading-image").fadeOut();
            },
            type: "POST",
            evalScripts: true,
            url: URL,
            data: $.param(formData),
            success: function (data) {
                $('input:checkbox').removeAttr('checked');
                console.log(data.filter);
                var res = JSON.parse(data);
                $('#roomFilter').html(res.filter);
                $('#roomList').html(res.html);
                $('#productTags').html(res.tags);
            }
        });
    }

    function removeSearch(ele) {
        //console.log(ele.id);
        $("#" + ele.id).prop('checked', false);
        searchProducts();
    }
</script>