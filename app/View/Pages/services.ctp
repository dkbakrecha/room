<div id="cms-header">
    <div class="container">
        <h3><?php echo $this->Html->image('lulu/Web Browser.png',array('class' => 'cms-icon')); ?> Services</h3>
    </div>
</div>

<div id="cms-primary">
    <div class="container">
        <section id="content" role="main" class="col-lg-8">
            <div class="entry-content">
                <div class="row services">
        <div class="col-sm-4 col-md-6">
          <div class="service text-center">
            <div class="icon"> <?php echo $this->Html->image('lulu/Chats.png'); ?></div>
            <h4>Personal Support</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <!--/.service --> 
        </div>
        <!--/column -->
        <div class="col-sm-4 col-md-6">
          <div class="service text-center">
            <div class="icon"> <?php echo $this->Html->image('lulu/Mail.png'); ?></div>
            <h4>Video Support</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <!--/.service --> 
        </div>
        <!--/column -->
        <div class="col-sm-4 col-md-6">
          <div class="service text-center">
            <div class="icon"> <?php echo $this->Html->image('lulu/Support.png'); ?> </div>
            <h4>Extensive Documentation</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <!--/.service --> 
        </div>
        <!--/column --> 
      </div>
            </div>
        </section>

        <?php echo $this->element('sidebar_cms'); ?>
    </div>
</div>