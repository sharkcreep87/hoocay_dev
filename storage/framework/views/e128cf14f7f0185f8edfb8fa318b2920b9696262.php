
<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['reset_password']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta name="description" content="<?php echo e($static_data['site_settings']['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['site_settings']['site_name']); ?>" />
    <meta property="og:image" content="<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bg'); ?>
    <?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row  marginalized justify-content-center">
        <div class="col-sm-12"><h1 class="section-title-dark"><?php echo e($static_data['strings']['reset_password']); ?></h1></div>
        <div class="col-sm-12 col-md-8 input-style">
            <?php if(Session::has('status')): ?>
                <p class="section-subtitle-light text-centered green-color"><strong><?php echo e($static_data['strings']['we_sent_reset_mail']); ?></strong></p>
            <?php endif; ?>
            <?php echo Form::open(['method' => 'post', 'url' => url('/password/email')]); ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group  <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-envelope input-group-addon"></span>
                            <?php echo e(Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => $static_data['strings']['email_address']])); ?>

                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 text-centered">
                    <button type="submit" name="action" class="primary-button"><?php echo e($static_data['strings']['submit']); ?></button>
                </div>
                <div class="col-sm-12 text-centered mtop20">
                    <a href="<?php echo e(route('login')); ?>"> <?php echo e($static_data['strings']['login']); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>