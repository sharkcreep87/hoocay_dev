

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('owner_settings') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('owner_settings')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="panel col s12">
    <div class="row">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="tab active"><a data-toggle="tab" href="#general_settings"><?php echo e(get_string('general')); ?></a></li>
            </ul>
        </div>
        <?php echo Form::open(['url' => route('admin_owner_settings_update'), 'method' => 'post', 'id' => "site_settings", 'class' => 'table-responsive', 'files' => 'true']); ?>

        <div class="panel-body">
            <div class="tab-content">
                <div id="general_settings" class="tab-pane active">
                    <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('allow_user_requests') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('allow_user_requests', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('allow_user_requests', 'owner'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('allow_user_requests', get_string('allow_user_requests_label'))); ?>

                            <?php if($errors->has('allow_user_requests')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('allow_user_requests')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('approve_requests_automatically') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('approve_requests_automatically', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('approve_requests_automatically', 'owner'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('approve_requests_automatically', get_string('approve_requests_auto_label'))); ?>

                            <?php if($errors->has('approve_requests_automatically')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('approve_requests_automatically')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div> -->
                    <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('allow_owners_services') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('allow_owners_services', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('allow_owners_services', 'owner'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('allow_owners_services', get_string('allow_owners_services_label'))); ?>

                            <?php if($errors->has('allow_owners_services')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('allow_owners_services')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('register_owner_directly') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('register_owner_directly', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('register_owner_directly', 'owner'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('register_owner_directly', get_string('register_owner_directly'))); ?>

                            <?php if($errors->has('register_owner_directly')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('register_owner_directly')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col clearfix l4 m4 s12 mtop10">
                <div class="form-group">
                    <button class="btn waves-effect" type="submit" name="action"><?php echo e(get_string('update')); ?></button></div>
                </div>
            </div>
        <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>