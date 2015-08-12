WELCOME To Dashboard || <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout')); ?>">LOGOUT</a><br>
<?php pr($this->Session->read('Auth')); ?>
