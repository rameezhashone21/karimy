<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar container py-0 bg-white customization-header-background-color" role="banner">

    <!-- <div class="container"> -->
    <div class="row align-items-center">

        <div class="col-8 col-xl-2 pr-0">

                <?php if(empty($site_global_settings->setting_site_logo)): ?>
                <h1 class="mb-0 site-logo">
                    <a href="<?php echo e(route('page.home')); ?>" class="text-black mb-0 customization-header-font-color">
                        <?php $__currentLoopData = explode(' ', empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key/2 == 0): ?>
                                <?php echo e($word); ?>

                            <?php else: ?>
                                <span class="text-primary"><?php echo e($word); ?></span>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </a>
                </h1>
                <?php else: ?>
                <h1 class="mb-0 mt-1 site-logo">
                    <a href="<?php echo e(route('page.home')); ?>" class="text-black mb-0">
                        <img src="<?php echo e(Storage::disk('public')->url('setting/' . $site_global_settings->setting_site_logo)); ?>">
                    </a>
                </h1>
                <?php endif; ?>


        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
                
                <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block pl-4">
                    <li><a href="<?php echo e(route('page.home')); ?>" class="<?php echo e((Route::currentRouteName() === "page.home") ? 'active' : 'disable'); ?>"  ><?php echo e(__('frontend.header.home')); ?>

                    <!--<?php if(Route::currentRouteName() === 'page.home'): ?>-->
                    <!--    // code-->
                    <!--    demo-->
                    <!--<?php endif; ?>-->
                    <!--<?php echo e(Route::currentRouteName()); ?>-->
                    <!--<?php echo e((Route::currentRouteName() === "page.home") ? 'active' : 'disable'); ?>-->
                    </a></li>
                    <li><a href="<?php echo e(route('page.categories')); ?>" class="<?php echo e((Route::currentRouteName() === "page.categories") ? 'active' : 'disable'); ?>" ><?php echo e(__('frontend.header.listings')); ?></a></li>
                    <?php if($site_global_settings->setting_page_about_enable == \App\Setting::ABOUT_PAGE_ENABLED): ?>
                    <li><a href="<?php echo e(route('page.about')); ?>"  class="<?php echo e((Route::currentRouteName() === "page.about") ? 'active' : 'disable'); ?>" ><?php echo e(__('frontend.header.about')); ?></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(route('page.blog')); ?>"  class="<?php echo e((Route::currentRouteName() === "page.blog") ? 'active' : 'disable'); ?>"><?php echo e(__('frontend.header.blog')); ?></a></li>
                    
                     <li><a href="<?php echo e(route('page.contact')); ?>" class="<?php echo e((Route::currentRouteName() === "page.contact") ? 'active' : 'disable'); ?>"><?php echo e(__('frontend.header.contact')); ?></a></li>

                    <?php if(auth()->guard()->guest()): ?>
                        <li class="ml-xl-3 login"><a href="<?php echo e(route('login')); ?>" class="<?php echo e((Route::currentRouteName() === "login") ? 'active' : 'disable'); ?>" ><span class="border-left pl-xl-4"></span><?php echo e(__('frontend.header.login')); ?></a></li>
                        <?php if(Route::has('register')): ?>
                            <li><a href="<?php echo e(route('register')); ?>" class="<?php echo e((Route::currentRouteName() === "register") ? 'active' : 'disable'); ?>"><?php echo e(__('frontend.header.register')); ?></a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="has-children">
                            <a href="#"><?php echo e(Auth::user()->name); ?></a>
                            <ul class="dropdown">
                                <li>
                                    <?php if(Auth::user()->isAdmin()): ?>
                                        <a href="<?php echo e(route('admin.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                    <?php else: ?>
                                        <!--<a href="<?php echo e(route('user.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>-->
                                <?php if(Auth::user()->hasPaidSubscription()): ?>
                                       <!-- if user has paid subscription -->
                                       
                                        <a href="<?php echo e(route('user.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                        
                                <?php else: ?>
                                     <a href="<?php echo e(route('page.pricing')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                                <li><a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('auth.logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('page.pricing')); ?>" class="cta"><span class="bg-primary text-white rounded"><i class="fas fa-plus mr-1"></i> <?php echo e(__('frontend.header.list-business')); ?></span></a>
                        <?php else: ?>
                            <?php if(Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('admin.items.create')); ?>" class="cta"><span class="bg-primary text-white rounded"><i class="fas fa-plus mr-1"></i> <?php echo e(__('frontend.header.list-business')); ?></span></a>
                            <?php else: ?>
                                <?php if(Auth::user()->hasPaidSubscription()): ?>
                                    <a href="<?php echo e(route('user.items.create')); ?>" class="cta"><span class="bg-primary text-white rounded"><i class="fas fa-plus mr-1"></i> <?php echo e(__('frontend.header.list-business')); ?></span></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('page.pricing')); ?>" class="cta"><span class="bg-primary text-white rounded"><i class="fas fa-plus mr-1"></i> <?php echo e(__('frontend.header.list-business')); ?></span></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="d-inline-block d-xl-none ml-auto py-3 col-4 text-right" id="menu-mobile-div">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
        </div>

    </div>
    <!-- </div> -->

</header>
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/frontend/partials/nav.blade.php ENDPATH**/ ?>