<div class="row">
    <div id="accordion" class="panel box-inner">
        <div class="panel-body side_newsletter" id="side_newsletter">
            <h3 class="heading-widget">Newsletter</h3>            
            <?php 
            echo $this->Form->create('Newsletter',array(
                'url' => array('controller' => 'newsletters', 'action' => 'add')
            )); 
            ?>
            
            <?php 
            echo $this->Form->input('fullname',array(
                'class' => 'form-control',
                'label' => false,
                'div' => 'form-group',
                'placeholder' => 'Full name'
            )); 
            ?>
            
            <?php 
            echo $this->Form->input('email',array(
                'class' => 'form-control',
                'label' => false,
                'div' => 'form-group',
                'placeholder' => 'Email Address'
            )); 
            ?>
            
            <?php 
            echo $this->Form->submit('Subscribe',array(
                'class' => 'btn btn-primary btn-lg pull-right site-green',
                'div' => 'form-group'
            )); 
            ?>
            
            <?php 
            echo $this->Form->end(); 
            ?>
        </div>
    </div>
</div>