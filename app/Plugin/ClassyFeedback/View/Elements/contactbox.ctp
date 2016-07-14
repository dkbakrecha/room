<?php echo $this->Html->css('ClassyFeedback.ca_feedback_basic', null/* , array('inline' => false) */); ?>

<section id="classyNewsletter" class="ca_newsletter">
	<div class="container">
		<div class="row">
				<div class="widget " id="">

					<script type="text/javascript">
                        //&lt;![CDATA[
                        if (typeof newsletter_check !== "function") {
                        window.newsletter_check = function (f) {
                        var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                if (!re.test(f.elements["ne"].value)) {
                        alert("The email is not correct");
                                return false;
                        }
                        for (var i = 1; i & lt; 20; i++) {
                        if (f.elements["np" + i] & amp; & amp; f.elements["np" + i].required & amp; & amp; f.elements["np" + i].value == "") {
                        alert("");
                                return false;
                        }
                        }
                        if (f.elements["ny"] & amp; & amp; !f.elements["ny"].checked) {
                        alert("You must accept the privacy statement");
                                return false;
                        }
                        return true;
                        }
                        }
                        //]]&gt;
					</script>

					<div class="feedback contactbox-widget">

						<script type="text/javascript">
                            //&lt;![CDATA[
                            if (typeof newsletter_check !== "function") {
                            window.newsletter_check = function (f) {
                            var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                    if (!re.test(f.elements["ne"].value)) {
                            alert("The email is not correct");
                                    return false;
                            }
                            for (var i = 1; i & lt; 20; i++) {
                            if (f.elements["np" + i] & amp; & amp; f.elements["np" + i].required & amp; & amp; f.elements["np" + i].value == "") {
                            alert("");
                                    return false;
                            }
                            }
                            if (f.elements["ny"] & amp; & amp; !f.elements["ny"].checked) {
                            alert("You must accept the privacy statement");
                                    return false;
                            }
                            return true;
                            }
                            }
                            //]]&gt;
						</script>

						<form method="post" onsubmit="return newsletter_check(this)" action="<?php echo $this->Html->url(array('controller' => 'feedback',
	'action' => 'add', 'plugin' => 'classy_classyfeedback'), true); ?>">
							<input type="hidden" value="widget" name="nr">
							<p>
								<input type="name" onblur="if (this.value == '') this.value = this.defaultValue" onclick="if (this.defaultValue == this.value) this.value = ''" value="Name" name="ne" required="" placeholder="Name" class="newsletter-email">
							</p>
							<p>
								<input type="email" onblur="if (this.value == '') this.value = this.defaultValue" onclick="if (this.defaultValue == this.value) this.value = ''" value="Email Address" name="ne" required="" placeholder="Email Address" class="newsletter-email">
							</p>
							<p>
								<input type="message" type="textarea" onblur="if (this.value == '') this.value = this.defaultValue" onclick="if (this.defaultValue == this.value) this.value = ''" value="Message Here" name="ne" required="" placeholder="Message Here" class="newsletter-email">
							</p>
							<p>
								<input type="submit" value="Subscribe" class="newsletter-submit">
							</p>
						</form>
					</div>
									
			</div>
		</div>
	</div>
</section>
