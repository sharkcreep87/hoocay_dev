

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('search_results') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('search_results')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s8 right right-align mbot10">
    <a href="<?php echo e(route('admin.taxonomy.location.index')); ?>" class="btn waves-effect"> <?php echo e(get_string('location_all')); ?></a>
    <a href="<?php echo e(route('admin.taxonomy.location.create')); ?>" class="btn waves-effect"> <?php echo e(get_string('create_location')); ?> <i class="material-icons small">add_circle</i></a>
    <a href="#" class="mass-delete btn waves-effect btn-red"><i class="material-icons color-white">delete</i></a>
</div>
<div class="col s12">
    <?php if($locations->count()): ?>
    <div class="table-responsive">
    <table class="table bordered striped">
        <thead class="thead-inverse">
        <tr>
            <th>
                <input type="checkbox" class="filled-in primary-color" id="select-all" />
                <label for="select-all"></label>
            </th>
            <th><?php echo e(get_string('name')); ?></th>
            <th><?php echo e(get_string('order')); ?></th>
            <th><?php echo e(get_string('featured')); ?></th>
            <th class="icon-options"><?php echo e(get_string('options')); ?></th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" class="filled-in primary-color" id="<?php echo e($location->id); ?>" />
                        <label for="<?php echo e($location->id); ?>"></label>
                    </td>
                    <td><?php echo e($location->contentDefault->location); ?></td>
                    <td><?php echo e($location->order); ?></td>
                    <td><?php if($location->featured): ?><i class="small material-icons color-primary">done</i><?php else: ?>   <i class="small material-icons color-red">close</i> <?php endif; ?></td>
                    <td>
                        <div class="icon-options">
                            <a href="<?php echo e(url('location').'/'.$location->alias); ?>" title="<?php echo e(get_string('view_page')); ?>"><i class="small material-icons color-primary">visibility</i></a>
                            <a href="<?php echo e(route('admin.taxonomy.location.edit', $location->id)); ?>" title="<?php echo e(get_string('edit_location')); ?>"><i class="small material-icons color-primary">mode_edit</i></a>
                            <a href="#" class="delete-button" data-id="<?php echo e($location->id); ?>" title="<?php echo e(get_string('delete_location')); ?>"><i class="small material-icons color-red">delete</i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
    </div>
    <?php echo e($locations->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<input type="hidden" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        $('.delete-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var selector = $(this).parents('tr');
            var token = $('.token').val();
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
                            url: '<?php echo e(url('/admin/taxonomy/location/')); ?>/'+id,
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
            var token = $('.token').val();
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
                            url: '<?php echo e(url('/admin/taxonomy/location/massdestroy')); ?>',
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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>