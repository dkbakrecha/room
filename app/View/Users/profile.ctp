<div class="hr-line"></div>
<?php 
$userData = $this->Session->read('Auth'); 
?>
<div class="container" id="roomContent">
    
    <div class="col-lg-12">
        <h1 class="welcome_msg">Welcome, <?php echo $userData['User']['email']; ?></h1>

        <div class="message peach">
            <div class="row">
                <div class="col-lg-1">
                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                </div>
                <div class="col-lg-11">
                    <div class="tag">
                        <span class="strong">Get start with room247.in!</span> Simple 2 step to complete your first listing.
                        <a class="btn btn-default btn-lg chocolate">COMPLETE PROFILE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Profile Info</strong></div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-body">
                            <ul class="list-unstyled list-info">
                                <li class="ng-binding">
                                    <span class="icon glyphicon glyphicon-user"></span>
                                    <label>User name</label>
                                    Lisa Doe
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-envelope"></span>
                                    <label>Email</label>
                                    name@example.com
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-home"></span>
                                    <label>Address</label>
                                    Street 123, Avenue 45, Country
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-earphone"></span>
                                    <label>Contact</label>
                                    (+012) 345 6789
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-flag"></span>
                                    <label>Nationality</label>
                                    Australia
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

