<style>

.bg-footer {
    background-color: #11161f;
}

.footer-nav li a {
    color: white;
}

.footer-nav li a:hover {
    color: #d40909;
}

.ph-white::placeholder {
    color: white;
}

.w-256 {
    width: 256px
}

.gap-2 {
    gap: 2rem
}

.theme_box_1 {
    cursor: pointer;
    padding: 40px;
    height: 100%;
}

.theme_box_1 img.two {
    display: none;
}
.theme_box_1.bg-white:hover img.two{
    display: inline;
}
.theme_box_1.bg-white:hover img.one{
    display: none;
}
.theme_box_1,
.theme_box_1 * {
    transition: 0.4s;
}

.theme_box_1.bg-white:hover {
    background-color: #ce1d23!important;
    border-radius: 4px;
}

.theme_box_1.bg-white:hover * {
    color: #fff;
}

.theme_box_1 h3 {
    font-size: 22px;
    color: #828892;
    line-height: 30px;
    margin-bottom: 30px;
}

.theme_box_1 p { 
    font-size: 14px;
    line-height: 30px;
    color: #828892;
}

.cta-section .container {
    background: #d51e25;
    filter: drop-shadow(0px 40px 80px rgba(35, 25, 60, 0.08));
    border-radius: 30px;
    padding-top: 50px;
    padding-bottom: 50px;
}

.cta-section h2 {
    font-size: 44px;
    line-height: 59px;
}

.cta-section p { 
    font-size: 20px;
    line-height: 24px;
}

.btn_about {
    background-color: #fff;
    font-size: 14px;
    letter-spacing: 0.08em;
    color: #d51e25;
    padding: 16px 40px;
    border-radius: 10px;
}

.cta-banner-txt-svg {
    bottom: 0;
    left: 0;
}

.fs-14 {
    font-size: 14px;
}

.bg-how-it-works {
    width: 100%; 
    height: 548.23px;
    background: #161c26;
}

.how-it-works .container {
    /*padding-top: 120px;*/
    padding-top: 60px;
}

.py-100 {
    padding: 100px 0;
}

.cta-section {
    margin-bottom: -160px;
}

.footer-padding-top {
    padding-top: 220px;
}

.heading-small { 
    font-size: 14px;
    letter-spacing: 0.2em; 
}

.text-red {
    color: #d51e25;
    
}

.about-desc { 
    font-size: 18px;
    line-height: 26px; 
    color: #959ca7;

}

.about-right-img {
    top: 0;
    right: 0;
    width: 945px;
    height: 748px;
}


.about-text {
    padding: 70px 20px;
}

.section-luck {
    background-image: url( <?php echo e(asset('frontend/images/bg-luck.png')); ?>);
    box-shadow:inset 0 0 0 2000px #d51e25c2;
    padding: 100px 0 140px;
}

.bg-style {
    background-repeat: no-repeat;
    background-size: cover;
}

.fs-42 {
    font-size: 42px;
}

.luck-desc {
    font-size: 44px;
    line-height: 62px;  
}

.counter-content h4 { 
    /*font-size: 60px; */
     font-size: 54px; 

}

.counter-content p {
    color: #828892;
    font-size: 16px;
    margin-bottom: 0;
}

.counter-box div.counter-content:not(:last-child) {
    border-right: 1px solid #DEE2E8;
}

.counter-content {
    padding: 30px 80px 30px 30px;
}

.counter-box {
    position: absolute;
    width: 80%;
    z-index: 1;
    bottom: -66px;
    left: 0;
}

.site-blocks-cover.overlay.about-overlay:before {
    background: rgb(213,30,38);
    background: linear-gradient(0deg, rgba(213,30,38,1) 0%, rgba(247,212,212,1) 80%, rgba(252,252,252,1) 100%);
    opacity: 0.7;
}

.site-blocks-cover h1.about-banner-title { 
    font-size: 80px;
    line-height: 100px; 
    color: #fff;
    font-weight: bold;
}

@media (max-width: 1440px) {
    .about-right-img { 
        width: 700px;
        height: 700px;
    }
    .about-text {
        padding: 45px 20px;
    }
}
@media (max-width: 1280px) {
    .about-right-img {
        width: 640px; 
    }
}
@media (max-width: 1199.98px) {
    .about-right-img {
        width: 500px;
        height: 100%;
    }
    
    .counter-box { 
        width: 100%; 
    }
}

@media (max-width: 991.98px) {
    .about-right-img {
        display: none;
    }
    .counter-content {
        padding: 30px;
    }
    .counter-content h4 {
        font-size: 40px;
    }
}

@media (max-width: 767.98px) { 
    .counter-box {
        flex-direction: column;
        position: static;
        margin-top: 40px;
    }
    .cta-section h2 {
        font-size: 22px;
        line-height: 38px;
    }
    .cta-section h2 svg {
        display: none;
    }
    .luck-desc {
        font-size: 28px;
        line-height: 62px;
    }
    .luck-desc {
        font-size: 18px;
        line-height: 34px;
    }
    .counter-box div.counter-content:not(:last-child) {
        border-right: 0;
        border-bottom: 1px solid #DEE2E8;
    }
    .counter-content {
        padding: 16px;
    }
    .section-luck {
        padding: 40px 0 0;
    }
    .pb_sm_0 {
        padding-bottom: 0;
    }
}


</style>
<section class="how-it-works position-relative">
    <div class="bg-how-it-works position-absolute"></div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3 class="text-uppercase text-white fs-14" style="letter-spacing: 0.2em;margin-top: 14px;"><?php echo e(__('frontend.footer.how_operate_text')); ?></h3>
          <h2 class="text-white display-4 mb-4"><?php echo e(__('frontend.footer.how_operate_text_heading')); ?></h2>
          <p class="text-white mb-5"><?php echo e(__('frontend.footer.how_operate_text_take_a_look')); ?>

          </p>
          <div class="video">
            <video width="400" controls class="w-100">
              <source src="<?php echo e(asset('frontend/videos/Karimy.m4v')); ?>" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
              Your browser does not support HTML video.
            </video>
          </div>  
        </div>
      </div>
    </div>
</section>
<section class="py-100 pb_sm_0">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <a href="<?php echo e(route('page.categories')); ?>">
            <div class="theme_box_1 bg-white shadow text-center">
            <img class="img-fluid mb-4 one" src="<?php echo e(asset('frontend/images/click-red.png')); ?>"/>
            <img class="img-fluid mb-4 two" src="<?php echo e(asset('frontend/images/click-white.png')); ?>"/>
          <h3>Visit Our Website</h3>
          <p>Pay our website a visit to get started.</p>
        </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <a href="<?php echo e(route('page.categories')); ?>">
        <div class="theme_box_1 bg-white shadow text-center">
            <img class="img-fluid mb-4 one" src="<?php echo e(asset('frontend/images/search-red.png')); ?>"/>
            <img class="img-fluid mb-4 two" src="<?php echo e(asset('frontend/images/search-white.png')); ?>"/>
          <h3>Enter Your Information</h3>
          <p>Enter the city and province where you live.</p>
        </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <a href="<?php echo e(route('page.categories')); ?>">
        <div class="theme_box_1 bg-white shadow text-center">
         <img class="img-fluid mb-4 one" src="<?php echo e(asset('frontend/images/customer-service-red.png')); ?>"/>
         <img class="img-fluid mb-4 two" src="<?php echo e(asset('frontend/images/customer-service-white.png')); ?>"/>
          <h3>Choose Your Desired Company</h3>
          <p>Select the company you wish to hire.</p>
        </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <a href="<?php echo e(route('page.categories')); ?>">
        <div class="theme_box_1 bg-white shadow text-center">
        <img class="img-fluid mb-4 one" src="<?php echo e(asset('frontend/images/other-red.png')); ?>"/>
        <img class="img-fluid mb-4 two" src="<?php echo e(asset('frontend/images/other-white.png')); ?>"/>
          <h3>Enjoy The Services</h3>
          <p>Close the deal based on reviews given by customers.</p>
        </div>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="cta-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10 text-center">
        <h2 class="text-white">
            Stop jumping from one website to another.
<!--           <span class="position-relative"> Let’s Explore <svg class="position-absolute cta-banner-txt-svg" xmlns="http://www.w3.org/2000/svg" width="185" height="6" viewBox="0 0 185 6">-->
<!--  <path id="Path_21715" data-name="Path 21715" d="M66.549-241.162c1.558.19,3.007.442,4.5.53,1.634.1,3.134.406,4.743.514.361.025.753.05.808.235.071.235-.39.326-.761.373a38.387,38.387,0,0,1-6.65.357,95.284,95.284,0,0,1-12.44-1.446c-1.992-.355-2.8-1.1-2.277-2.005.248-.431,1.052-.6,1.778-.749a19.892,19.892,0,0,1,4.81-.353c1.886.066,3.794-.1,5.684-.165,4.14-.147,8.276-.328,12.426-.3,6.635.045,13.263-.364,19.858-.251,6.18.106,12.311-.189,18.471-.094,4.943.076,9.9.089,14.841-.007,2.354-.046,4.728-.215,7.065-.111,7.092.317,14.183-.253,21.241,0,6.7.238,13.378-.257,20.044,0,5.765.224,17.275.1,17.275.1s14.417-.625,21.657-.587a105.828,105.828,0,0,1,14.108.947,35.37,35.37,0,0,1,4.872,1.113c1.15.324.777.576-.151.78a50.736,50.736,0,0,1-5.266.714c-4.525.5-9.048.127-13.578.068-4.446-.058-8.908.054-13.34-.08-5.065-.152-10.134-.23-15.186-.12-4.3.093-8.568-.087-12.85-.029-4.475.061-8.95.148-13.426.175-4.314.026-8.631-.04-12.944-.006-2.532.02-5.062.261-7.6.142-6.909-.326-13.81.208-20.716.013-6.5-.184-13.02.188-19.5-.014-7.162-.224-14.308.225-21.426-.02-4.806-.166-9.548.112-14.32.065A4.076,4.076,0,0,0,66.549-241.162Z" transform="translate(-54.317 245.124)" fill="#fff"/>-->
<!--</svg>-->
<!-- <span>-->
        </h2> 
        <p class="text-white my-4">
         Book your service from a single place, and Whoosh! It’s done. 
        </p>
        
        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('page.pricing')); ?>" class="d-inline-block btn_about"> <?php echo e(__('frontend.header.lets_explore')); ?></a>
                        <?php else: ?>
                            <?php if(Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('admin.items.create')); ?>" class="d-inline-block btn_about"><?php echo e(__('frontend.header.lets_explore')); ?></a>
                            <?php else: ?>
                                <?php if(Auth::user()->hasPaidSubscription()): ?>
                                    <a href="<?php echo e(route('user.items.create')); ?>" class="d-inline-block btn_about"><?php echo e(__('frontend.header.lets_explore')); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('page.pricing')); ?>" class="d-inline-block btn_about"> <?php echo e(__('frontend.header.lets_explore')); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        
        <!--<a href="" class="d-inline-block btn_about">-->
        <!--  Get Started!-->
        <!--</a>-->
      </div>
    </div>
  </div>
</section>
<footer class="text-center text-xl-left text-white bg-footer pb-3 footer-padding-top">
    <div class="container">
  <div class="row pb-5 border-bottom border-secondary">
    <div class="col-12 col-xl-4">
      <img
        class="mb-3 w-xl-100"
        alt="logo"
        width="200"
        height="100"
        src="<?php echo e(asset('frontend/images/Karimy_white.png')); ?>"
      />
      <p class="mb-4">
        <?php echo e(__('frontend.footer.about')); ?>

        <?php echo clean(nl2br($site_global_settings->setting_site_about), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

      </p>
      <!--<p style="display:none;" class="mb-1"><strong><?php echo e($site_global_settings->setting_site_email); ?></strong></p>-->
      <!--<p style="display:none;" class="mb-5 mb-xl-0"><strong><?php echo e($site_global_settings->setting_site_phone); ?></strong></p>-->
      <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                        <?php echo e($site_prefer_country_name); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_country">
                        <?php $__currentLoopData = $site_available_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_available_countries_key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($country->country_status == \App\Country::COUNTRY_STATUS_ENABLE): ?>
                            <a class="dropdown-item" href="<?php echo e(route('page.country.update', ['user_prefer_country_id' => $country->id])); ?>">
                                <?php echo e($country->country_name); ?>

                            </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
      
      <div class="btn-group dropup">
                    <button class="btn btn-sm rounded dropdown-toggle btn-footer-dropdown" type="button" id="table_option_dropdown_locale" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language"></i>
                        <?php echo e(__('prefer_languages.' . app()->getLocale())); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="table_option_dropdown_locale">
                        <?php $__currentLoopData = \App\Setting::LANGUAGES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting_languages_key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\Illuminate\Support\Facades\Schema::hasTable('settings_languages')): ?>
                                <?php if($site_global_settings->settingLanguage->$language == \App\SettingLanguage::LANGUAGE_ENABLE): ?>
                                <a class="dropdown-item" href="<?php echo e(route('page.locale.update', ['user_prefer_language' => $setting_languages_key])); ?>">
                                    <?php echo e(__('prefer_languages.' . $setting_languages_key)); ?>

                                </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
    </div>
         
    <div class="col-12 col-sm-6 col-xl-2"> 
        <h5 class="mb-4"><strong>Main Links</strong></h5>
        <ul class="list-unstyled footer-nav">
            <li>
                <a href="<?php echo e(route('page.home')); ?>">Home</a>
            </li>
             <li><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.header.categories')); ?></a></li>
            <li>
                <a href="<?php echo e(route('page.about')); ?>"><?php echo e(__('frontend.footer.about-us')); ?></a>
            </li>
             <?php if($site_global_settings->setting_page_terms_and_condition_enable == \App\Setting::CONDITION_PAGE_ENABLED): ?>
            <li><a href="<?php echo e(route('page.terms-and-condition')); ?>"><?php echo e(__('frontend.footer.terms-and-condition')); ?></a></li>
            <?php endif; ?>
            <!--<?php if($site_global_settings->setting_page_terms_of_service_enable == \App\Setting::TERM_PAGE_ENABLED): ?>-->
            <!--<li><a href="<?php echo e(route('page.terms-of-service')); ?>"><?php echo e(__('frontend.footer.terms-of-service')); ?></a></li>-->
            <!--<?php endif; ?>-->
            
            <?php if($site_global_settings->setting_page_privacy_policy_enable == \App\Setting::PRIVACY_PAGE_ENABLED): ?>
            <li><a href="<?php echo e(route('page.privacy-policy')); ?>"><?php echo e(__('frontend.footer.privacy-policy')); ?></a></li>
            <?php endif; ?>
            
            <li>
                <a href="<?php echo e(route('page.contact')); ?>"><?php echo e(__('frontend.footer.contact-us')); ?></a>
            </li>
        </ul>
    </div>
    <div class="col-12 col-sm-6 col-xl-2 pr-0">
        <h5 class="mb-4"><strong>Categories</strong></h5>
        <ul class="list-unstyled footer-nav">
            <!--<li>-->
            <!--    <a href="#">Driving School</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#">Plumbing</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#">Carpenters</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#">Electricians</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#">SPAs</a>-->
            <!--</li>-->
            
            <ul class="list-unstyled footer-nav">
            <li><a href="https://karimy.hostingladz.com/category/local-services">
                <span>Local Services</span></a></li>
            <li><a href="https://karimy.hostingladz.com/category/real-estate">
            <span>Real Estate</span></a></li>
            <li><a href="https://karimy.hostingladz.com/category/restaurants"><span>Restaurants</span></a></li>
            <li><a href="https://karimy.hostingladz.com/category/shopping"><span>Shopping</span></a></li>
            <li><a href="https://karimy.hostingladz.com/category/health-medical"><span>Health &amp; Medical</span></a></li>
            </ul>
        </ul>
    </div>

        
    <div class="col-12 col-xl-4 px-0 mt-5 mt-xl-0">
        <h5 class="mb-4"><strong>Our Email</strong></h5>
        <p class="mb-4">  <?php echo e($site_global_settings->setting_site_address); ?><br></p>
        <ul class="mb-4 list-unstyled d-flex justify-content-center justify-content-xl-start gap-2 footer-nav">
            
            <?php $__currentLoopData = \App\SocialMedia::orderBy('social_media_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social_media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li>
        <a href="<?php echo e($social_media->social_media_link); ?>" class="pl-0 pr-3"><i class="<?php echo e($social_media->social_media_icon); ?>" ></i></a></li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
            <!--<li>-->
            <!--    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#"><i class="fa-brands fa-twitter"></i></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>-->
            <!--</li>-->
        </ul>
        <p class="mb-2"><strong><?php echo e(__('frontend.footer.shelter_text')); ?></strong></p>
         <p class="already_message" style="color:red;"></p>
        <p class="subscribe_message" style="color:green;"></p>
        <p id="emailError" style="color:red;"></p>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <input type="email" name="subscribe_email" placeholder="Email address" class="ph-white border text-white px-3 py-2 bg-transparent rounded w-256 mr-1" />
        <button id="subscribe_button" class="btn-primary text-white px-3 py-2 border-0 rounded mt-1 mt-sm-0">SUBSCRIBE</button>
    </div>
  </div>
  <div class="text-center mt-3">
   <?php echo e(__('frontend.footer.copyright')); ?> &copy; <?php echo e(empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); ?> <?php echo e(date('Y')); ?> <?php echo e(__('frontend.footer.rights-reserved')); ?>

  </div>
</div>
</footer><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>