<div class="hr-line"></div>
<?php
$userData = $this->Session->read('Auth');
?>
<div class="container" id="roomContent">

    
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->element('sidebar_user'); ?>
        </div>
        <div class="col-lg-9">
            <div class="row">
        <div class="col-lg-12">
            <div class="message yellow">
                <div class="row">
                    <div class="col-lg-1">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                    </div>
                    <div class="col-lg-11">
                        <div class="tag">
                            <span class="strong">Get start with room247.in!</span> Simple 2 step to complete your first listing.
                            <a href="<?php echo $this->Html->url(array('controller' => 'rooms','action' => 'add')); ?>" class="btn btn-default btn-md turquoise pull-right">COMPLETE PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <h1 class="welcome_msg">Welcome, <?php echo $userData['User']['email']; ?></h1>

            
        </div>
    </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <blockquote>
                        <?php //pr($userData); ?>
                        <p><?php echo $userData['User']['first_name'] . " " . @$userData['User']['last_name'] ?></p>
                        <small><cite title="Source Title"> <?php echo $userData['User']['email']; ?> </cite></small>
                    </blockquote>

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>Listing Code</th>
                            <th>Listing Title</th>
                            <th>Total Views</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

