<?php $__env->startComponent('mail::layout'); ?>
    
     <?php $__env->slot('header'); ?>
        <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
            <!-- header here -->
       <img
        class="mb-3 w-xl-100 m20w"
        alt="logo"
        width="100"
        height="100"
        src="<?php echo e(asset('frontend/images/Karimy_white.png')); ?>"
      />
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>



<?php if(! empty($greeting)): ?>
# <?php echo e($greeting . (empty($toName) ? "" : " " . $toName . ",")); ?>

<?php else: ?>
<?php if($level == 'error'): ?>
# <?php echo app('translator')->get('Whoops'); ?> <?php echo e(empty($toName) ? "" : " " . $toName . ","); ?>

<?php else: ?>
# <?php echo app('translator')->get('Hello'); ?> <?php echo e(empty($toName) ? "" : " " . $toName . ","); ?>

<?php endif; ?>
<?php endif; ?>


<?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(isset($actionText)): ?>
<?php
switch ($level) {
case 'success':
    $color = 'green';
    break;
case 'error':
    $color = 'red';
    break;
default:
    $color = 'karimy';
}
?>
<?php $__env->startComponent('mail::button', ['url' => $actionUrl, 'color' => $color]); ?>
<?php echo e($actionText); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


<?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(! empty($salutation)): ?>
<?php echo e($salutation); ?>

<?php else: ?>
<?php echo app('translator')->get('Regards'); ?>,<br><?php echo e(config('app.name')); ?>

<?php endif; ?>


<?php if(isset($actionText)): ?>
<?php $__env->startComponent('mail::subcopy'); ?>
<?php echo app('translator')->get(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: ',
    [
        'actionText' => $actionText
    ]
); ?>
[<?php echo e($actionUrl); ?>](<?php echo $actionUrl; ?>)
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>



  
    <?php $__env->slot('footer'); ?>
        <?php $__env->startComponent('mail::footer', ['url' => config('app.url'),'color' => 'success']); ?>
            © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. <?php echo app('translator')->get('All rights reserved.'); ?>
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\laravel_project\vendor\laravel\framework\src\Illuminate\Notifications/resources/views/email.blade.php ENDPATH**/ ?>