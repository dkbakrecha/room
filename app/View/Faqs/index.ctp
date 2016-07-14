<div id="cms-header">
    <div class="container">
        <h3><?php echo $this->Html->image('lulu/Documents.png', array('class' => 'cms-icon')); ?> Frequently Ask Questions</h3>
    </div>
</div>

<style>
    .faq_wrapper .panel-default{
        margin-bottom: 15px;
        border: 0px;
    }

    .faq_wrapper .panel-default > .panel-heading{
        background: transparent;
        border: 0px;
    }

    .faq_wrapper .panel-title{
        color: #333;
        font-size: 16px;
        line-height: 22px;
        text-transform: uppercase;
    }

    .faq_wrapper .panel-group .panel-heading + .panel-collapse > .panel-body, 
    .faq_wrapper .panel-group .panel-heading + .panel-collapse > .list-group{
        border: 0px;
        color: #555555;
    }

</style>

<div id="cms-primary">
    <div class="container">
        <section id="content" role="main" class="col-lg-8 faq_wrapper">
            <?php
            foreach ($faqList as $faq) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Q. <?php echo $faq['Faq']['question']; ?>	
                        </h4>
                    </div>
                    <div class="panel-collapse">
                        <div class="panel-body">
                            <?php echo $faq['Faq']['answer']; ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </section>
        <?php echo $this->element('sidebar_cms'); ?>
    </div>
</div>