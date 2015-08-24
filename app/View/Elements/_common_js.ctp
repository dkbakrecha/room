<!-- MODAL SECTION HERE -->
<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<!-- MODAL SECTION HERE -->


<script type="text/javascript">
    var USR = '<?php echo AuthComponent::user('user_type'); ?>';
    var USRID = '<?php echo AuthComponent::user('id'); ?>';

    $(document).ready(function () {
        $("#loginOpen, .loginOpen").click(function() {

            window.location.href = '<?php echo $this->Html->url(array("controller" => "users", "action" => "login"), true); ?>';
        
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
            if(USRID != ''){
                var _this = this;
                getNumber(_this);
            }else{
                $("#loginOpen").click();
            }
        });
    }); // End of doc ready //

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

    function ajaxErrorCallback(xhr) {
        alert("<?php echo __("Oops! something went wrong."); ?>");
    }
</script>