<div class="list-group">
    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile')); ?>" class="list-group-item active">
        <span class="glyphicon glyphicon-home"></span> 
        Dashboard
    </a>
    
    <?php if($user_info['role'] == 2){ ?>
    <a href="<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'mylisting')); ?>" class="list-group-item">
        <span class="glyphicon glyphicon-list"></span> 
        My Listing <span class="badge"><?php echo $roomCount; ?></span>
    </a>    
    <?php } ?>
    
    <a href="<?php echo $this->Html->url(array('controller' => 'enquiries', 'action' => 'index')); ?>" class="list-group-item">
        <span class="glyphicon glyphicon-comment"></span> 
        Enquiries <span class="badge">0</span>
    </a>
    
    <a href="<?php echo $this->Html->url(array('controller' => 'enquiries', 'action' => 'index')); ?>" class="list-group-item">
        <span class="glyphicon glyphicon-comment"></span> 
        ShortLists <span class="badge">0</span>
    </a>
    
    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>" class="list-group-item">
        <span class="glyphicon glyphicon-user"></span>
        My Profile 
    </a>
    
    <?php if($user_info['role'] == 2){ ?>
    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'account')); ?>" class="list-group-item">
        <span class="glyphicon glyphicon-cog"></span> 
        My Account
    </a>    
    <?php } ?>
    
    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>" class="list-group-item">
        <span class="glyphicon glyphicon-off"></span>
        Logout
    </a>
</div>