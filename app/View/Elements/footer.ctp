<div id="footer-bottom">
    <div class="container">
        <footer >
            <div class="row">
                <div class="col-lg-8">

                    <div class="links">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>" class="link">About</a>
                        <!--<a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'services')); ?>" class="link">Services</a>-->
                        <a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index')); ?>" class="link">FAQ'S</a>
                        <!--<a href="<?php echo $this->Html->url(array('controller' => 'blogs', 'action' => 'index')); ?>" class="link">Blog</a>-->
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>" class="link">Contact Us</a>
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'terms')); ?>" class="link">Privacy &amp; Terms</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="social pull-right">
                        <a target="_blank" href="https://www.facebook.com/pages/Room247/1456229788028092" class="link">
                            <?php echo $this->Html->image('fb.png') ?>
                        </a>
                        <!--                <a target="_blank" href="" class="link">
                        <?php //echo $this->Html->image('tw.png') ?>
                                        </a>
                                        <a target="_blank" href="" class="link">
                        <?php //echo $this->Html->image('yt.png') ?>
                                        </a>-->

                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        Copyright &copy; <?php echo date("Y"); ?>. <a href="http://classyarea.in/" target="_blank">ClassyAREA.in</a>
                    </div>
                    <?php
                        if ($_SERVER['SERVER_NAME'] != 'localhost') {
                            ?>
                            <!--Start of StatCounter Code for Default Guide--> 
                            <script type="text/javascript">
                                var sc_project = 10576243;
                                var sc_invisible = 0;
                                var sc_security = "aeca2083";
                                var scJsHost = (("https:" == document.location.protocol) ?
                                        "https://secure." : "http://www.");
                                document.write("<sc" + "ript type='text/javascript' src='" + scJsHost +
                                        "statcounter.com/counter/counter.js'></" + "script>");
                            </script>
                            <noscript><div class="statcounter pull-right"><a title="click tracking"
                                                                  href="http://statcounter.com/" target="_blank"><img class="statcounter"
                                                                                    src="http://c.statcounter.com/10576243/0/aeca2083/0/" alt="click
                                                                                    tracking"></a></div></noscript>
                            <!-- End of StatCounter Code for Default Guide -->

                            <?php
                        }
                        ?>
                </div>
            </div>
        </footer>


    </div>
</div>

<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    echo $this->element('sql_dump');
}
?>