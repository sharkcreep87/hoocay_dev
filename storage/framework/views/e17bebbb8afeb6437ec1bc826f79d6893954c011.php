

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('reviews') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('reviews')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if($reviews->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th><?php echo e(get_string('username')); ?></th>
                    <th><?php echo e(get_string('review')); ?></th>
                    <th><?php echo e(get_string('item')); ?></th>
                    <th><?php echo e(get_string('status')); ?></th>
                    <th><?php echo e(get_string('rating')); ?></th>
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="<?php echo e($review->status ? 'disabled-style' : ''); ?>">
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($review->id); ?>" />
                            <label for="<?php echo e($review->id); ?>"></label>
                        </td>
                        <td><?php if($review->user): ?><?php echo e($review->user->username); ?><?php else: ?> <i class="small material-icons color-red">clear</i> <?php endif; ?></td>
                        <td><?php echo e(str_limit($review->review, 50, '...')); ?> <a href="#review-modal" data-toggle="modal" data-id="<?php echo e($review->id); ?>" class="more-button"><i class="small material-icons color-primary">add</i></a></td>
                        <td><?php if($review->property_id && $review->property): ?><?php echo e($review->property->contentDefault->name); ?><?php elseif($review->service_id && $review->service): ?><?php echo e($review->service->contentDefault->name); ?><?php else: ?><i class="small material-icons color-red">clear</i> <?php endif; ?></td>
                        <td class="review-status"><?php echo e($review->status ? get_string('approved') : get_string('pending')); ?></td>
                        <td><?php for($i = 0; $i < $review->rating; $i++) echo '<i class="small material-icons color-yellow">grade</i>' ?></td>
                        <td>
                            <div class="icon-options">
                                <a href="#" class="confirm-button" data-id="<?php echo e($review->id); ?>" title="<?php echo e(get_string('accept_review')); ?>"><i class="small material-icons color-primary">done</i></a>
                                <a href="#" class="delete-button" data-id="<?php echo e($review->id); ?>" title="<?php echo e(get_string('delete_review')); ?>"><i class="small material-icons color-red">delete</i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($reviews->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<input type="hidden" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <div id="review-modal" class="modal not-summernote fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                    <strong class="modal-title"><?php echo e(get_string('full_review')); ?></strong>
                </div>
                <div class="modal-body" id="full-review"></div>
                <div class="modal-footer">
                    <a href="#!" class="waves-effect btn btn-default" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#review-modal").on('hidden.bs.modal', function () {
                $('#full-review').html('');
            });
            $('.confirm-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var status = $('.review-status', selector);
                var token = $('.token').val();
                if(!selector.hasClass('disabled-style')) {
                    bootbox.confirm({
                        title: '<?php echo e(get_string('confirm_action')); ?>',
                        message: '<?php echo e(get_string('approve_review_confirm')); ?>',
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
                            if (result) {
                                $.ajax({
                                    url: '<?php echo e(url('/admin/review/complete/')); ?>/' + id,
                                    type: 'post',
                                    data: {_token: token},
                                    success: function (msg) {
                                        selector.addClass('disabled-style');
                                        status.html('<?php echo e(get_string('approved')); ?>');
                                        toastr.success(msg);
                                    },
                                    error: function (msg) {
                                        toastr.error(msg.responseJSON);
                                    }
                                });
                            }
                        }
                    });
                }
            });
            $('.more-button').click(function(){
                var id = $(this).data('id');
                var token = $('.token').val();
                $.ajax({
                    url: '<?php echo e(url('/admin/review/getReview')); ?>/'+id,
                    type: 'post',
                    data: {_token :token},
                    success:function(msg) {
                        $('#full-review').html(msg);
                    },
                    error:function(msg){
                        toastr.error(msg.responseJSON);
                    }
                });
            });
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
                                url: '<?php echo e(url('/admin/review/delete')); ?>/'+id,
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
            $('.dismiss-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var status = $('.review-status', selector);
                var token = $('.token').val();
                if(!selector.hasClass('disabled-style')){
                    bootbox.confirm({
                        title: '<?php echo e(get_string('confirm_action')); ?>',
                        message: '<?php echo e(get_string('upgrade_dismiss')); ?>',
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
                                    url: '<?php echo e(url('/admin/review/dismiss/')); ?>/'+id,
                                    type: 'post',
                                    data: {_token :token},
                                    success:function(msg) {
                                        selector.addClass('disabled-style');
                                        status.html('<?php echo e(get_string('yes')); ?>');
                                        toastr.success(msg);
                                    },
                                    error:function(msg){
                                        toastr.error(msg.responseJSON);
                                    }
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>