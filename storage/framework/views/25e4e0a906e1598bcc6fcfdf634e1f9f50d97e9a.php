<?php if($site_global_settings->setting_site_google_analytic_enabled == \App\Setting::TRACKING_ON): ?>

    <?php if(auth()->guard()->guest()): ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($site_global_settings->setting_site_google_analytic_tracking_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo e($site_global_settings->setting_site_google_analytic_tracking_id); ?>');
        </script>

    <?php else: ?>

        <?php if(!Auth::user()->isAdmin()): ?>

            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($site_global_settings->setting_site_google_analytic_tracking_id); ?>"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '<?php echo e($site_global_settings->setting_site_google_analytic_tracking_id); ?>');
            </script>

        <?php else: ?>
            <?php if($site_global_settings->setting_site_google_analytic_not_track_admin == \App\Setting::TRACKING_ADMIN): ?>

                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($site_global_settings->setting_site_google_analytic_tracking_id); ?>"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());

                    gtag('config', '<?php echo e($site_global_settings->setting_site_google_analytic_tracking_id); ?>');
                </script>

            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/backend/user/partials/tracking.blade.php ENDPATH**/ ?>