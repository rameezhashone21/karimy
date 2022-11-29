<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-inner.webp')); ?>);" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-color: <?php echo e($site_innerpage_header_background_color); ?>;" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image)); ?>);" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-color: #333333;" data-stellar-background-ratio="0.5">
    <?php endif; ?>

        <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            <div data-youtube="<?php echo e($site_innerpage_header_background_youtube_video); ?>"></div>
        <?php endif; ?>

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('theme_directory_hub.pricing.head-title')); ?></h1>
                            <p class="mb-0" style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e(__('theme_directory_hub.pricing.head-description')); ?></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <?php if(!empty($login_user)): ?>
            <div class="row justify-content-center">
                <div class="col-10 col-md-12">
                    <div class="alert alert-info" role="alert">
                        <?php if($login_user->isAdmin()): ?>
                           <?php echo e(__('theme_directory_hub.pricing.info-admin')); ?>

                        <?php else: ?>
                            <?php if($login_user->hasPaidSubscription()): ?>
                                <?php echo e(__('theme_directory_hub.pricing.info-user-paid', ['site_name' => $site_name])); ?>

                            <?php else: ?>
                                <?php echo e(__('theme_directory_hub.pricing.info-user-free', ['site_name' => $site_name])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="row justify-content-center">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plans_key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-10 col-md-6 col-lg-4">
                        <div class="card mb-4 box-shadow text-center">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">
                                    <?php if(!empty($login_user)): ?>
                                        <?php if($login_user->isUser()): ?>

                                            <?php if($login_user->hasPaidSubscription()): ?>
                                                <?php if($login_user->subscription->plan->id == $plan->id): ?>
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle"></i>
                                                    </span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle"></i>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php echo e($plan->plan_name); ?>

                                </h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title"><?php echo e($site_global_settings->setting_product_currency_symbol . $plan->plan_price); ?>

                                    <small class="text-muted">/
                                        <?php if($plan->plan_period == \App\Plan::PLAN_LIFETIME): ?>
                                            <?php echo e(__('backend.plan.lifetime')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY): ?>
                                            <?php echo e(__('backend.plan.monthly')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY): ?>
                                            <?php echo e(__('backend.plan.quarterly')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('backend.plan.yearly')); ?>

                                        <?php endif; ?>
                                    </small>
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <?php if(is_null($plan->plan_max_free_listing)): ?>
                                        <li>
                                            <?php echo e(__('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.free-listing')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <?php echo e($plan->plan_max_free_listing . ' ' . __('theme_directory_hub.plan.free-listing')); ?>

                                         <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                        <br/>
                                        <span class="text-muted"> (This will allow you to list one of your business/companies on the platform)</span>
                                         <?php endif; ?>
                                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                                        <br/>
                                        <span class="text-muted"> (This will allow you to list one of your business/companies on the platform)</span>
                                       
                                       <?php endif; ?>
                                        </li>
                                          
                                    <?php endif; ?>

                                    <?php if(is_null($plan->plan_max_featured_listing)): ?>
                                        <li>
                                            <?php echo e(__('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.featured-listing')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <?php echo e($plan->plan_max_featured_listing . ' ' . __('theme_directory_hub.plan.featured-listing')); ?>

                                         <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                        <br/>
                                        <span class="text-muted"> (This will allow your business listing to be featured on our platform)</span>
                                         <?php endif; ?>
                                         
                                         <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                                        <br/>
                                        <span class="text-muted"> (This will allow your business listing to be featured on our platform)</span>
                                       <?php endif; ?>
                                       
                                        </li>
                                         
                                    <?php endif; ?>

                                    <?php if(!empty($plan->plan_features)): ?>
                                        <?php
                                            $data = $plan->plan_features;
                                            $sep_tag= explode(',', $data);
                                        ?>
                                            
                                            <?php $__currentLoopData = $sep_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                             <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                                        <br/>
                                         <?php if(trim($tag) == "1 Business listing"): ?>
                                          <li ><?php echo e($tag); ?> <br/> <span class="text-muted">(This allows you to list one of the Businesses on the platform)</span></li>
                                         <?php endif; ?>
                                         
                                         <?php if(trim($tag) == "Unlimited Business"): ?>
                                          <li ><?php echo e($tag); ?> <br/> <span class="text-muted">(This allows you to gain as much business as you can from the platform)</span></li>
                                          
                                         <?php endif; ?>
                                         
                                      
                                         <!--<?php if(trim($tag) == "Listing Features"): ?>-->
                                         <!-- <li ><?php echo e($tag); ?> <br/> <span>(This will allow accessing the features for listing)</span></li>-->
                                         <!--<?php endif; ?>-->
                                        
                                       
                                        <?php else: ?>
                                         <li ><?php echo e($tag); ?></li>
                                       <?php endif; ?>
                                       
                                            
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                          <li >Listing Features <br/> <span class="text-muted" >(This will allow accessing the features for listing)</span></li>               
                                        <!--<li>-->
                                        <!--    <?php echo e($plan->plan_features); ?>-->
                                            

                                        <!--</li>-->
                                    <?php endif; ?>
                                </ul>

                                    <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                        <?php if(empty($login_user)): ?>
                                            <!--<a class="btn btn-block btn-primary text-white rounded" href="<?php echo e(route('user.items.create')); ?>">-->
                                            <!--    <i class="fas fa-plus mr-1"></i>-->
                                                <!--<?php echo e(__('frontend.header.list-business')); ?>-->
                                                 
                                            <!--</a>-->
                                            <label> <?php echo e(__('frontend.header.free')); ?></label>
                                        <?php else: ?>
                                            <?php if($login_user->isAdmin()): ?>
                                                <a class="btn btn-block btn-primary text-white rounded" href="<?php echo e(route('admin.plans.index')); ?>">
                                                    <i class="fas fa-tasks"></i>
                                                    <?php echo e(__('theme_directory_hub.pricing.manage-pricing')); ?>

                                                </a>
                                            <?php else: ?>
                                                <?php if(!$login_user->hasPaidSubscription()): ?>
                                                <!-- hide as per request -->
                                                    <!--<a class="btn btn-block btn-primary text-white rounded" href="<?php echo e(route('user.items.create')); ?>">-->
                                                        <!--<i class="fas fa-plus mr-1"></i>-->
                                                        <!--<?php echo e(__('frontend.header.list-business')); ?>-->
                                                    <!--     <?php echo e(__('frontend.header.free')); ?>-->
                                                    <!--</a>-->
                                                    <?php echo e(__('frontend.header.free')); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else: ?>

                                        <?php if(empty($login_user)): ?>
                                            <a class="btn btn-block btn-primary text-white rounded" href="<?php echo e(route('user.subscriptions.index')); ?>">
                                                <i class="fas fa-plus mr-1"></i>
                                                <?php echo e(__('theme_directory_hub.pricing.get-started')); ?>

                                            </a>
                                        <?php else: ?>
                                            <?php if($login_user->isAdmin()): ?>
                                                <a class="btn btn-block btn-primary text-white rounded" href="<?php echo e(route('admin.plans.index')); ?>">
                                                    <i class="fas fa-tasks"></i>
                                                    <?php echo e(__('theme_directory_hub.pricing.manage-pricing')); ?>

                                                </a>
                                            <?php else: ?>

                                                <?php if($login_user->hasPaidSubscription()): ?>

                                                    <?php if($login_user->subscription->plan->id == $plan->id): ?>
                                                        <a class="btn btn-block btn-primary text-white rounded" href="<?php echo e(route('user.items.create')); ?>">
                                                            <i class="fas fa-plus mr-1"></i>
                                                            <?php echo e(__('frontend.header.list-business')); ?>

                                                        </a>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <a class="btn btn-block btn-primary rounded text-white" href="<?php echo e(route('user.subscriptions.edit', ['subscription' => $login_user->subscription->id])); ?>">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <?php echo e(__('theme_directory_hub.pricing.upgrade')); ?>

                                                    </a>
                                                <?php endif; ?>

                                            <?php endif; ?>
                                        <?php endif; ?>

                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <!-- Youtube Background for Header -->
            <script src="<?php echo e(asset('frontend/vendor/jquery-youtube-background/jquery.youtube-background.js')); ?>"></script>
    <?php endif; ?>
    <script>

        $(document).ready(function(){

            "use strict";

            <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            <?php endif; ?>

        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/frontend/pricing.blade.php ENDPATH**/ ?>