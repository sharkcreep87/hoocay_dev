

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('search_results') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('users')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col l6 m4 s12 right right-align mbot10">
    <a href="<?php echo e(route('admin_users')); ?>" class="btn waves-effect"> <?php echo e(get_string('user_all')); ?></a>
    <a href="#" class="mass-delete btn waves-effect btn-red"><i class="material-icons color-white">delete</i></a>
</div>
<div class="col s12">
    <?php if(!$errors->isEmpty()): ?>
        <span class="wrong-error">* <?php echo e(get_string('validation_error')); ?></span>
    <?php endif; ?>
    <?php if($users->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th><?php echo e(get_string('username')); ?></th>
                    <th><?php echo e(get_string('email')); ?></th>
                    <th><?php echo e(get_string('first_name')); ?></th>
                    <th><?php echo e(get_string('last_name')); ?></th>
                    <th><?php echo e(get_string('status')); ?></th>
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($user->id); ?>" />
                            <label for="<?php echo e($user->id); ?>"></label>
                        </td>
                        <td><?php echo e($user->username); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->user->first_name); ?></td>
                        <td><?php echo e($user->user->last_name); ?></td>
                        <td class="post-status"><?php echo e($user->is_active ? get_string('active') : get_string('pending')); ?></td>
                        <td>
                            <div class="icon-options">
                                <a class="edit-button" data-id="<?php echo e($user->id); ?>" data-toggle="modal" href="#user-modal" title="<?php echo e(get_string('edit_user')); ?>"><i class="small material-icons color-primary">mode_edit</i></a>
                                <a href="#" class="delete-button" data-id="<?php echo e($user->id); ?>" title="<?php echo e(get_string('delete_user')); ?>"><i class="small material-icons color-red">delete</i></a>
                                <a href="#" class="upgrade-button" data-id="<?php echo e($user->id); ?>" title="<?php echo e(get_string('upgrade_user')); ?>"><i class="small material-icons color-blue">add_box</i></a>
                                <a href="#" class="activate-button <?php echo e($user->is_active ? 'hidden': ''); ?>" data-id="<?php echo e($user->id); ?>" title="<?php echo e(get_string('activate_user')); ?>"><i class="small material-icons color-primary">done</i></a>
                                <a href="#" class="deactivate-button <?php echo e($user->is_active ? '': 'hidden'); ?>" data-id="<?php echo e($user->id); ?>" title="<?php echo e(get_string('deactivate_user')); ?>"><i class="small material-icons color-primary">close</i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($users->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
        <!-- Modal -->
<div id="user-modal" class="modal not-summernote fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                <strong class="modal-title"><?php echo e(get_string('edit_user')); ?></strong>
            </div>
            <div class="modal-body">
                <?php echo Form::open(['method' => 'post', 'url' => route('admin_user_update'), 'id' => 'user-form']); ?>

                <?php echo e(Form::input('hidden', 'id', null, ['class' => 'hidden', 'id' => 'user_id'])); ?>

                <div class="row mbot0">
                    <div class="col l6 s12">
                        <div class="form-group  <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('first_name', null, [ 'id' => 'user-first-name', 'class' => 'form-control', 'placeholder' => get_string('first_name')])); ?>

                            <?php echo e(Form::label('first_name', get_string('first_name'))); ?>

                            <?php if($errors->has('first_name')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('first_name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 s12">
                        <div class="form-group  <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('last_name', null, [ 'id' => 'user-last-name', 'class' => 'form-control', 'placeholder' => get_string('last_name')])); ?>

                            <?php echo e(Form::label('last_name', get_string('last_name'))); ?>

                            <?php if($errors->has('last_name')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('last_name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 s12 clearfix">
                        <div class="form-group  <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('email', null, [ 'id' => 'user-email', 'class' => 'form-control', 'placeholder' => get_string('email')])); ?>

                            <?php echo e(Form::label('email', get_string('email'))); ?>

                            <?php if($errors->has('email')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 s12">
                        <div class="form-group  <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('username', null, [ 'id' => 'user-username', 'class' => 'form-control', 'placeholder' => get_string('username')])); ?>

                            <?php echo e(Form::label('username', get_string('username'))); ?>

                            <?php if($errors->has('username')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('username')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 s12">
                        <div class="form-group  <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::password('password', [ 'id' => 'user-password', 'class' => 'form-control', 'placeholder' => get_string('password')])); ?>

                            <?php echo e(Form::label('password', get_string('password'))); ?>

                            <?php if($errors->has('password')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 s12">
                        <div class="form-group  <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::password('password_confirmation', [ 'id' => 'user-password', 'class' => 'form-control', 'placeholder' => get_string('confirm_password')])); ?>

                            <?php echo e(Form::label('password_confirmation', get_string('confirm_password'))); ?>

                            <?php if($errors->has('password_confirmation')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('password_confirmation')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="action" class="update-lang-form waves-effect btn btn-default"><?php echo e(get_string('update')); ?></button>
                <a href="#!" class="waves-effect btn btn-default" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.edit-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var token = $('[name=_token]').val();
            $.ajax({
                url: '<?php echo e(url('/admin/user/userinfo')); ?>',
                type: 'get',
                data: {id: id, _token: token},
                success: function(info){
                    for(var key in info){
                        $('#user-form [name="'+key+'"]').val(info[key]);
                    }
                    $('#user-form [name="id"]').val(id);
                },
                error: function(msg){
                    toastr.error(msg.responseJSON);
                }
            });
        });
        $('.activate-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var selector = $(this).parents('tr');
            var thisBtn = $(this).parents('.icon-options');
            var status = selector.children('.post-status');
            var token = $('[name=_token]').val();
            bootbox.confirm({
                title: '<?php echo e(get_string('confirm_action')); ?>',
                message: '<?php echo e(get_string('activate_user_confirm')); ?>',
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
                            url: '<?php echo e(url('/admin/user/activate/')); ?>/'+id,
                            type: 'post',
                            data: {_token :token},
                            success:function(msg) {
                                thisBtn.children('.activate-button').addClass('hidden');
                                thisBtn.children('.deactivate-button').removeClass('hidden');
                                status.html('<?php echo e(get_string('active')); ?>');
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

        $('.deactivate-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var selector = $(this).parents('tr');
            var thisBtn = $(this).parents('.icon-options');
            var status = selector.children('.post-status');
            var token = $('[name=_token]').val();
            bootbox.confirm({
                title: '<?php echo e(get_string('confirm_action')); ?>',
                message: '<?php echo e(get_string('deactivate_user_confirm')); ?>',
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
                            url: '<?php echo e(url('/admin/user/deactivate/')); ?>/'+id,
                            type: 'post',
                            data: {_token :token},
                            success:function(msg) {
                                thisBtn.children('.deactivate-button').addClass('hidden');
                                thisBtn.children('.activate-button').removeClass('hidden');
                                status.html('<?php echo e(get_string('pending')); ?>');
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
        $('.delete-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var selector = $(this).parents('tr');
            var token = $('[name=_token]').val();
            bootbox.confirm({
                title: '<?php echo e(get_string('confirm_action')); ?>',
                message: '<?php echo e(get_string('delete_confirm')); ?>',
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
                            url: '<?php echo e(url('/admin/user/')); ?>/'+id,
                            type: 'post',
                            data: {_method: 'delete', _token :token},
                            success:function(msg) {
                                selector.remove();
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
        $('.mass-delete').click(function(event){
            event.preventDefault();
            var id = [];
            var selector = [];
            $("tbody input:checkbox:checked").each(function(){
                id.push($(this).attr('id'));
                selector.push($(this).parents('tr'));
            });
            var token = $('[name=_token]').val();
            bootbox.confirm({
                title: '<?php echo e(get_string('confirm_action')); ?>',
                message: '<?php echo e(get_string('delete_confirm_bulk')); ?>',
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
                    if(result) {
                        $.ajax({
                            url: '<?php echo e(url('/admin/user/massdestroy')); ?>',
                            type: 'post',
                            data: {id: id, _token :token},
                            success:function(msg) {
                                $.each(selector, function(index, item){
                                    $(this).remove();
                                });
                                $('#select-all').prop('checked', false);
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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>