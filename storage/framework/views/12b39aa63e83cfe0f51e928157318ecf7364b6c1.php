<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('withdrawals') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>

    <h3 class="page-title mbot10"><?php echo e(get_string('withdrawals')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if($withdrawals->count()): ?>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div class="table-responsive">
            <table class="table bordered striped" id="myTable">
                <thead class="thead-inverse">
                <tr>
                  
                    <th><?php echo e(get_string('username')); ?></th>
                    <th>Recipt Number</th>
                    <th><?php echo e(get_string('payment_method')); ?></th>
                    <th><?php echo e(get_string('amount')); ?></th>
                    <th>Status</th>
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="<?php echo e($withdrawal->status ? 'disabled-style' : ''); ?>">
                     
                        <td><?php if($withdrawal->user): ?><?php echo e($withdrawal->user->username); ?><?php endif; ?></td>
                        <td><?php echo e($withdrawal->ref_no); ?></td>
                        <td><?php echo e($withdrawal->method); ?></td>
                        <td><?php echo e($withdrawal->amount); ?> <?php echo e($currency); ?></td>
                        <td class="request-status"><?php echo e($withdrawal->status ? 'Paid' : 'Processing'); ?></td>
                        <td>
                         <div class="icon-options">
                            <a href="#user-modal" data-toggle="modal" class="user-info" data-id="<?php echo e($withdrawal->id); ?>" title="<?php echo e(get_string('user_info')); ?>"><i class="small material-icons color-blue">person</i></a>
                        
                            <a href="#" class="dismiss-button" data-id="<?php echo e($withdrawal->id); ?>"><i class="small material-icons color-red">clear</i></a>
                            <a href="#" class="delete-button" data-id="<?php echo e($withdrawal->id); ?>"><i class="small material-icons color-red">delete</i></a>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($withdrawals->links()); ?>

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
              
                    <a href="#!" class="btn btn-danger" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                    <a href="" id="printLink" target="_blank" class="btn btn-warning" >Print</a>
                     <?php if($withdrawals->count()): ?>
                      <a href="#" class="confirm-button waves-effect btn btn-default" data-id="<?php echo e($withdrawal->id); ?>" data-dismiss="modal">Paid</a>
                      <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script>

    //search function
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
        $(document).ready(function(){





            var confirmid;
            $("#user-modal").on('hidden.bs.modal', function () {
                $('#user-details').html('');
            });

            $('.user-info').click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
          
                $("#printLink").attr("href", '<?php echo e(url('/admin/generatePDF')); ?>/'+ id);

                confirmid = id;
                var token = $('.token').val();
                $.ajax({
                    url: '<?php echo e(url('/admin/owner/withdrawal/details')); ?>/' + id,
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
                                    url: '<?php echo e(url('/admin/owner/withdrawal/complete/')); ?>/' + id,
                                    type: 'post',
                                    data: {_token: token},
                                    success: function (msg) {
                                        selector.addClass('disabled-style');
                                        status.html('Paid');
                                        toastr.success(msg);
                                        location.reload();
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
                                url: '<?php echo e(url('/admin/owner/withdrawal/delete')); ?>/'+id,
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