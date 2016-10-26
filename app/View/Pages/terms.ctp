<div id="cms-header">
    <div class="container">
        <h3><?php echo $this->Html->image('lulu/Link.png',array('class' => 'cms-icon')); ?> Terms & Conditions</h3>
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
        </section>
        
        <?php echo $this->element('sidebar_cms'); ?>
    </div>
</div>