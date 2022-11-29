<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.subscription.switch-plan')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.subscription.switch-plan-desc-user')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('user.subscriptions.index')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text"><?php echo e(__('backend.shared.back')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <?php if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(__('backend.subscription.switch-plan-help')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


                <div class="row justify-content-center">


                    <?php $__currentLoopData = $all_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plans_key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                                            </li>
                                        <?php endif; ?>

                                        <?php if(is_null($plan->plan_max_featured_listing)): ?>
                                            <li>
                                                <?php echo e(__('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.featured-listing')); ?>

                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <?php echo e($plan->plan_max_featured_listing . ' ' . __('theme_directory_hub.plan.featured-listing')); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php if(!empty($plan->plan_features)): ?>
                                        
                                         <?php
                                            $data = $plan->plan_features;
                                            $sep_tag= explode(',', $data);
                                        ?>
                                            
                                        <?php $__currentLoopData = $sep_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <li ><?php echo e($tag); ?></li>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                         
                                        
                                            <!--<li>-->
                                            <!--    <?php echo e($plan->plan_features); ?>-->
                                            <!--</li>-->
                                        <?php endif; ?>
                                    </ul>

                                    <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>

                                        <?php if($setting_site_bank_transfer_enable == \App\Setting::SITE_PAYMENT_BANK_TRANSFER_ENABLE): ?>
                                            <div class="row pb-3">
                                                <div class="col-12">
                                                    <a class="btn btn-sm btn-success btn-block text-white<?php echo e($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? ' disabled' : ''); ?>" href="#" data-toggle="modal" data-target="#banktransferModal<?php echo e(strval($plan->id)); ?>">
                                                        <?php echo e(__('bank_transfer.pay-bank-transfer')); ?>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="banktransferModal<?php echo e(strval($plan->id)); ?>" tabindex="-1" role="dialog" aria-labelledby="banktransferModal<?php echo e(strval($plan->id)); ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('bank_transfer.bank-transfer')); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="<?php echo e(route('user.banktransfer.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id])); ?>" class="">
                                                            <?php echo csrf_field(); ?>

                                                            <input type="hidden" name="invoice_bank_transfer_bank_name" id="invoice_bank_transfer_bank_name_<?php echo e($plan->id); ?>" value="<?php echo e($all_setting_bank_transfers->first()->setting_bank_transfer_bank_name); ?>">
                                                            <div class="modal-body">

                                                                <div class="row form-group">
                                                                    <div class="col-md-12 text-left">
                                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                                            <?php $__currentLoopData = $all_setting_bank_transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_1 => $bank_transfer_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($key_1 == 0): ?>
                                                                                    <a class="nav-link active bank_transfer_tab" id="v-pills-tab-<?php echo e($bank_transfer_1->id); ?>-<?php echo e($plan->id); ?>" data-toggle="pill" href="#v-pills-<?php echo e($bank_transfer_1->id); ?>-<?php echo e($plan->id); ?>" role="tab" aria-controls="v-pills-<?php echo e($bank_transfer_1->id); ?>-<?php echo e($plan->id); ?>" aria-selected="true" data-input-id="invoice_bank_transfer_bank_name_<?php echo e($plan->id); ?>"><?php echo e($bank_transfer_1->setting_bank_transfer_bank_name); ?></a>
                                                                                <?php else: ?>
                                                                                    <a class="nav-link bank_transfer_tab" id="v-pills-tab-<?php echo e($bank_transfer_1->id); ?>-<?php echo e($plan->id); ?>" data-toggle="pill" href="#v-pills-<?php echo e($bank_transfer_1->id); ?>-<?php echo e($plan->id); ?>" role="tab" aria-controls="v-pills-<?php echo e($bank_transfer_1->id); ?>-<?php echo e($plan->id); ?>" aria-selected="false" data-input-id="invoice_bank_transfer_bank_name_<?php echo e($plan->id); ?>"><?php echo e($bank_transfer_1->setting_bank_transfer_bank_name); ?></a>
                                                                                <?php endif; ?>

                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="tab-content pt-2 pb-2" id="v-pills-tabContent">
                                                                            <?php $__currentLoopData = $all_setting_bank_transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_2 => $bank_transfer_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($key_2 == 0): ?>
                                                                                    <div class="tab-pane fade show active" id="v-pills-<?php echo e($bank_transfer_2->id); ?>-<?php echo e($plan->id); ?>" role="tabpanel" aria-labelledby="v-pills-tab-<?php echo e($bank_transfer_2->id); ?>-<?php echo e($plan->id); ?>">
                                                                                        <span class="text-gray-800"><?php echo e(__('bank_transfer.bank-account-info')); ?>:</span><br>
                                                                                        <?php echo clean(nl2br($bank_transfer_2->setting_bank_transfer_bank_account_info), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                                                                    </div>
                                                                                <?php else: ?>
                                                                                    <div class="tab-pane fade" id="v-pills-<?php echo e($bank_transfer_2->id); ?>-<?php echo e($plan->id); ?>" role="tabpanel" aria-labelledby="v-pills-tab-<?php echo e($bank_transfer_2->id); ?>-<?php echo e($plan->id); ?>">
                                                                                        <span class="text-gray-800"><?php echo e(__('bank_transfer.bank-account-info')); ?>:</span><br>
                                                                                        <?php echo clean(nl2br($bank_transfer_2->setting_bank_transfer_bank_account_info), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                        <?php $__errorArgs = ['invoice_bank_transfer_bank_name'];
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
                                                                        <hr>
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col-md-12 text-left">
                                                                        <label class="text-black" for="invoice_bank_transfer_detail"><?php echo e(__('bank_transfer.transaction-detail')); ?></label>
                                                                        <textarea rows="4" id="invoice_bank_transfer_detail" type="text" class="form-control <?php $__errorArgs = ['invoice_bank_transfer_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="invoice_bank_transfer_detail"><?php echo e(old('invoice_bank_transfer_detail')); ?></textarea>
                                                                        <small class="text-muted">
                                                                            <?php echo e(__('bank_transfer.transaction-detail-help')); ?>

                                                                        </small>
                                                                        <?php $__errorArgs = ['invoice_bank_transfer_detail'];
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

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('bank_transfer.submit')); ?></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($setting_site_paypal_enable == \App\Setting::SITE_PAYMENT_PAYPAL_ENABLE): ?>
                                            <form method="GET" action="<?php echo e(route('user.paypal.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id])); ?>" class="">
                                                <?php echo csrf_field(); ?>
                                                <div class="row form-group justify-content-between">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-sm btn-success btn-block text-white" <?php echo e($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : ''); ?>>
                                                            <?php echo e(__('payment.pay-paypal')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif; ?>

                                        <?php if($setting_site_razorpay_enable == \App\Setting::SITE_PAYMENT_RAZORPAY_ENABLE): ?>
                                            <form method="POST" action="<?php echo e(route('user.razorpay.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id])); ?>" class="">
                                                <?php echo csrf_field(); ?>
                                                <div class="row form-group justify-content-between">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-sm btn-success btn-block text-white" <?php echo e($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : ''); ?>>
                                                            <?php echo e(__('payment.pay-razorpay')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif; ?>

                                        <?php if($setting_site_stripe_enable == \App\Setting::SITE_PAYMENT_STRIPE_ENABLE): ?>
                                            <form method="POST" action="<?php echo e(route('user.stripe.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id])); ?>" class="">
                                                <?php echo csrf_field(); ?>
                                                <div class="row form-group justify-content-between">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-sm btn-success btn-block text-white" <?php echo e($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : ''); ?>>
                                                            <?php echo e(__('stripe.pay-stripe')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif; ?>

                                        <?php if($setting_site_payumoney_enable == \App\Setting::SITE_PAYMENT_PAYUMONEY_ENABLE): ?>
                                            <form method="POST" action="<?php echo e(route('user.payumoney.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id])); ?>" class="">
                                                <?php echo csrf_field(); ?>
                                                <div class="row form-group justify-content-between">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-sm btn-success btn-block text-white" <?php echo e($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : ''); ?>>
                                                            <?php echo e(__('payumoney.pay-payumoney')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
    <script>
        $(document).ready(function() {

            "use strict";

            <?php if($setting_site_bank_transfer_enable == \App\Setting::SITE_PAYMENT_BANK_TRANSFER_ENABLE): ?>

            $(".bank_transfer_tab").on('shown.bs.tab', function (e) {
                e.target // newly activated tab
                e.relatedTarget // previous active tab

                var data_input_id = $(e.target).attr("data-input-id");

                $("#" + data_input_id).val(e.target.text);
            });

            <?php endif; ?>

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/backend/user/subscription/edit.blade.php ENDPATH**/ ?>