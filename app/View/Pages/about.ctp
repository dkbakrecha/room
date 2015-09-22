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
            
            <div class="team-info">
                <div class="col-lg-6">
                    <span class="">Dharmendra</span>
                    <span class="">Programmer</span>
                </div>
                
                <div class="col-lg-6">
                    <span class="">Shashank</span>
                    <span class="">Business Marketing</span>
                </div>
                
                <div class="col-lg-6">
                    <span class="">Narveer</span>
                    <span class="">E-Marketing</span>
                </div>
                
                <div class="col-lg-6">
                    <span class="">Sunny</span>
                    <span class="">Software Engineer</span>
                </div>
                
                <div class="col-lg-6">
                    <span class="">Jay</span>
                    <span class="">Software Engineer</span>
                </div>
                
                <div class="col-lg-6">
                    <span class="">Himanshu</span>
                    <span class="">Android Developer (Software Engineer)</span>
                </div>
                
                <div class="col-lg-6">
                    <span class="">Govind</span>
                    <span class="">Software Engineer</span>
                </div>
            </div>
        </section>
        
        <?php echo $this->element('sidebar_cms'); ?>
    </div>
</div>