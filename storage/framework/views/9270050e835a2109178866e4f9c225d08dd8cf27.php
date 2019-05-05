<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('payments') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('payments')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if($payments->count()): ?>
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
                    <th><?php echo e(get_string('owner')); ?></th>
                    <th><?php echo e(get_string('payment_method')); ?></th>
                    <th><?php echo e(get_string('transaction')); ?></th>
                    <th><?php echo e(get_string('total')); ?></th>
                 
                 
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($payment->id); ?>" />
                            <label for="<?php echo e($payment->id); ?>"></label>
                        </td>
                        <td><?php if($payment->property_id && $payment->property): ?> <?php echo e($payment->property->contentDefault->name); ?> <?php else: ?> <i class="small material-icons color-red">clear</i> <?php endif; ?> </td>
                        <td><?php if($payment->user && $payment->user_id): ?> <?php echo e($payment->user->username); ?> <?php else: ?> <i class="small material-icons color-red">clear</i> <?php endif; ?> </td>
                        <td><?php if($payment->owner && $payment->owner_id): ?> <?php echo e($payment->owner->username); ?> <?php else: ?> <i class="small material-icons color-red">clear</i> <?php endif; ?> </td>
                        <td><?php echo e($payment->payment_method); ?></td>
                        <td><?php echo e($payment->transaction); ?></td>
                        <td><?php echo e($currency); ?> <?php echo e(number_format($payment->total , 2, '.', ',')); ?> </td>
                      
                      
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($payments->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<input type="hidden" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div id="user-modal" class="modal not-summernote fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                    <strong class="modal-title"><?php echo e(get_string('user_info')); ?></strong>
                </div>
                <div class="modal-body" id="user-details"></div>
                <div class="modal-footer">
                    <a href="#!" class="waves-effect btn btn-default" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#user-modal").on('hidden.bs.modal', function () {
            $('#user-details').html('');
        });
        $('.user-info').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var token = $('.token').val();
            $.ajax({
                url: '<?php echo e(url('/owner/list-payment/details')); ?>/' + id,
                type: 'post',
                data: {_token: token},
                success: function (msg) {
                    $('#user-details').html(msg);
                },
                error: function (msg) {
                    toastr.error(msg.responseJSON);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>