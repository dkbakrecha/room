<?php
echo $this->Html->css(array('table/normalize','table/demo','table/icons','table/component'));
?>



    <div class="home-search-container">
                            <noscript>
                                &lt;input type="hidden" value="true" name="values_in_form"/&gt;
                            </noscript>
                            <div class="location-container" id="locationContainer">
                                <div class="pin_icon">
                                    <i class="practo-icon icon-pin"></i>
                                </div>
                                <span class="location-placeholder " style="display: block;">
                                    Bangalore
                                </span>
                                <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">1 result is available, use up and down arrow keys to navigate.</span><input type="text" autocomplete="off" placeholder="Locality" id="locationInput" class="location-hide  location-input ui-autocomplete-input" name="locality" style="display: none;">
                            </div>
                            <div id="keywordsContainer" class="keywords-container">
                                <div class="search_grey">
                                    <i class="practo-icon icon-search"></i>
                                </div>
                                                                                                                                                                                                                                                                                                                                                                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">10 results are available, use up and down arrow keys to navigate.</span><input type="text" autocomplete="off" value="" placeholder="Specialities, Doctors, Clinics, Labs, Spas and Salons, Gyms and Yoga Centers etc" class="keywords-input ui-autocomplete-input" id="keywordsInput" name="q">
                            </div>
                            <div class="search-button-wrapper">
                                <button class="search-button">
                                    <i class="search-icon">
                                    </i>
                                </button>
                            </div>
                        <div class="clear"></div>
                    </div>


<div id="icons">
                    
                        <section>
                            <div class="tabs lineslide">
                                <nav>
                                    <ul>
                                        <div class="profile-nav-tab-marker" style="left: 0px;"></div>
                                        <li class="tab-current" id="doctorTab"><a href="#doctor-tab"><i class="doctor-icon"></i><br><span class="middle">Doctors</span></a></li>
                                        
                                            <li class=""><a href="#diagnostic-tab"><i class="diagnostic-icon"></i><span>Diagnostic<br>Labs</span></a></li>
                                        
                                        
                                            <li class=""><a href="#wellness-tab"><i class="wellness-icon"></i><span>Spas &amp;<br>Salons</span></a></li>
                                        
                                        
                                            <li class=""><a href="#fitness-tab"><i class="fitness-icon"></i><br><span class="middle">Fitness</span></a></li>
                                        
                                    </ul>
                                </nav>
                                
                                <hr class="nomargin">
                                <div class="content-wrap">
                                    <section id="doctor-tab" class="content-current">
                                        <div class="tests-container">
                                                                                                                                         <a class="speciality-icons" data-speciality="dentist" href="https://www.practo.com/bangalore/dentist">
                                                   <i class="dentist-icon"></i>
                                                   <p class="test-name">Dentist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="ophthalmologist" href="https://www.practo.com/bangalore/ophthalmologist">
                                                   <i class="ophthalmologist-icon"></i>
                                                   <p class="test-name">Ophthalmologist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="dermatologist-cosmetologist" href="https://www.practo.com/bangalore/dermatologist-cosmetologist">
                                                   <i class="dermatologist-cosmetologist-icon"></i>
                                                   <p class="test-name">Dermatologist/Cosmetologist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="homeopath" href="https://www.practo.com/bangalore/homeopath">
                                                   <i class="homeopath-icon"></i>
                                                   <p class="test-name">Homeopath</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="ayurveda" href="https://www.practo.com/bangalore/ayurveda">
                                                   <i class="ayurveda-icon"></i>
                                                   <p class="test-name">Ayurveda</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="cardiologist" href="https://www.practo.com/bangalore/cardiologist">
                                                   <i class="cardiologist-icon"></i>
                                                   <p class="test-name">Cardiologist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="gastroenterologist" href="https://www.practo.com/bangalore/gastroenterologist">
                                                   <i class="gastroenterologist-icon"></i>
                                                   <p class="test-name">Gastroenterologist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="psychiatrist" href="https://www.practo.com/bangalore/psychiatrist">
                                                   <i class="psychiatrist-icon"></i>
                                                   <p class="test-name">Psychiatrist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="ear-nose-throat-ENT-specialist" href="https://www.practo.com/bangalore/ear-nose-throat-ENT-specialist">
                                                   <i class="ear-nose-throat-ENT-specialist-icon"></i>
                                                   <p class="test-name">Ear-Nose-Throat (ENT)</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="gynecologist-obstetrician" href="https://www.practo.com/bangalore/gynecologist-obstetrician">
                                                   <i class="gynecologist-obstetrician-icon"></i>
                                                   <p class="test-name">Gynecologist/Obstetrician</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="neurologist" href="https://www.practo.com/bangalore/neurologist">
                                                   <i class="neurologist-icon"></i>
                                                   <p class="test-name">Neurologist</p>
                                               </a>
                                                                                                                                         <a class="speciality-icons" data-speciality="urologist" href="https://www.practo.com/bangalore/urologist">
                                                   <i class="urologist-icon"></i>
                                                   <p class="test-name">Urologist</p>
                                               </a>
                                                                                      <div class="clear"></div>
                                        </div>
                                    </section>
                                    
                                    
                                    
                                        <section id="diagnostic-tab" class="">
                                            <div class="tests-container">
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="tests" href="https://www.practo.com/bangalore/diagnostics/tests">
                                                       <i class="tests-icon"></i>
                                                       <p class="test-name">All Labs</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="thyroid-profile" href="https://www.practo.com/bangalore/diagnostics/thyroid-profile">
                                                       <i class="thyroid-profile-icon"></i>
                                                       <p class="test-name">Thyroid Profile</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="lipid-profile" href="https://www.practo.com/bangalore/diagnostics/lipid-profile">
                                                       <i class="lipid-profile-icon"></i>
                                                       <p class="test-name">Lipid Profile</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="complete-blood-count" href="https://www.practo.com/bangalore/diagnostics/complete-blood-count">
                                                       <i class="complete-blood-count-icon"></i>
                                                       <p class="test-name">Complete Blood Count</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="x-ray" href="https://www.practo.com/bangalore/diagnostics/x-ray">
                                                       <i class="x-ray-icon"></i>
                                                       <p class="test-name">X-ray</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="hiv-1-2" href="https://www.practo.com/bangalore/diagnostics/hiv-1-2">
                                                       <i class="hiv-1-2-icon"></i>
                                                       <p class="test-name">HIV 1 &amp; 2</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="pregnancy-test" href="https://www.practo.com/bangalore/diagnostics/pregnancy-test">
                                                       <i class="pregnancy-test-icon"></i>
                                                       <p class="test-name">Pregnancy Test</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="urine-culture-and-sensitivity" href="https://www.practo.com/bangalore/diagnostics/urine-culture-and-sensitivity">
                                                       <i class="urine-culture-and-sensitivity-icon"></i>
                                                       <p class="test-name">Urine Culture and Sensitivity</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="stool-routine" href="https://www.practo.com/bangalore/diagnostics/stool-routine">
                                                       <i class="stool-routine-icon"></i>
                                                       <p class="test-name">Stool Routine</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="ct-scan" href="https://www.practo.com/bangalore/diagnostics/ct-scan">
                                                       <i class="ct-scan-icon"></i>
                                                       <p class="test-name">CT Scan</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="semen-analysis" href="https://www.practo.com/bangalore/diagnostics/semen-analysis">
                                                       <i class="semen-analysis-icon"></i>
                                                       <p class="test-name">Semen Analysis</p>
                                                   </a>
                                                                                                                                                     <a data-segment="diagnostics" class="test-icon" data-test="mri-scan" href="https://www.practo.com/bangalore/diagnostics/mri-scan">
                                                       <i class="mri-scan-icon"></i>
                                                       <p class="test-name">MRI Scan</p>
                                                   </a>
                                                                                              <div class="clear"></div>
                                            </div>
                                        </section>
                                    
                                    
                                    
                                    
                                        <section id="wellness-tab" class="">
                                            <div class="tests-container">
                                                                                                <a data-segment="wellness-centers" class="wellness-icons" data-test="spas" href="https://www.practo.com/bangalore/wellness-centers/spas">
                                                   <i class="spa-icon"></i>
                                                   <p class="test-name">Spa</p>
                                                </a>
                                                                                                                                                       <a data-segment="wellness-centers" class="wellness-icons" data-test="hair-cut-for-men" href="https://www.practo.com/bangalore/wellness-centers/hair-cut-for-men">
                                                       <i class="hair-cut-for-men-icon"></i>
                                                       <p class="test-name">Haircut for Men</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="hair-cut-for-women" href="https://www.practo.com/bangalore/wellness-centers/hair-cut-for-women">
                                                       <i class="hair-cut-for-women-icon"></i>
                                                       <p class="test-name">Haircut for Women</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="waxing" href="https://www.practo.com/bangalore/wellness-centers/waxing">
                                                       <i class="waxing-icon"></i>
                                                       <p class="test-name">Waxing</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="shaving" href="https://www.practo.com/bangalore/wellness-centers/shaving">
                                                       <i class="shaving-icon"></i>
                                                       <p class="test-name">Shaving</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="body-massage" href="https://www.practo.com/bangalore/wellness-centers/body-massage">
                                                       <i class="body-massage-icon"></i>
                                                       <p class="test-name">Body Massage</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="facial" href="https://www.practo.com/bangalore/wellness-centers/facial">
                                                       <i class="facial-icon"></i>
                                                       <p class="test-name">Facial</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="manicure" href="https://www.practo.com/bangalore/wellness-centers/manicure">
                                                       <i class="manicure-icon"></i>
                                                       <p class="test-name">Manicure</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="pedicure" href="https://www.practo.com/bangalore/wellness-centers/pedicure">
                                                       <i class="pedicure-icon"></i>
                                                       <p class="test-name">Pedicure</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="threading" href="https://www.practo.com/bangalore/wellness-centers/threading">
                                                       <i class="threading-icon"></i>
                                                       <p class="test-name">Threading</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="bleaching" href="https://www.practo.com/bangalore/wellness-centers/bleaching">
                                                       <i class="bleaching-icon"></i>
                                                       <p class="test-name">Bleaching</p>
                                                   </a>
                                                                                                                                                        <a data-segment="wellness-centers" class="wellness-icons" data-test="make-up" href="https://www.practo.com/bangalore/wellness-centers/make-up">
                                                       <i class="make-up-icon"></i>
                                                       <p class="test-name">Make-up</p>
                                                   </a>
                                                                                                  <div class="clear"></div>
                                            </div>
                                        </section>
                                    
                                    
                                    
                                
                                    <section id="fitness-tab" class="">
                                        <div class="tests-container">
                                                                                        <a data-segment="fitness-centers" class="fitness-icons" data-test="gyms" href="https://www.practo.com/bangalore/fitness-centers/gyms">
                                               <i class="gyms-icon"></i>
                                               <p class="test-name">Gyms</p>
                                           </a>
                                                                                                                                                  <span class="fitness-icons">
                                                     <i class="yoga-centres-icon"></i>
                                                     <p class="test-name disabled">Yoga Centres</p>
                                                     <p class="test-name disabled">Coming Soon</p>
                                                    </span>
                                                                                                                                                                                                         <span class="fitness-icons">
                                                     <i class="aerobics-icon"></i>
                                                     <p class="test-name disabled">Aerobics</p>
                                                     <p class="test-name disabled">Coming Soon</p>
                                                    </span>
                                                                                                                                                                                                         <span class="fitness-icons">
                                                     <i class="pilates-icon"></i>
                                                     <p class="test-name disabled">Pilates</p>
                                                     <p class="test-name disabled">Coming Soon</p>
                                                    </span>
                                                                                                                                                                                                         <span class="fitness-icons">
                                                     <i class="zumba-icon"></i>
                                                     <p class="test-name disabled">Zumba</p>
                                                     <p class="test-name disabled">Coming Soon</p>
                                                    </span>
                                                                                                                                                 <div class="clear"></div>
                                            </div>
                                        </section>
                                    
                                    
                                </div>
                            </div>
                        </section>
                    
                </div>
    
<input list="places">

<datalist id="places">
  <option value="Jodhpur">
  <option value="Jaipur">
  <option value="Delhi">
  <option value="Bangalore">
  <option value="Mumbai">
</datalist> 
 
 <section class="pricing-section bg-10">
            <div class="pricing pricing--rabten">
                <div class="pricing__item">
                    <div class="icon icon--home"></div>
                    <h3 class="pricing__title">Individuals</h3>
                    <p class="pricing__sentence">Single user license</p>
                    <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">Rs.</span>0
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per year</span>
                        </span>
                    </div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">1 GB of space</li>
                        <li class="pricing__feature">Support at $25/hour</li>
                        <li class="pricing__feature">Small social media package</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <div class="icon icon--store"></div>
                    <h3 class="pricing__title">Small Team</h3>
                    <p class="pricing__sentence">Up to 5 users</p>
                    <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">Rs.</span>1000
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per year</span>
                        </span>
                    </div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">5 GB of space</li>
                        <li class="pricing__feature">Free support</li>
                        <li class="pricing__feature">Full social media package</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <div class="icon icon--apartment"></div>
                    <h3 class="pricing__title">Organization</h3>
                    <p class="pricing__sentence">Unlimited users</p>
                    <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">Rs.</span>5000
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per year</span>
                        </span>
                    </div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited space</li>
                        <li class="pricing__feature">Free support</li>
                        <li class="pricing__feature">Full social media package</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
            </div>
        </section>


<div style="" class="section-wrap"><section class="site-content container"><div data-speed="900" data-pause="0" class="testimonials-slider element-slider visible"><ul style="height: 143px;"><li style="display: none; position: relative; z-index: 1;" class=""><div class="testimonial">
	<div class="testimonial-content">
		<h1>Handmade items always have the person’s mark on them,<br>
and when you hold them, you feel less alone.</h1>
	</div>
	<div class="testimonial-details clearfix">
				<div class="testimonial-image">
			<img width="150" height="150" alt="image-110" class="fullwidth wp-post-image" src="http://themextemplates.com/demo/makery/wp-content/uploads/2014/11/image-110-150x150.jpg">		</div>
				<div class="testimonial-author">Brian Peterson, Shop Owner</div>								
	</div>
</div></li><li style="position: relative; z-index: 1; display: none;" class=""><div class="testimonial">
	<div class="testimonial-content">
		<h1>Handmade is not just about creativity, it is about the<br>
person you’re becoming while you’re creating.</h1>
	</div>
	<div class="testimonial-details clearfix">
				<div class="testimonial-image">
			<img width="150" height="150" alt="image-112" class="fullwidth wp-post-image" src="http://themextemplates.com/demo/makery/wp-content/uploads/2014/11/image-112-150x150.jpg">		</div>
				<div class="testimonial-author">Mary Lockhart, Shop Owner</div>								
	</div>
</div></li><li style="position: relative; z-index: 1; display: list-item;" class="current"><div class="testimonial">
	<div class="testimonial-content">
		<h1>You  can’t buy hapiness, but you can buy handmade<br>
and that is kind of the same thing.</h1>
	</div>
	<div class="testimonial-details clearfix">
				<div class="testimonial-image">
			<img width="150" height="150" alt="image-113" class="fullwidth wp-post-image" src="http://themextemplates.com/demo/makery/wp-content/uploads/2014/11/image-113-150x150.jpg">		</div>
				<div class="testimonial-author">Nicholas Woods, Shop Owner</div>								
	</div>
</div></li></ul><a class="slider-arrow right" href="#"></a><a class="slider-arrow left" href="#"></a></div></section></div>


<section class="informations main-body">

	    <!-- container -->
	    <div class="container">
	        <!-- row -->
	        <div class="row">
	        	<div class="col-md-6">
	        		<div class="widget widget-top-footer widget_text"><h4>About Our Shop</h4>			<div class="textwidget"><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
</div>
		</div><div class="widget widget-top-footer widget_propershop_subscribe"><h4>Subscribe For Newsletter</h4>
				<div class="form-group">
					<input type="text" placeholder="Your email address" class="form-control"><i class="fa fa-envelope-o"></i>
				</div></div>	        	</div>
	        	<div class="col-md-6">
	        		<div class="widget widget-top-footer widget_text"><h4>Contact Us</h4>			<div class="textwidget"><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
<p><strong>Address:</strong> Ullamco Lorem #234, UK</p>
<p><strong>Phone:</strong> +388 (0) 222.333.22</p>
<p><strong>Email:</strong> loremipsum@lorem.com</p>
</div>
		</div>	        	</div>
	        </div>
	        <!-- .row -->
	    </div>
	    <!-- .container -->

	</section>