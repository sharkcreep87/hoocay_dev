

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('search_results') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('search_results')); ?></h3>
<?php $__env->stopSection(); ?>

<div class="col s8 right right-align mbot10">
    <a href="<?php echo e(route('owner.property.index')); ?>" class="btn waves-effect"> <?php echo e(get_string('property_all')); ?></a>
    <a href="<?php echo e(route('owner.property.create')); ?>" class="btn waves-effect"> <?php echo e(get_string('create_property')); ?> <i class="material-icons small">add_circle</i></a>
    <a href="#" class="mass-delete btn waves-effect btn-red"><i class="material-icons color-white">delete</i></a>
</div>
    <div class="col s12">
        <?php if($properties->count()): ?>
            <div class="table-responsive">
                <table class="table bordered striped">
                    <thead class="thead-inverse">
                    <tr>
                        <th>
                            <input type="checkbox" class="filled-in primary-color" id="select-all" />
                            <label for="select-all"></label>
                        </th>
                        <th><?php echo e(get_string('property')); ?></th>
                        <th><?php echo e(get_string('user')); ?></th>
                        <th><?php echo e(get_string('category')); ?></th>
                        <th><?php echo e(get_string('location')); ?></th>
                        <th><?php echo e(get_string('status')); ?></th>
                        <th><?php echo e(get_string('featured')); ?></th>
                        <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="filled-in primary-color" id="<?php echo e($property->id); ?>" />
                                <label for="<?php echo e($property->id); ?>"></label>
                            </td>
                            <td><?php echo e($property->contentDefault->name); ?></td>
                            <td><?php if($property->user): ?><?php echo e($property->user->username); ?><?php else: ?> <i class="small material-icons color-red">clear</i> <?php endif; ?></td>
                            <td><?php echo e($property->category->contentDefault->name); ?></td>
                            <td><?php echo e($property->prop_location->contentDefault->location); ?></td>
                            <td class="page-status"><?php echo e($property->status ? get_string('active') : get_string('pending')); ?></td>
                            <td class="page-featured"><?php echo e($property->featured ? get_string('yes') : get_string('no')); ?></td>
                            <td>
                                <div class="icon-options">
                                    <a href="<?php echo e(url('property').'/'.$property->alias); ?>" title="<?php echo e(get_string('view_property')); ?>"><i class="small material-icons color-primary">visibility</i></a>
                                    <a href="<?php echo e(route('owner.property.edit', $property->id)); ?>" title="<?php echo e(get_string('edit_property')); ?>"><i class="small material-icons color-primary">mode_edit</i></a>
                                    <a href="#" class="delete-button" data-id="<?php echo e($property->id); ?>" title="<?php echo e(get_string('delete_property')); ?>"><i class="small material-icons color-red">delete</i></a>
                                    <?php if(get_setting('allow_featured_properties ', 'property')): ?>
                                    <a href="#" class="make-featured-button <?php echo e($property->featured ? 'hidden': ''); ?>" data-id="<?php echo e($property->id); ?>" title="<?php echo e(get_string('make_featured')); ?>"><i class="small material-icons color-primary">grade</i></a>
                                    <a href="#" class="make-default-button <?php echo e($property->featured ? '': 'hidden'); ?>" data-id="<?php echo e($property->id); ?>" title="<?php echo e(get_string('make_default')); ?>"><i class="small material-icons color-yellow">grade</i></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($properties->links()); ?>

        <?php else: ?>
            <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
        <?php endif; ?>
    </div>
<input type="hidden" name="_token" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        $(document).ready(function(){
            $('.delete-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var token = $('[name="_token"]').val();
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
                                url: '<?php echo e(url('/owner/property/')); ?>/'+id,
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

            $('.activate-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-status');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '<?php echo e(get_string('confirm_action')); ?>',
                    message: '<?php echo e(get_string('activate_property_confirm')); ?>',
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
                                url: '<?php echo e(url('/owner/property/activate/')); ?>/'+id,
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
                var status = selector.children('.page-status');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '<?php echo e(get_string('confirm_action')); ?>',
                    message: '<?php echo e(get_string('deactivate_property_confirm')); ?>',
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
                                url: '<?php echo e(url('/owner/property/deactivate/')); ?>/'+id,
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

            $('.make-featured-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-featured');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '<?php echo e(get_string('confirm_action')); ?>',
                    message: '<?php echo e(get_string('make_featured_confirm')); ?>',
                    inputType: 'select',
                    inputOptions: [
                        {
                            text: '<?php echo e(get_string('choose_your_package')); ?>',
                            value: '4',
                        },
                        {
                            text: '<?php echo e(get_string('week_featured')); ?> - <?php echo e(get_setting('points_featured_week', 'payment')); ?> <?php echo e(get_string('points')); ?>',
                            value: '1',
                        },
                        {
                            text: '<?php echo e(get_string('month_featured')); ?> - <?php echo e(get_setting('points_featured_month', 'payment')); ?> <?php echo e(get_string('points')); ?>',
                            value: '2',
                        },
                        {
                            text: '<?php echo e(get_string('3months_featured')); ?> - <?php echo e(get_setting('points_featured_3months', 'payment')); ?> <?php echo e(get_string('points')); ?>',
                            value: '3',
                        }
                    ],
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
                                url: '<?php echo e(url('/owner/property/makefeatured/')); ?>/'+id,
                                type: 'post',
                                data: {_token :token, price:result},
                                success:function(msg) {
                                    thisBtn.children('.make-featured-button').addClass('hidden');
                                    thisBtn.children('.make-default-button').removeClass('hidden');
                                    status.html('<?php echo e(get_string('yes')); ?>');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }else if(result > 3){
                            toastr.warning('<?php echo e(get_string('choose_your_package')); ?>!');
                        }
                    }
                });
            });

            $('.make-default-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-featured');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '<?php echo e(get_string('confirm_action')); ?>',
                    message: '<?php echo e(get_string('make_default_confirm')); ?>',
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
                                url: '<?php echo e(url('/owner/property/makedefault/')); ?>/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.make-default-button').addClass('hidden');
                                    thisBtn.children('.make-featured-button').removeClass('hidden');
                                    status.html('<?php echo e(get_string('no')); ?>');
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
                var token = $('[name="_token"]').val();
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
                        if(result){
                            $.ajax({
                                url: '<?php echo e(url('/owner/property/massdestroy')); ?>',
                                type: 'post',
                                data: {id: id, _token :token},
                                success:function(msg) {
                                    $.each(selector, function(index, item){
                                        $(this).remove();
                                    });
                                    $('#select-all').prop('checked', false);
                                    toastr.success(msg);
                                },
                                error: function(msg){
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
<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>