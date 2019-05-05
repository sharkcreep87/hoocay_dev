

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('my_account') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('my_account')); ?></h3>
<?php $__env->stopSection(); ?>
<?php if(Session::has('account_updated')): ?>
    <div class="col s12">
        <div class="col s12 text-centered">
            <h5 class="color-primary"><?php echo e(get_string('account_updated')); ?></h5>
        </div>
    </div>
<?php endif; ?>
<div class="col s12 mtop10">
    <?php echo Form::open(['method' => 'put', 'url' => route('owner_my_account_update', Auth::user()->id), 'files' => 'true']); ?>

    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
            <?php echo Form::text('username', $user->username, ['id' => 'username', 'class' => 'form-control', 'placeholder' => get_string('username')]); ?>

            <?php echo Form::label('username', get_string('username')); ?>

            <?php if($errors->has('username')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('username')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group  <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
            <?php echo Form::text('first_name', $user->owner->first_name, ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => get_string('first_name')]); ?>

            <?php echo Form::label('first_name', get_string('first_name')); ?>

            <?php if($errors->has('first_name')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('first_name')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
            <?php echo Form::text('last_name', $user->owner->last_name, ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => get_string('last_name')]); ?>

            <?php echo Form::label('last_name', get_string('last_name')); ?>

            <?php if($errors->has('last_name')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('last_name')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
            <?php echo Form::text('company', $user->owner->company, ['id' => 'company', 'class' => 'form-control', 'placeholder' => get_string('company')]); ?>

            <?php echo Form::label('company', get_string('company')); ?>

            <?php if($errors->has('company')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('company')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <?php echo Form::email('email', $user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => get_string('email_address')]); ?>

            <?php echo Form::label('email', get_string('email_address')); ?>

            <?php if($errors->has('email')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
            <?php echo Form::text('phone', $user->owner->company, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => get_string('phone')]); ?>

            <?php echo Form::label('phone', get_string('phone')); ?>

            <?php if($errors->has('phone')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('phone')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
            <?php echo Form::text('address', $user->owner->address, ['id' => 'address', 'class' => 'form-control', 'placeholder' => get_string('address')]); ?>

            <?php echo Form::label('address', get_string('address')); ?>

            <?php if($errors->has('address')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('address')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
            <?php echo Form::text('city', $user->owner->city, ['id' => 'city', 'class' => 'form-control', 'placeholder' => get_string('city')]); ?>

            <?php echo Form::label('city', get_string('city')); ?>

            <?php if($errors->has('city')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('city')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
            <?php echo Form::text('state', $user->owner->state, ['id' => 'state', 'class' => 'form-control', 'placeholder' => get_string('state')]); ?>

            <?php echo Form::label('state', get_string('state')); ?>

            <?php if($errors->has('state')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('state')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>"">
            <?php echo Form::text('country', $user->owner->country, ['id' => 'country', 'class' => 'form-control', 'placeholder' => get_string('country')]); ?>

            <?php echo Form::label('country', get_string('country')); ?>

            <?php if($errors->has('country')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('country')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('zip') ? 'has-error' : ''); ?>">
            <?php echo Form::text('zip', $user->owner->zip, ['id' => 'zip', 'class' => 'form-control', 'placeholder' => get_string('zip')]); ?>

            <?php echo Form::label('zip', get_string('zip')); ?>

            <?php if($errors->has('zip')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('zip')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6 clearfix">
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <?php echo Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => get_string('password')]); ?>

            <?php echo Form::label('password', get_string('password')); ?>

            <?php if($errors->has('password')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <?php echo Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => get_string('password_confirmation')]); ?>

            <?php echo Form::label('password_confirmation', get_string('password_confirmation')); ?>

            <?php if($errors->has('password')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col s12">
        <div class="input-group">
            <label class="input-group-btn">
                    <span class="btn btn-primary waves-effect"><?php echo e(get_string('company_logo')); ?> <i class="material-icons small">add_circle</i>
                <?php echo Form::file('avatar', ['id' => 'avatar', 'class' => 'hidden']); ?>

                    </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>
        <?php if($errors->has('logo')): ?>
            <span class="wrong-error">* <?php echo e($errors->first('logo')); ?></span>
        <?php endif; ?>
            <span class="field-info"><?php echo e(get_string('max_dimension_300')); ?></span>
    </div>
    <div class="col clearfix l4 m4 s6">
        <div class="form-group">
            <button class="btn waves-effect" type="submit" name="action"><?php echo e(get_string('update_profile')); ?></button>
        </div>
    </div>
    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>