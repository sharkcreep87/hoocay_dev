

<?php $__env->startSection('title'); ?>
    <title>Refund</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10">Refund</h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if($refund->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                   
                    <th><?php echo e(get_string('username')); ?></th>
                    <th>Refund_no</th>
                    <th>Booking_no</th>
                    <th><?php echo e(get_string('amount')); ?></th>
                    <th>Status</th>
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $refund; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refunded): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                       
                        <td><?php if($refunded->user): ?><?php echo e($refunded->user->username); ?><?php endif; ?></td>
                        <td><?php echo e($refunded->ref_no); ?></td>
                        <td><?php echo e($refunded->booking_id); ?></td>
                        <td><?php echo e($currency); ?> <?php echo e($refunded->amount); ?> </td>
                        <td class="request-status">
                         <?php if($refunded->status == 0): ?> Pending
                         <?php elseif($refunded->status == 1): ?>Paid

                         <?php elseif($refunded->status == 2): ?>Pending guest confirmation
                         <?php endif; ?>

                         </td>
                        <td>
                         <div class="icon-options">
                            <a href="#user-modal" data-toggle="modal" class="user-info" data-id="<?php echo e($refunded->user_id); ?>" data-ref="<?php echo e($refunded->id); ?>" title="<?php echo e(get_string('user_info')); ?>"><i class="small material-icons color-blue">person</i></a>
                        
                          
                            
                        </div>
                        </td>
                    </tr>
     
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($refund->links()); ?>

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
                     
                    <a href="#!" class="btn btn-danger" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                     <a href="" class="btn btn-warning" id="printLink"  target="_blank">Print</a>
                      <a href="#" class="confirm-button waves-effect btn btn-default" data-dismiss="modal">Paid</a>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<input type="hidden" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

     
    <script>
        $(document).ready(function(){
            var confirmid;
            $("#user-modal").on('hidden.bs.modal', function () {
                $('#user-details').html('');
            });

            $('.user-info').click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var ref = $(this).data('ref');
                confirmid = ref;
                 $("#printLink").attr("href", '<?php echo e(url('/admin/generateRefundPDF')); ?>/'+ ref);
                var token = $('.token').val();
                $.ajax({
                    url: '<?php echo e(url('/admin/owner/refund/details')); ?>/' + id, 
                    type: 'post',
                    data: {_token: token},
                    success: function (msg) {
                        $('#user-details').html(msg);
                    },
                    error: function (msg) {
                        toastr.error("error");
                    }
                });
            });


         

            $('.confirm-button').click(function(event){
                event.preventDefault();
                var id = confirmid;
                var selector = $(this).parents('tr');
                var status = $('.request-status', selector);
                var token = $('.token').val();
                if(!selector.hasClass('disabled-style')) {
                    bootbox.confirm({
                        title: '<?php echo e(get_string('confirm_action')); ?>',
                        message: '<?php echo e(get_string('upgrade_confirm')); ?>',
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
                                    url: '<?php echo e(url('/admin/refund/completed')); ?>/' + id,
                                    type: 'post',
                                    data: {_token: token},
                                    success: function (msg) {
                                        selector.addClass('disabled-style');
                                        $('.request-status', selector).html('Paid');
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
                                url: '<?php echo e(url('/admin/owner/refund/delete')); ?>/'+id,
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
                var status = $('.request-status', selector);
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
                                    url: '<?php echo e(url('/admin/owner/withdrawal/dismiss/')); ?>/'+id,
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