<div class="hr-line"></div>
<div class="container" id="roomContent">
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Listing
                    <a class='btn btn-purple btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile', 'admin' => true)); ?>'>Back</a>
                </div>
                <div class="panel-body">

                    <?php
                    echo $this->Form->create('Room', array('class' => 'form-horizontal room-form'));
                    echo $this->Form->hidden('id');
                    ?>    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">List For</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('list_for', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'options' => array('0' => 'Rent', '1' => 'Sale'),
                                'title' => 'Not update and show in edit mode'
                            ));
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-7">
                            <?php
                            echo $this->Form->input('cate', array(
                                'class' => 'form-control tip-attached',
                                'label' => false,
                                'options' => $cateList,
                                'placeholder' => 'Select Category',
                                'title' => 'Not update and show in edit mode'
                            ));
                            ?>
                        </div>
                    </div>
                    <hr class="dotted">


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
                        <label class="col-sm-2 control-label">Select Facilities</label>
                        <div class="col-sm-7">
                            <?php
                            foreach ($fa_List as $facility) {
                                //pr($facility);
                                echo $this->Form->input('RoomOption.' . $facility['Facilities']['id'] . '.facility_id', array(
                                    'class' => 'form-control',
                                    'type' => 'checkbox',
                                    'label' => $facility['Facilities']['title'],
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
            url: '<?php echo $this->Html->url(array('admin' => true, "controller" => "rooms", "action" => "image_multi_upload")); ?>',
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