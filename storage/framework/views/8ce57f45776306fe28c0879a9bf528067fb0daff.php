<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('withdrawals') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('withdrawals')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col l6 m4 s12 right right-align mbot10">
<?php if(!is_null($owner->payment_method)): ?>
    <a href="#request-modal" data-toggle="modal"  class="btn waves-effect"> <?php echo e(get_string('request_withdrawal')); ?></a>
    <?php endif; ?>
      <a href="#request-paymnet-info" data-toggle="modal"  class="btn waves-effect warning"> Update Payment Info</a>
</div>
<?php if(is_null($owner->payment_method)): ?>
   <span class="wrong-error">* Please update your payment info to withdraw</span>
    <?php endif; ?>
<?php if(!$errors->isEmpty()): ?>
    <span class="wrong-error">* <?php echo e(get_string('validation_error')); ?></span>
<?php endif; ?>
<?php if(Session::has('withdrawal_request')): ?>
    <span class="wrong-error">* <?php echo e(get_string('not_enough_balance')); ?></span>
<?php endif; ?>
<div class="col s12">
    <?php if($withdrawals->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th><?php echo e(get_string('username')); ?></th>
                    <th>Recipt Number</th>
                    <th><?php echo e(get_string('payment_method')); ?></th>
                    <th><?php echo e(get_string('amount')); ?></th>
                    <th>Status</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="<?php echo e($withdrawal->completed ? 'disabled-style' : ''); ?>">
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($withdrawal->id); ?>" />
                            <label for="<?php echo e($withdrawal->id); ?>"></label>
                        </td>
                        <td><?php if($withdrawal->user): ?><?php echo e($withdrawal->user->username); ?><?php endif; ?></td>
                         <td><?php echo e($withdrawal->ref_no); ?></td>
                        <td><?php echo e($withdrawal->method); ?></td>
                        <td><?php echo e($currency); ?> <?php echo e(number_format($withdrawal->amount , 2, '.', ',')); ?> </td>
                        <td class="request-status"><?php echo e($withdrawal->status ? 'Paid' : 'Processing'); ?></td>
                      
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
     <div id="request-paymnet-info" class="modal not-summernote fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                    <strong class="modal-title">Update Payment Info</strong>
                </div>
                
                <div class="modal-body" id="user-details">
                    <?php echo Form::open(['method' => 'post', 'url' => route('update_payment')]); ?>

                    <div class="form-group">
                        <?php echo Form::select('method', ['2' => 'Please select payment method','0' => 'Bank Transfer', '1' => 'Paypal',], 2, ['class' => 'form-control','id' => 'pay_method', 'required']); ?>

                    </div>
                 
                   <div class="form-group">
                        <?php echo Form::select('bank', ['' => 'Select Bank Name','Maybank' => 'Maybank', 'CIMB Bank Berhad' => 'CIMB Bank Berhad',
                       'RHB Bank Berhad' => 'RHB Bank Berhad',
                       'Affin Bank Berhad' => 'Affin Bank Berhad',
                       'Alliance Bank Malaysia Berhad' => 'Alliance Bank Malaysia Berhad',
                       'AmBank (M) Berhad' => 'AmBank (M) Berhad',
                       'Citibank Berhad' => 'Citibank Berhad',
                       'HSBC Bank Malaysia Berhad' => 'HSBC Bank Malaysia Berhad',
                       'Hong Leong Bank Berhad' => 'Hong Leong Bank Berhad',
                       'OCBC Bank (Malaysia) Berhad' => 'OCBC Bank (Malaysia) Berhad',
                       'Public Bank Berhad' => 'Public Bank Berhad',
                       'Standard Chartered Bank Malaysia Berhad' => 'Standard Chartered Bank Malaysia Berhad',
                       'United Overseas Bank (Malaysia) Bhd' => 'United Overseas Bank (Malaysia) Bhd'
                        ], 0, ['class' => 'form-control','id' => 'Bank', 'required']); ?>

                    </div>
                     <div class="form-group">
                        <?php echo Form::text('acct_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Account Name','id' => 'acct_name']); ?>

                    </div>
                     <div class="form-group">
                        <?php echo Form::text('acct_no', null, ['class' => 'form-control', 'required', 'placeholder' => 'Account Number','id' => 'acct_no']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Email' ,'id' => 'email']); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="waves-effect btn btn-default" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                    <button type="submit" name="action" class="waves-effect btn btn-default"><?php echo e(get_string('submit')); ?></button>
                </div>
                    <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

    <div id="request-modal" class="modal not-summernote fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                    <strong class="modal-title"><?php echo e(get_string('request_withdrawal')); ?></strong>
                                 <div class="alert alert-warning" role="alert">
  Noted. Your withdrawal will be process and it take 3 working days to be credited to your bank account.
</div>

                </div>

                <div class="modal-body" id="user-details">
                    <?php echo Form::open(['method' => 'post', 'url' => route('request_withdrawal')]); ?>

                  <div class="row">
                        <div class="col-md-6">
                        <br>
                            <h6><strong>Payment Method</strong></h6>
                            <p>
                               <?php echo e($owner->payment_method); ?>

                            </p>
                            <?php if($owner->payment_method == 'Bank Transfer'): ?>
                            <h6><strong>Bank Name</strong></h6>
                            <p>
                                    <?php echo e($owner->bank); ?>

                            </p>
                      
                     
                     
                         <h6>  <strong>Account Name</strong></h6>
                          <p> <?php echo e($owner->acct_name); ?></p>
                          <h6>  <strong>Account Number</strong></h6>
                          <p> <?php echo e($owner->acct_no); ?></p>
                          <?php endif; ?>

                          <?php if($owner->payment_method == 'PayPal'): ?>
                            <h6><strong>Paypal Account</strong></h6>
                            <p>
                                    <?php echo e($owner->paypal_acct); ?>

                            </p>

                          <?php endif; ?>

                      </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::number('amount', null, ['class' => 'form-control', 'required', 'min' => 0, 'placeholder' => get_string('amount')]); ?>

                    </div>
                
                  
                <div class="modal-footer">
                    <a href="#!" class="waves-effect btn btn-default" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                    <button type="submit" name="action" class="waves-effect btn btn-default"><?php echo e(get_string('submit')); ?></button>
                </div>
                    <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
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
    <script>

        $(document).ready(function(){



            $("#user-modal").on('hidden.bs.modal', function () {
                $('#user-modal #user-details').html('');
            });

            $('.user-info').click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var token = $('.token').val();
                $.ajax({
                    url: '<?php echo e(url('/owner/withdrawal/details')); ?>/' + id,
                    type: 'post',
                    data: {_token: token},
                    success: function (msg) {
                        $('#user-modal #user-details').html(msg);
                    },
                    error: function (msg) {
                        toastr.error(msg.responseJSON);
                    }
                });
            });

         $("#acct_name").css('display', 'none');
          $("#Bank").css('display', 'none');
          $("#acct_no").css('display', 'none');
           $("#email").css('display', 'none');

  $("#pay_method").change(function() {
      if($(this).val() == 1){
      
      	 $("#acct_name").css('display', 'none');
      	  $("#Bank").css('display', 'none');
      	  $("#acct_no").css('display', 'none');
          $("#email").css('display', 'block');


          $("#email").attr('required', true);
    
          $("#Bank").attr('required', false);
          $("#acct_no").attr('required', false);
          $("#acct_name").attr('required', false);

         

      }else{
            $("#acct_name").css('display', 'block');
            $("#Bank").css('display', 'block');
            $("#acct_no").css('display', 'block');
            $("#email").css('display', 'none');


            $("#email").attr('required', false);
     
            $("#Bank").attr('required', true);
            $("#acct_no").attr('required', true);
            $("#acct_name").attr('required', true);
      }
  });


        }


);
    
      
        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>