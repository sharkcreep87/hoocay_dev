

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
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($review->id); ?>" />
                            <label for="<?php echo e($review->id); ?>"></label>
                        </td>
                        <td><?php if($review->user): ?><?php echo e($review->user->username); ?><?php else: ?> <i class="small material-icons color-red">clear</i> <?php endif; ?></td>
                        <td><?php echo e(str_limit($review->review, 50, '...')); ?> <a href="#review-modal" data-toggle="modal" data-id="<?php echo e($review->id); ?>" class="more-button"><i class="small material-icons color-primary">add</i></a></td>
                        <td><?php if($review->property_id && $review->property): ?><?php echo e($review->property->contentDefault->name); ?><?php elseif($review->service_id && $review->service): ?><?php echo e($review->service->contentDefault->name); ?><?php else: ?><i class="small material-icons color-red">clear</i> <?php endif; ?></td>
                        <td class="review-status"><?php echo e($review->status ? get_string('approved') : get_string('pending')); ?></td>
                        <td><?php for($i = 0; $i < $review->rating; $i++) echo '<i class="small material-icons color-yellow">grade</i>' ?></td>
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
            $('.more-button').click(function(){
                var id = $(this).data('id');
                var token = $('.token').val();
                $.ajax({
                    url: '<?php echo e(url('/owner/review/getReview')); ?>/'+id,
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>