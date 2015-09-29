<?php
//prd($product);
?>
<div class="container" id="userInfoModal">
    <div class="col-md-6 col-md-offset-3">

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-text">
                    <?php echo __("User Information"); ?>
                </span>

                <button class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name : </label>
                    <span><?php echo $userInfo['User']['first_name'] . ' ' . $userInfo['User']['last_name']; ?> </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email : </label>
                    <span><?php echo $userInfo['User']['email']; ?> </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact : </label>
                    <span><?php echo $userInfo['User']['contact_no']; ?> </span>
                </div><div class="form-group">
                    <label for="exampleInputEmail1">Last Login : </label>
                    <span><?php echo $userInfo['User']['last_login']; ?> </span>
                </div>


            </div>

        </div>    

    </div>
</div>