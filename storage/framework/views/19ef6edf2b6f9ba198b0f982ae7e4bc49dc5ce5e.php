<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['register']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?></title>
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
        <div class="col-sm-12">
            <h1 class="section-title-dark"><?php echo e($static_data['strings']['register_host']); ?></h1>
        </div>
        <div class="col-sm-12 col-md-8 input-style user-action-form">
            <?php echo Form::open(['method' => 'post', 'url' => url('/register')]); ?>

            <div class="row">
                <div class="col-sm-12"><p class="section-subtitle-light text-centered"> <?php echo e($static_data['strings']['please_fill_all_fields']); ?> </p></div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-address-card-o input-group-addon"></span>
                            <?php echo e(Form::text('first_name', null, ['class' => 'form-control', 'required', 'placeholder' => $static_data['strings']['first_name']])); ?>

                        </div>
                        <?php if($errors->has('first_name')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('first_name')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-address-card-o input-group-addon"></span>
                            <?php echo e(Form::text('last_name', null, ['class' => 'form-control', 'required', 'placeholder' => $static_data['strings']['last_name']])); ?>

                        </div>
                        <?php if($errors->has('last_name')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('last_name')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-user input-group-addon"></span>
                            <?php echo e(Form::text('username', null, ['class' => 'form-control', 'required', 'placeholder' => $static_data['strings']['username']])); ?>

                        </div>
                        <?php if($errors->has('username')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('username')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-phone input-group-addon"></span>
                            <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'required', 'placeholder' => $static_data['strings']['phone']])); ?>

                        </div>
                        <?php if($errors->has('phone')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('phone')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
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
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-key input-group-addon"></span>
                            <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => $static_data['strings']['password']])); ?>

                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-key input-group-addon"></span>
                            <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => $static_data['strings']['password_confirmation']])); ?>

                        </div>
                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('password_confirmation')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
          
               <!-- <?php if(get_setting('register_owner_directly', 'owner')): ?>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group  <?php echo e($errors->has('register_owner') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-building input-group-addon"></span>
                            <?php echo e(Form::select('register_owner', [0 => $static_data['strings']['no'], 1 => $static_data['strings']['yes']], null, ['class' => 'form-control', 'placeholder' => $static_data['strings']['register_as_owner']])); ?>

                        </div>
                        <?php if($errors->has('register_owner')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('register_owner')); ?></span>
                        <?php endif; ?>-->
                           <?php echo e(Form::hidden('register_owner', 1)); ?>

                    </div>
                </div>
                <?php endif; ?>

                  <div class="text-centered">
                   
                        <div class="input-group">
                            
                        <input type="checkbox" name="terms" required/> &nbsp;&nbsp;&nbsp;I have agree with  <a href="https://hoocay.com/page/terms-of-use" >&nbsp;Terms&nbsp;</a> and Conditions from hoocay.
               
                        </div>
                       
                     
                </div>
                  <br>
                <div class="col-sm-12 text-centered">
                    <button type="submit" name="action" class="primary-button"><?php echo e($static_data['strings']['submit']); ?></button>
                </div>
            </div>
<br>
             <div class="col-sm-12 text-centered"> OR</div>
             <hr>
               <div class="row">
                  <?php if(get_setting('login_with_facebook', 'user')): ?>
                <div class="col-md-6 col-sm-12  social-btn">
                    <a href="<?php echo e(route('facebook_redirect')); ?>" class="facebook-btn"><i class="fa fa-facebook"></i> <?php echo e($static_data['strings']['login_with_facebook']); ?></a>
                </div>
                <?php endif; ?>
                <?php if(get_setting('login_with_google_plus', 'user')): ?>
                <div class="col-md-6 col-sm-12  social-btn">
                    <a href="<?php echo e(route('google_redirect')); ?>" class="google-btn"><i class="fa fa-google-plus"></i> <?php echo e($static_data['strings']['login_with_google']); ?></a>
                </div></div>
                <?php endif; ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>