<?php $__env->startSection('styles'); ?>
    <!-- Start Google reCAPTCHA version 2 -->
    <?php if($site_global_settings->setting_site_recaptcha_sign_up_enable == \App\Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE): ?>
        <?php echo htmlScriptTagJsApi(['lang' => empty($site_global_settings->setting_site_language) ? 'en' : $site_global_settings->setting_site_language]); ?>

    <?php endif; ?>
    <!-- End Google reCAPTCHA version 2 -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
        <!--<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-inner.webp')); ?>);" data-stellar-background-ratio="0.5">-->
        
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/backgrounds/Signup.jpg')); ?>);" data-stellar-background-ratio="0.5">
            

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
                        <div class="col-md-10 text-center">
                            <h1 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('auth.register')); ?></h1>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <?php echo $__env->make('frontend.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row justify-content-center">
                <div class="col-md-7 mb-5">

                    <form method="POST" action="<?php echo e(route('register')); ?>" class="p-5 bg-white">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="name" class="text-black"><?php echo e(__('auth.name')); ?></label>
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email"><?php echo e(__('auth.email-addr')); ?></label>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject"><?php echo e(__('auth.password')); ?></label>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="password-confirm"><?php echo e(__('auth.confirm-password')); ?></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Start Google reCAPTCHA version 2 -->
                        <?php if($site_global_settings->setting_site_recaptcha_sign_up_enable == \App\Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <?php echo htmlFormSnippet(); ?>

                                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- End Google reCAPTCHA version 2 -->

                        <div class="row form-group">
                            <div class="col-12">
                                <p><?php echo e(__('auth.have-an-account')); ?>? <a href="<?php echo e(route('login')); ?>"><?php echo e(__('auth.login')); ?></a></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary py-2 px-4 text-white rounded">
                                    <?php echo e(__('auth.register')); ?>

                                </button>
                            </div>
                        </div>

                        <?php if($social_login_facebook || $social_login_google || $social_login_twitter || $social_login_linkedin || $social_login_github): ?>
                            <div class="row mt-4 align-items-center">
                                <div class="col-md-5">
                                    <hr>
                                </div>
                                <div class="col-md-2 pl-0 pr-0 text-center">
                                    <span><?php echo e(__('social_login.frontend.or')); ?></span>
                                </div>
                                <div class="col-md-5">
                                    <hr>
                                </div>
                            </div>
                            <div class="row align-items-center mb-4 mt-2">
                                <div class="col-md-12 text-center">
                                    <span><?php echo e(__('social_login.frontend.sign-in-with')); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_facebook): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <a class="btn btn-facebook btn-block text-white rounded" href="<?php echo e(route('auth.login.facebook')); ?>">
                                        <i class="fab fa-facebook-f pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-facebook')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_google): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <a class="btn btn-google btn-block text-white rounded" href="<?php echo e(route('auth.login.google')); ?>">
                                        <i class="fab fa-google pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-google')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_twitter): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <a class="btn btn-twitter btn-block text-white rounded" href="<?php echo e(route('auth.login.twitter')); ?>">
                                        <i class="fab fa-twitter pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-twitter')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_linkedin): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <a class="btn btn-linkedin btn-block text-white rounded" href="<?php echo e(route('auth.login.linkedin')); ?>">
                                        <i class="fab fa-linkedin-in pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-linkedin')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($social_login_github): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <a class="btn btn-github btn-block text-white rounded" href="<?php echo e(route('auth.login.github')); ?>">
                                        <i class="fab fa-github pr-2"></i>
                                        <?php echo e(__('social_login.frontend.sign-in-github')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>


                    </form>
                </div>

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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/frontend/auth/register.blade.php ENDPATH**/ ?>