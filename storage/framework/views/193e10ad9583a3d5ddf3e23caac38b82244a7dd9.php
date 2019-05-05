

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('search_results') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('search_results')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s8 right right-align mbot10">
    <a href="<?php echo e(route('admin_owner')); ?>" class="btn waves-effect"> <?php echo e(get_string('owner_all')); ?></a>
</div>
<div class="col s12">
    <?php if(!$errors->isEmpty()): ?>
        <span class="wrong-error">* <?php echo e(get_string('validation_error')); ?></span>
    <?php endif; ?>
    <?php if($owners->count()): ?>
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
                    <th><?php echo e(get_string('points')); ?></th>
                    <th><?php echo e(get_string('properties')); ?></th>
                    <th><?php echo e(get_string('services')); ?></th>
                    <th><?php echo e(get_string('purchases')); ?></th>
                    <th><?php echo e(get_string('activities')); ?></th>
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $owners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $owner): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($owner->id); ?>" />
                            <label for="<?php echo e($owner->id); ?>"></label>
                        </td>
                        <td><?php echo e($owner->username); ?></td>
                        <td><?php echo e($owner->email); ?></td>
                        <td><?php echo e($owner->owner->points); ?></td>
                        <td><a href="<?php echo e(route('admin_owner_services', $owner->id)); ?>"><i class="material-icons">list</i></a></td>
                        <td><a href="<?php echo e(route('admin_owner_properties', $owner->id)); ?>"><i class="material-icons">list</i></a></td>
                        <td><a href="<?php echo e(route('admin_owner_purchases', $owner->id)); ?>"><i class="material-icons">list</i></a></td>
                        <td><a href="<?php echo e(route('admin_owner_activities', $owner->id)); ?>"><i class="material-icons">list</i></a></td>
                        <td>
                            <div class="icon-options">
                                <a href="<?php echo e(route('admin_owner_edit', $owner->owner->id)); ?>" class="edit-button" title="<?php echo e(get_string('edit_user')); ?>"><i class="small material-icons color-primary">mode_edit</i></a>
                                <a href="#" class="delete-button" data-id="<?php echo e($owner->owner->id); ?>" title="<?php echo e(get_string('delete_user')); ?>"><i class="small material-icons color-red">delete</i></a>
                                <a href="#" class="activate-button <?php echo e($owner->status ? 'hidden': ''); ?>" data-id="<?php echo e($owner->owner->id); ?>" title="<?php echo e(get_string('activate_user')); ?>"><i class="small material-icons color-primary">done</i></a>
                                <a href="#" class="deactivate-button <?php echo e($owner->status ? '': 'hidden'); ?>" data-id="<?php echo e($owner->owner->id); ?>" title="<?php echo e(get_string('deactivate_user')); ?>"><i class="small material-icons color-primary">close</i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($owners->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
        <?php endif; ?>
        <?php echo e(csrf_field()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    $(document).ready(function(){
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
                            url: '<?php echo e(url('/admin/owner/destroy')); ?>/'+id,
                            type: 'post',
                            data: {_token :token},
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
                            url: '<?php echo e(url('/admin/owner/activate/')); ?>/'+id,
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
                            url: '<?php echo e(url('/admin/owner/deactivate/')); ?>/'+id,
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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>