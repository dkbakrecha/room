<style>
    #map {
        height: 300px;
        display: show;
    }
</style>

<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>-->

<div class="hr-line"></div>

<div class="container" id="roomContent">
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Listing
                    <a class='btn btn-primary btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'mylisting')); ?>'>Back</a>
                </div>
                <div class="panel-body">

                    <?php
                    echo $this->Form->create('Room', array('class' => 'form-horizontal room-form'));
                    echo $this->Form->hidden('id');
                    ?>    

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('title', array(
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Room Title'
                            ));
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('address', array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Room Title'
                            ));
                            ?>

                            <div id="map"></div>
                        </div>
                    </div>
                    <hr class="dotted">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('price', array(
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Price'
                            ));
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select Facilities</label>
                        <div class="col-sm-7">
                            <?php
                            //pr($this->request->data['RoomOption']);
                            /* Make selected facility key array */
                            $_facility_selected = array();
                            foreach ($this->request->data['RoomOption'] as $_key => $_val) {
                                if ($_val['status'] == 1) {
                                    $_facility_selected[$_key] = $_val['facility_id'];
                                }
                            }
                            //pr($_facility_selected);

                            /* View Facility */
                            foreach ($fa_List as $facility) {
                                $_chk = false;
                                if (in_array($facility['Facilities']['id'], $_facility_selected)) {
                                    $_chk = true;
                                }
                                //pr($facility);
                                echo $this->Form->input('RoomOption.' . $facility['Facilities']['id'] . '.facility_id', array(
                                    'class' => 'form-control',
                                    'type' => 'checkbox',
                                    'label' => $facility['Facilities']['title'],
                                    'checked' => $_chk
                                ));
                            }
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('description', array(
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Room description ...'
                            ));
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Beds</label>
                        <div class="col-sm-2">
                            <?php
                            echo $this->Form->input('beds', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'title' => 'Show with listing'
                            ));
                            ?>
                        </div>

                        <label class="col-sm-2 control-label">Baths</label>
                        <div class="col-sm-2">
                            <?php
                            echo $this->Form->input('baths', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'title' => 'Show with listing'
                            ));
                            ?>
                        </div>
                        
                        <label class="col-sm-2 control-label">Area</label>
                        <div class="col-sm-2">
                            <?php
                            echo $this->Form->input('area', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'title' => 'Show with listing'
                            ));
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Room Images</label>
                        <div class="col-sm-5">
                            <div id="images">
                                <ul id="sortable">
                                    <?php
                                    if (isset($product_image[0])) {
                                        foreach ($product_image as $image) {
                                            ?>
                                            <li id="item_<?php echo $image['ProductPhoto']['id']; ?>">
                                                <div class="card_image">
                                                    <div class="x_img_outer">
                                                        <div class="x_img" style="" onclick="delImage('<?php echo $image['ProductPhoto']['id']; ?>')"></div>
                                                    </div>
                                                    <?php echo $this->Image->resize('admin_uploads/' . $image['ProductPhoto']['image'], 100, 150); ?>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul></div>
                            <div style="clear:both"></div>
                            <div onclick="$('#newImage').click();"  class="goyal btn btn-primary turquoise">Upload Images</div>
                        </div>
                    </div>    
                    <hr class="dotted">

                    <button type="submit" class="goyal btn btn-primary btn-lg turquoise col-lg-offset-2 col-lg-4">Save This Listing</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Warper Ends Here (working area) -->    

<script>
    function newupload() {
        var percent = $('.percent');
        var bar = $('.bar');

        var options = {
            url: '<?php echo $this->Html->url(array("controller" => "rooms", "action" => "image_multi_upload")); ?>',
            data: ({room_id: $('#RoomId').val()}),
            beforeSend: function () {
                $(".progress").css('opacity', '1');
                bar.width('0%');
                percent.html('0%');
            },
            beforeSubmit: function (arr, $form, options) {
                if (arr[1] && arr.length == 2) {
                    var image = arr[1].value.name;
                    var fname = image;
                    var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
                    if (!re.exec(fname)) {
                        alert("File extension not supported!");
                    }

                    var size = arr[1].value.size / 1024;
                    var imageSize = Math.round(size);  /// IN KB
                    var maximumImageSize = 5120;  ////  IN KB  ///// 5 MB

                    if (imageSize > maximumImageSize) {
                        alert('Image should be less than 5MB');
                        return false;
                    }
                }
            },
            /* progress bar call back*/
            uploadProgress: function (event, position, total, percentComplete) {
                var pVel = percentComplete + '%';
                bar.width(pVel);
                percent.html(pVel);
            },
            /* complete call back */
            complete: function (response) {
                $(".progress").css('opacity', '0');
                response = response.responseText;
                var res_array = $.parseJSON(response);

                //if user upload single image then these error will shown.
                if (res_array.length === 1) {
                    if (response == 'TYPE_ERROR') {
                        $("html,body").animate({scrollTop: $('#phototipsa').position().top}, "slow");
                        alert('Sorry darling, please use a jpeg or png image.');
                        return false;
                    }

                    if (response == 'SIZE_RATIO_ERROR') {
                        $("html,body").animate({scrollTop: $('#phototipsa').position().top}, "slow");
                        alert('Image size should be minimum of 300px X 300px');
                        return false;
                    }

                    if (response == 'SIZE_ERROR') {
                        $("html,body").animate({scrollTop: $('#phototipsa').position().top}, "slow");
                        alert('Image should be less than 5MB');
                        return false;
                    }
                }

                if (res_array.length) {
                    //$('.photo_type_error').html('');
                    var pVel = 100 + '%';
                    percent.html(pVel);
                    bar.width(pVel);
                    var is_error = 0;
                    for (var i = 0; i < res_array.length; i++) {
                        if (res_array[i]['error'] == 1) {
                            is_error++;
                            continue;
                        }

                        image_preview(res_array[i]);
                    }
                    if (is_error != 0) {
                        if (is_error == res_array.length) {
                            alert('Please upload photo(s) which meet our photo upload requirements.');
                        }
                        else {
                            alert('Some photo does not meet our photo upload requirements.');
                        }
                    }
                    if (is_error == 0) {
                        $("html,body").animate({scrollTop: 1000}, "slow");
                    }
                }
                else {
                    alert('Error in image uploading, Please try again later .');
                    return false;
                }
            }
        }

        $('#imageTempStep1Form').ajaxForm(options);
    }

    //set set preview
    function image_preview(res) {
        $("#busy-indicator").fadeOut();
        var obj = res;//JSON.parse(res);

        x_image_content = '<li id="item_' + obj.img_id + '"><div class="card_image"><div class="x_img_outer"><div class="x_img" style="display:;" onclick="delImage(' + obj.img_id + ')"></div></div><img src="' + obj.img_name + '"/></div></li>';
        $('#sortable').prepend(x_image_content);
        $('#RoomId').val(obj.room_id);
        //product_id = obj.product_id;

        newupload();
        coverPhoto();
        sortable_image();

        $('.percent').html('0%');
        $('.bar').width('0%');
    }

    $(function () {
        $('.tip-attached').tooltip();
        newupload();
        sortable_image();
    });

    function sortable_image() {
        $("#sortable").sortable({
            start: function (event, ui) {
                is_dragging = true;
            },
            stop: function (event, ui) {
                is_dragging = false;
            },
            opacity: 0.8,
            cursor: 'move',
            update: function () {
                var order = $(this).sortable("serialize");
                $.post("<?php echo $this->Html->url(array('admin' => true, "controller" => "products", "action" => "updateorder")); ?>", order, function (theResponse) {
                    coverPhoto();
                });
            }
        });
    }

    function delImage(Photo_id) {
        if (confirm('Are you sure you want to delete this image ?')) {
            URL = '<?php echo $this->Html->url(array('admin' => true, "controller" => "cards", "action" => "deletePhoto")); ?>';
            $.ajax({
                url: URL,
                method: 'POST',
                data: ({Photo_id: Photo_id}),
                success: function (data) {
                    $("#item_" + Photo_id).remove();
                    sortable_image();
                }
            });
        }
    }

    var cover_photo = '<div class="cover_photo" title="To change cover photo drag desire image at first position.">Cover Photo</div>';
    function coverPhoto() {
        $(".cover_photo").remove();
        $("#sortable li:eq(0)").append(cover_photo);

    }
    $(document).ready(function () {
        $("#RoomAdminAddForm").submit(function (e) {
            if ($("#images ul li").length <= 0) {
                //alert("Please Upload your cover image");
                return true;
            } else {
                return true;
            }
        });
    });

    //GOOGLE AUTO COMPLETE FIELD
    if (google)
        google.maps.event.addDomListener(window, 'load', initialize);

    var placeSearch, autocomplete;

    function initialize() {
        /* MAP Concept */
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });



        // Create the autocomplete object, restricting the search
        // to geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
                /** @type {HTMLInputElement} */(document.getElementById('RoomAddress')),
                {types: ['geocode']});
        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            console.log(place);
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }

            marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);



            /*fillInAddress();
             var place = autocomplete.getPlace();
             document.getElementById('UserCity').value = place.name;*/
        });



        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });




    }
</script>

<?php echo $this->Form->create('imageTemp', array('type' => 'file', 'id' => 'imageTempStep1Form')); ?>
<label style="display:none" class="">
    <?php
    echo $this->Form->input('uploadfile.', array(
        'name' => 'uploadfile[]',
        'id' => 'newImage',
        'type' => 'file',
        'label' => false,
        'onchange' => "$('#imageTempStep1Form').submit();",
        'class' => '',
        'multiple'));
    ?>
</label>
<?php echo $this->Form->end(); ?>