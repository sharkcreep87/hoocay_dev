

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('edit_owner') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('edit_owner')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12 mtop10">
    <?php echo Form::open(['method' => 'post', 'url' => route('admin_owner_update', $owner->id), 'files' => 'true']); ?>

    <?php echo Form::hidden('user_id', $owner->user_id); ?>

    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
            <?php echo Form::text('username', $owner->user->username, ['id' => 'username', 'class' => 'form-control', 'placeholder' => get_string('username')]); ?>

            <?php echo Form::label('username', get_string('username')); ?>

            <?php if($errors->has('username')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('username')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group  <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
            <?php echo Form::text('first_name', $owner->first_name, ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => get_string('first_name')]); ?>

            <?php echo Form::label('first_name', get_string('first_name')); ?>

            <?php if($errors->has('first_name')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('first_name')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
            <?php echo Form::text('last_name', $owner->last_name, ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => get_string('last_name')]); ?>

            <?php echo Form::label('last_name', get_string('last_name')); ?>

            <?php if($errors->has('last_name')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('last_name')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
            <?php echo Form::text('company', $owner->last_name, ['id' => 'company', 'class' => 'form-control', 'placeholder' => get_string('company')]); ?>

            <?php echo Form::label('company', get_string('company')); ?>

            <?php if($errors->has('company')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('last_name')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
            <?php echo Form::text('phone', $owner->phone, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => get_string('phone')]); ?>

            <?php echo Form::label('phone', get_string('phone')); ?>

            <?php if($errors->has('phone')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('phone')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <?php echo Form::email('email', $owner->user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => get_string('email_address')]); ?>

            <?php echo Form::label('email', get_string('email_address')); ?>

            <?php if($errors->has('email')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
            <?php echo Form::text('address', $owner->address, ['id' => 'address', 'class' => 'form-control', 'placeholder' => get_string('address')]); ?>

            <?php echo Form::label('address', get_string('address')); ?>

            <?php if($errors->has('address')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('address')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
            <?php echo Form::text('city', $owner->city, ['id' => 'city', 'class' => 'form-control', 'placeholder' => get_string('city')]); ?>

            <?php echo Form::label('city', get_string('city')); ?>

            <?php if($errors->has('city')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('city')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
            <?php echo Form::text('state', $owner->state, ['id' => 'state', 'class' => 'form-control', 'placeholder' => get_string('state')]); ?>

            <?php echo Form::label('state', get_string('state')); ?>

            <?php if($errors->has('state')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('state')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>"">
            <?php echo Form::text('country', $owner->country, ['id' => 'country', 'class' => 'form-control', 'placeholder' => get_string('country')]); ?>

            <?php echo Form::label('country', get_string('country')); ?>

            <?php if($errors->has('country')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('country')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('zip') ? 'has-error' : ''); ?>">
            <?php echo Form::text('zip', $owner->zip, ['id' => 'zip', 'class' => 'form-control', 'placeholder' => get_string('zip')]); ?>

            <?php echo Form::label('zip', get_string('zip')); ?>

            <?php if($errors->has('zip')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('zip')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('points') ? 'has-error' : ''); ?>">
            <?php echo Form::text('points', $owner->points, ['id' => 'points', 'class' => 'form-control', 'placeholder' => get_string('points')]); ?>

            <?php echo Form::label('points', get_string('points')); ?>

            <?php if($errors->has('points')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('points')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('active_balance') ? 'has-error' : ''); ?>">
            <?php echo Form::text('active_balance', $owner->active_balance, ['id' => 'active_balance', 'class' => 'form-control', 'placeholder' => get_string('active_balance')]); ?>

            <?php echo Form::label('active_balance', get_string('active_balance')); ?>

            <?php if($errors->has('active_balance')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('active_balance')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
        <div class="form-group <?php echo e($errors->has('pending_balance') ? 'has-error' : ''); ?>">
            <?php echo Form::text('pending_balance', $owner->pending_balance, ['id' => 'pending_balance', 'class' => 'form-control', 'placeholder' => get_string('pending_balance')]); ?>

            <?php echo Form::label('pending_balance', get_string('pending_balance')); ?>

            <?php if($errors->has('pending_balance')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('pending_balance')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col l4 m4 s6">
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
    <div class="clearfix col m6 s6">
        <img class="responsive-img featured-img" src="<?php echo e($owner->logo); ?>"  style="display: block"/>
        <a href="#!" class="delete-featured-image btn waves-effect btn-red mtop10 mbot10" data-id="2"><i class="material-icons color-white">delete</i><?php echo e(get_string('delete_image')); ?></a>
        <div class="clearfix input-group">
                <label class="input-group-btn">
                            <span class="btn btn-primary waves-effect"><?php echo e(get_string('profile_picture')); ?> <i class="material-icons small">add_circle</i>
                                <?php echo Form::file('logo', ['id' => 'logo', 'class' => 'hidden']); ?>

                            </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
        <?php if($errors->has('logo')): ?>
                <span class="wrong-error">* <?php echo e($errors->first('logo')); ?></span>
            <?php endif; ?>
            <span class="field-info"><?php echo e(get_string('max_dimension_300')); ?></span>
    </div>
    <div class="col clearfix  s12">
        <div class="form-group">
            <button class="btn waves-effect" type="submit" name="action"><?php echo e(get_string('update_profile')); ?></button>
        </div>
    </div>
    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript">
        $('.delete-featured-image').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var token = $('[name="_token"]').val();
            bootbox.confirm({
                title: '<?php echo e(get_string('confirm_action')); ?>',
                message: '<?php echo e(get_string('delete_featured_image')); ?>',
                onEscape: true,
                backdrop: true,
                buttons: {
                    cancel: {
                        label: '<?php echo e(get_string('no')); ?>',
                        className: 'btn waves-effect'
                    },
                    confirm: {
                        label: '<?php echo e(get_string('yes')); ?>',
                        className: 'btn waves-effect'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            url: '<?php echo e(url('/admin/owner/deleteImage')); ?>/'+id,
                            type: 'post',
                            data: {_token :token},
                            success:function(msg) {
                                $('.featured-img').attr('src', '<?php echo e(URL::asset('images/owner/no_image.jpg')); ?>');
                                toastr.success(msg);
                            },
                            error:function(msg){
                                toastr.error(msg.responseJSON);
                            }
                        });
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>