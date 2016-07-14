<div id="cms-header">
    <div class="container">
        <h3><?php echo $this->Html->image('lulu/Home.png',array('class' => 'cms-icon')); ?> About Us</h3>
    </div>
</div>

<div id="cms-primary">
    <div class="container">
        <section id="content" role="main" class="col-lg-8">
            <div class="entry-content">
                <p>
                    
                    <?php echo $cmsContent['CmsPage']['description']; ?>
                </p>
            </div>
            
            <hr>
            <h4 class="heading-tag">Creative, friendly people dedicated to <br> producing ideas that work damn <br> hard for our clients</h4>
            <hr>
            
            <div class="team-info">
                <div class="col-lg-4">
                    <?php echo $this->Html->image('avtar/classy_user_18.png'); ?>
                    <span class="name">Dharmendra</span>
                    <span class="role">Founder</span>
                </div>
                
                <div class="col-lg-4">
                    <?php echo $this->Html->image('avtar/classy_user_19.png'); ?>
                    <span class="name">Shashank</span>
                    <span class="role">Business Marketing</span>
                </div>
                
                <div class="col-lg-4">
                    <?php echo $this->Html->image('avtar/classy_user_11.png'); ?>
                    <span class="name">Veer</span>
                    <span class="role">E-Marketing</span>
                </div>
            </div>
        </section>
        
        <?php echo $this->element('sidebar_cms'); ?>
    </div>
</div>