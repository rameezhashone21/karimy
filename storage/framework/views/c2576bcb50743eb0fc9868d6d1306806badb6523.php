<form action="<?php echo e(route('page.search')); ?>">
    <div class="row align-items-center">
        <div class="col-lg-12 mb-4 mb-xl-0 col-xl-10 pr-xl-0">

            <div class="input-group">
                <div class="input-group-prepend" id="search-box-query-icon-div">
                    <div class="input-group-text" id="search-box-query-icon"><i class="fas fa-search"></i></div>
                </div>
                <input id="search_query" name="search_query" type="text" class="form-control rounded <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('search_query') ? old('search_query') : (isset($last_search_query) ? $last_search_query : '')); ?>" placeholder="<?php echo e(__('categories.search-query-placeholder')); ?>">
                <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-tooltip">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div class="col-lg-12 col-xl-2 ml-auto">
            <input type="submit" class="btn btn-primary btn-block rounded text-white" value="<?php echo e(__('frontend.search.search')); ?>">
        </div>

    </div>
</form>
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/frontend/partials/search/head.blade.php ENDPATH**/ ?>