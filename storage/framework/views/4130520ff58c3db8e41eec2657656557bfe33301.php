<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

    <!-- Sidebar Toggle (Topbar) d-md-none removed -->
    <button id="sidebarToggleTop" class="btn btn-link  rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->name); ?></span>
                <?php if(Auth::user()->user_image): ?>
                    <img class="img-profile rounded-circle" src="<?php echo e(Storage::disk('public')->url('user/'. Auth::user()->user_image)); ?>">
                <?php else: ?>
                    <img class="img-profile rounded-circle" src="<?php echo e(asset('backend/images/placeholder/profile-' . intval(Auth::user()->id % 10) . '.webp')); ?>">
                <?php endif; ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo e(route('user.profile.edit')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <?php echo e(__('backend.nav.profile')); ?>

                </a>
                <a class="dropdown-item" href="<?php echo e(route('page.home')); ?>">
                    <i class="fas fa-columns fa-sm fa-fw mr-2 text-gray-400"></i>
                    <?php echo e(__('backend.nav.website')); ?>

                </a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <?php echo e(__('auth.logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/backend/user/partials/nav.blade.php ENDPATH**/ ?>