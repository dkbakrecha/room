<div class="list-group">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile')); ?>" class="list-group-item active">
                    <span class="glyphicon glyphicon-home"></span> 
                    Dashboard
                </a>
                <a href="<?php echo $this->Html->url(array('controller' => 'enquiries', 'action' => 'index')); ?>" class="list-group-item">
                    <span class="glyphicon glyphicon-comment"></span> 
                    Enquiries <span class="badge">0</span>
                </a>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>" class="list-group-item">
                    <span class="glyphicon glyphicon-user"></span>
                    Edit Profile 
                </a>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>" class="list-group-item">
                    <span class="glyphicon glyphicon-off"></span>
                    Logout
                </a>
            </div>