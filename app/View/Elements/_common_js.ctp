<!-- MODAL SECTION HERE -->
<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="postRequirement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<!-- MODAL SECTION HERE -->

<script type="text/javascript">
    var USR = '<?php echo AuthComponent::user('user_type'); ?>';
    var USRID = '<?php echo AuthComponent::user('id'); ?>';
    $(document).ready(function () {
        $('.tip-attached').tooltip();
        
        if ($('#resentRoom').length) {
            $("#resentRoom").owlCarousel({
                autoPlay: 10000, //Set AutoPlay to 3 seconds
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });
        }

        $("#loginOpen, .loginOpen").click(function () {
            $.ajax({
                url: '<?php echo $this->Html->url(array("controller" => "users", "action" => "login", '1'), true); ?>',
                type: "GET",
                success: function (data) {
                    $.unblockUI();
                    $("#loginModal").html(data);
                    $("#loginModal").modal('show');
                },
                error: function (xhr) {
                    $.unblockUI();
                    ajaxErrorCallback(xhr);
                }
            });
        });

        $("#loginModal").on("submit", "#UserLoginForm", function () {
            //$.blockUI({baseZ:2000});
            $(this).ajaxSubmit({
                beforeSubmit: validateLogin,
                success: function (rd) {
                    $.unblockUI();
                    try {
                        var resData = jQuery.parseJSON(rd);

                        if (resData.status === 0) {
                            alert(resData.msg);
                        } else {
                            $("#loginModal").modal('hide');
                            window.top.location = resData.redirect_uri;
                        }
                    } catch (e) {
                        $.unblockUI();
                        $("#loginModal").html(rd);
                        $("#loginModal").modal('show');
                    }
                },
                error: function (xhr) {
                    $.unblockUI();
                    ajaxErrorCallback(xhr);
                }
            });
            return false;
        });

        $("#report").click(function () {
            var room_id = $('#report').data('room-id');
            $.ajax({
                url: '<?php echo $this->Html->url(array("controller" => "rooms", "action" => "report", '1'), true); ?>',
                type: "GET",
                data: ({room_id: room_id}),
                success: function (data) {
                    $.unblockUI();
                    $("#reportModal").html(data);
                    $("#reportModal").modal('show');
                },
                error: function (xhr) {
                    $.unblockUI();
                    ajaxErrorCallback(xhr);
                }
            });
        });
        $('#postRequirment').click(function () {
            URL = '<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'requirements')); ?>';
            $.ajax({
                url: URL,
                method: "POST",
                success: function (data) {
                    // console.log(data);
                    $.unblockUI();
                    $("#postRequirement").html(data);
                    $("#postRequirement").modal('show');
                },
                error: function (xhr) {
                    $.unblockUI();
                    ajaxErrorCallback(xhr);
                }
            });
        });








        //console.log(USRID);
        $("#enquiryModal").on("submit", "#EnquiryIndexForm", function () {
            $(this).ajaxSubmit({
                //  beforeSubmit: validateLogin,
                success: function (rd) {
                    console.log(rd);
                    try {
                        var resData = $.parseJSON(rd);
                        if (resData.status == 0) {
                            alert(resData.msg);
                        } else {
                            $("#enquiryModal").modal('hide');
                            //window.top.location = resData.redirect_uri;
                        }
                    } catch (e) {
                        //$("#enquiryModal").html(rd);
                        $("#enquiryModal").modal('hide');
                    }
                },
                error: function (xhr) {
                    ajaxErrorCallback(xhr);
                }
            });
            return false;
        });
        $('#roomList, .room-detail').on("click", ".send-enquiry", function () {
            var _this = this;
            open_enquiry_popup(_this);
        });
        $(".show-number").click(function () {
            if (USRID != '') {
                var _this = this;
                getNumber(_this);
            } else {
                $("#loginOpen").click();
            }
        });
        // Submit front newsletter //
        $("#side_newsletter").on("submit", "#NewsletterDetailForm", function () {
            $(this).ajaxSubmit({
                success: function (rd) {
                    try {
                        var resData = $.parseJSON(rd);
                        console.log(resData.status);
                        if (resData.status == 0) {
                            alert(resData.msg);
                        } else {
                            alert(resData.message);
                        }
                    } catch (e) {
                        alert(resData.message);
                    }
                },
                error: function (xhr) {
                    ajaxErrorCallback(xhr);
                }
            });
            return false;
        });
    }); // End of doc ready //

    //TODO ::
    function validateLogin() {
        blockUIWait();
    }

    function blockUIWait(msg) {
        if (!msg) {
            msg = "<?php echo __('Please Wait...') ?>";
        }
        $.blockUI({
            baseZ: 2000,
            message: '<div style="padding: 6px 2px;"><h4 class="blockUIh4"><span class="blockUILoading"></span> ' + msg + '</h4><div>'
        });
    }

    function open_enquiry_popup(_this) {
        $.blockUI();
        var room_id = $(_this).data('id');
        $.ajax({
            url: '<?php echo $this->Html->url(array("controller" => "Enquiries", "action" => "index")) ?>',
            type: "GET",
            data: {room_id: room_id},
            success: function (data) {
                $.unblockUI();
                if (data == '0') {
                    window.location.href = "<?php echo $this->Html->url(array("controller" => "pages", "action" => "noredirect")) ?>";
                } else {
                    $("#enquiryModal").html(data);
                    $("#enquiryModal").modal('show');
                }
            },
            error: function (xhr) {
                ajaxErrorCallback(xhr);
            }
        });
    }





    function getNumber(_this) {
        $.blockUI();
        var room_id = $(_this).data('id');
        $.ajax({
            url: '<?php echo $this->Html->url(array("controller" => "rooms", "action" => "getNumber")) ?>',
            type: "GET",
            data: {room_id: room_id},
            success: function (data) {
                $.unblockUI();
                if (data == '0') {
                    window.location.href = "<?php echo $this->Html->url(array("controller" => "pages", "action" => "noredirect")) ?>";
                } else {
                    $('#num' + room_id).removeClass('btn-primary');
                    $('#num' + room_id).removeClass('blue');
                    $('#num' + room_id).addClass('be-bolder');
                    $('#num' + room_id).html(data);
                }
            },
            error: function (xhr) {
                ajaxErrorCallback(xhr);
            }
        });
    }

    function ajaxErrorCallback(xhr) {
        alert("<?php echo __("Oops! something went wrong."); ?>");
    }

    $(".fav-btn").on("click", function () {
        var _this = this;
        var currentClass = $(this).children("i").attr("class");
        var room_id = $(this).data('room-id');
        // console.log($("#log").html("clicked: " + event.target.nodeName));
        console.log(_this);
        makeRoomFav(room_id, currentClass, _this);
    });


    // makeFavRoom function //
    function makeRoomFav(room_id, currentClass, _this) {

        if (USRID != '') {
            URL = '<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'makeRoomFav')); ?>';

            $.ajax({
                url: URL,
                method: "POST",
                data: ({roomId: room_id}),
                success: function (data) {
                    try {
                        if (data == 1) {
                            if (currentClass == 'fa fa-heart') {
                                $(_this).children("i").attr("class", 'fa fa-heart-o');

                            } else {
                                $(_this).children("i").attr("class", 'fa fa-heart');

                            }
                            // window.location.reload();
                        }
                        else if (data == 0) {
                            console.log('make favorite failed.');
                        }
                    } catch (e) {
                        window.console && console.log(e);
                    }
                },
                error: function (xhr) {
                    ajaxErrorCallback(xhr);
                }
            });
        } else {
            $("#loginOpen").click();
        }


    }

    // makeFavRoom ends //

    // makeFavRoom function //
    function postRequirement(roomId) {
        if (USRID != '') {
            URL = '<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'makeRoomFav')); ?>';

            $.ajax({
                url: URL,
                method: "POST",
                data: ({roomId: roomId}),
                success: function (data) {
                    try {
                        if (data == 1) {
                            window.location.reload();
                        }
                        else if (data == 0) {
                            console.log('make favorite failed.');
                        }
                    } catch (e) {
                        window.console && console.log(e);
                    }
                },
                error: function (xhr) {
                    ajaxErrorCallback(xhr);
                }
            });
        } else {
            $("#loginOpen").click();
        }


    }

    // makeFavRoom ends //

</script>