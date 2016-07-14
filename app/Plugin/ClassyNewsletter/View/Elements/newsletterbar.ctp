<?php echo $this->Html->css('ClassyNewsletter.ca_newsletter_basic', null/* , array('inline' => false) */); ?>

<section id="classyNewsletter" class="ca_newsletter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 tb_before_footer_1">
                <div class="widget widget_cayto_newsletterwidget" id="cayto_newsletterwidget-2">

                    <div class="newsletter newsletter-widget">

                        <script type="text/javascript">
                            //&lt;![CDATA[
                            if (typeof newsletter_check !== "function") {
                                window.newsletter_check = function (f) {
                                    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                    if (!re.test(f.elements["ne"].value)) {
                                        alert("The email is not correct");
                                        return false;
                                    }
                                    return true;
                                }
                            }
                            //]]&gt;
                        </script>

                        <form method="post" onsubmit="return newsletter_check(this)" action="<?php echo $this->Html->url(array('controller' => 'classy_newsletter', 'action' => 'add', 'plugin' => 'classy_newsletter'), true); ?>">
                            <input type="hidden" value="widget" name="nr">
                            <p>
                                <input type="email" onblur="if (this.value == '')
                                            this.value = this.defaultValue" onclick="if (this.defaultValue == this.value)
                                                        this.value = ''" value="Enter your email address" name="ne" required="" placeholder="Enter Your Email For Stay The Know" class="newsletter-email">
                            </p>
                            <p>
                                <input type="submit" value="Subscribe" class="newsletter-submit">
                            </p>
                        </form>
                    </div>
                </div>						
            </div>
            <div class="col-xs-12 col-sm-6 tb_before_footer_2 text-right">
            </div>
        </div>
    </div>
</section>