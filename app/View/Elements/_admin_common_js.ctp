<!-- MODAL SECTION HERE -->

<div class="modal fade in" id="userInfoModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


</div>

<!-- MODAL SECTION HERE -->


<script type="text/javascript">
    var USR = '<?php echo AuthComponent::user('user_type'); ?>';
    var USRID = '<?php echo AuthComponent::user('id'); ?>';
    $(document).ready(function() {



        $(".showUserData").click(function() {
            //$.blockUI();
            var user_id = $(this).data('user-id');
            $.ajax({
                url: '<?php echo $this->Html->url(array('admin' => true, "controller" => "users", "action" => "showUserData", '1'), true); ?>',
                type: "POST",
                data: ({user_id: user_id}),
                success: function(data) {
                    //   $.unblockUI();
                    $("#userInfoModal").html(data);
                    $("#userInfoModal").modal('show');
                },
                error: function(xhr) {
                    $.unblockUI();
                    ajaxErrorCallback(xhr);
                }
            });
        });


    });

</script>