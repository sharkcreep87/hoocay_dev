
<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['my_account']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta name="description" content="<?php echo e($static_data['site_settings']['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['site_settings']['site_name']); ?>" />
    <meta property="og:image" content="<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>" />
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bg'); ?>
    <?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<hr>
<div class="container">
 
    <div class="row m-y-2">
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
               <li class="nav-item">
                    <a href="" data-target="#booking" data-toggle="tab" class="nav-link active">Booking History</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link">Profile</a>
                </li>
             
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#inbox" data-toggle="tab" class="nav-link">Refund Status</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane" id="profile">
                <br>
                    <h4 class="m-y-2">User Profile</h4>
                    <div class="row">
                        <div class="col-md-6">
                        <br>
                            <h6>Username</h6>
                            <p>
                               <?php echo e($static_data['user']->username); ?>

                            </p>
                            <h6>Full Name</h6>
                            <p>
                                   <?php echo e($static_data['user']->user->first_name); ?> <?php echo e($static_data['user']->user->last_name); ?>

                            </p>
                        </div>
                        <div class="col-md-6">
                         <br>
                            <h6>Email</h6>
                          <p><?php echo e($static_data['user']->email); ?></p>
                          <h6>Phone</h6>
                          <p><?php echo e($static_data['user']->user->phone); ?></p>
                        </div>
                       
                    </div>
                    <!--/row-->
                </div>

                 <div class="tab-pane" id="inbox">
                <br>
                    <h4 class="m-y-2"></h4>
                    <div class="row">
                       <?php if(count($refund)): ?>
            <div class="col-sm-12">
                <h3 class="section-type mtop20">Refund Status</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                           
                  
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
                               
                                <td><?php echo e($refunded->ref_no); ?></td>
                               
                                <td><?php echo e($refunded->booking_id); ?></td>
                                <td><?php echo e($currency . ' ' .number_format($refunded->amount, 2)); ?> </td>
                                <td class="booking-status">
                                <?php if($refunded->status == 0): ?>
                                Pending Approval
                                <?php elseif($refunded->status == 1): ?>
                                Processing
                                <?php elseif($refunded->status == 2): ?>
                                Need Verification
                                <?php endif; ?>
                                </td>
                                <td>
                                 <?php if($refunded->status == 1 || $refunded->status == 0): ?>
   
                               
                                <?php else: ?> 
                                 <button href="#user-refund" data-toggle="modal" type="button" class="btn btn-warning refund-info" data-id="<?php echo e($refunded->id); ?>">Verify</button> </td>
                                 <?php endif; ?>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php else: ?> 
             <p>No refund made yet.</p>
        <?php endif; ?>
                       
                    </div>
                    <!--/row-->
                </div>

                    <div class="tab-pane active" id="booking">
                <br>
                    <h4 class="m-y-2"></h4>
                    <div class="row">
                       <?php if(count($bookings)): ?>
            <div class="col-sm-12">
                <h3 class="section-type mtop20"><?php echo e($static_data['strings']['bookings']); ?></h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                           
                  
                     <th><?php echo e($static_data['strings']['property']); ?></th>
                            <th>Booking no</th>
                            <th><?php echo e($static_data['strings']['start_date']); ?></th>
                            <th><?php echo e($static_data['strings']['end_date']); ?></th>
                            <th><?php echo e($static_data['strings']['guest_number']); ?></th>
                            <th><?php echo e($static_data['strings']['total']); ?></th>
                            <th>Status</th>
                        
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                                <td><?php if($booking->property_id): ?> <?php echo e($booking->property->contentload->name); ?> <?php else: ?> <?php echo e($booking->service->contentDefault->name); ?> <?php endif; ?></td>
                                <td><?php echo e($booking->booking_ref); ?></td>
                                <td><?php echo e($booking->start_date); ?></td>
                                <td><?php echo e($booking->end_date); ?></td>
                                <td><?php echo e($booking->guest_number); ?></td>
                                <td><?php echo e($currency . ' ' .number_format($booking->total, 2)); ?> </td>
                                <td class="booking-status">
                                <?php if($booking->completed == 0): ?>
                                Pending
                                <?php elseif($booking->completed == 1): ?>
                                Confirmed
                                <?php elseif($booking->completed == 2): ?>
                                Cancelled
                                <?php elseif($booking->completed == 3): ?>
                                Refunded
                                <?php endif; ?>
                                </td>
                                <td>
                                 <?php if($booking->completed == 3 || $booking->completed == 2): ?>
   
                                <button href="#"  type="button" class="btn btn-danger" disabled>Submited</button> </td>
                                <?php else: ?> 
                                 <button href="#user-modal" data-toggle="modal" type="button" class="btn btn-danger user-info" data-id="<?php echo e($booking->id); ?>">Cancel</button> </td>
                                 <?php endif; ?>

                         


                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php else: ?> 
             <p>No refund made yet.</p>
        <?php endif; ?>
                       
                    </div>
                    <!--/row-->
                </div>
               
              

                
     <div id="user-modal" class="modal not-summernote fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    
                    <strong class="modal-title">Booking Cancel Confirmation </strong>
                </div>
                <div class="modal-body" id="user-details"></div>

                <div class="modal-footer">
              
                    <a href="#!" class="btn btn-danger" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                      <a href="#" class="confirm-button waves-effect btn btn-success" data-id="id" data-dismiss="modal">Confirmed</a>
                </div>
            </div>
        </div>
    </div>

  <div id="user-refund" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add Your Payment Details</h4>
        </div>
    
            <div class="modal-body">
                <label for="bank">Bank Name: </label>
                <input id="bank" name="bank" class="form-control" type="text"/>
                        <label for="bankacct">Bank Account Number: </label>
                <input id="acct_no" name="acct_no" class="form-control" type="text"/>
                        <label for="acct_name">Account Name: </label>
                <input id="acct_name" name="acct_name" class="form-control" type="text"/>

                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="#" class="confirm-refund waves-effect btn btn-success" data-id="id" data-dismiss="modal">Confirmed</a>
            </div>
  
    </div>
</div></div>

        
                <div class="tab-pane" id="edit">
                    <h4 class="m-y-2">Edit Profile</h4>
                 
        <?php if(Session::has('account_updated') ): ?>
            <p class="green-color"><?php echo e($static_data['strings']['account_updated']); ?></p>
        <?php endif; ?>
      
        <div class="col-sm-12 input-style">
            <?php echo Form::open(['method' => 'post', 'url' => route('user_update')]); ?>

            <div class="row">
                <div class="col-sm-12"><p class="section-subtitle-light text-centered"> <?php echo e($static_data['strings']['update_account_info']); ?> </p></div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-address-card-o input-group-addon"></span>
                            <?php echo e(Form::text('first_name', $static_data['user']->user->first_name, ['class' => 'form-control', 'placeholder' => $static_data['strings']['first_name']])); ?>

                        </div>
                        <?php if($errors->has('first_name')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('first_name')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-address-card-o input-group-addon"></span>
                            <?php echo e(Form::text('last_name', $static_data['user']->user->last_name, ['class' => 'form-control', 'placeholder' => $static_data['strings']['last_name']])); ?>

                        </div>
                        <?php if($errors->has('last_name')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('last_name')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-user input-group-addon"></span>
                            <?php echo e(Form::text('username', $static_data['user']->username, ['class' => 'form-control', 'placeholder' => $static_data['strings']['username']])); ?>

                        </div>
                        <?php if($errors->has('username')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('username')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-phone input-group-addon"></span>
                            <?php echo e(Form::text('phone', $static_data['user']->user->phone, ['class' => 'form-control', 'placeholder' => $static_data['strings']['phone']])); ?>

                        </div>
                        <?php if($errors->has('phone')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('phone')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group  <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-envelope input-group-addon"></span>
                            <?php echo e(Form::email('email', $static_data['user']->email, ['class' => 'form-control','readonly', 'placeholder' => $static_data['strings']['email_address']])); ?>

                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-key input-group-addon"></span>
                            <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => $static_data['strings']['password']])); ?>

                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group  <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                        <div class="input-group">
                            <span class="fa fa-key input-group-addon"></span>
                            <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => $static_data['strings']['password_confirmation']])); ?>

                        </div>
                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="wrong-error">* <?php echo e($errors->first('password_confirmation')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                 
                <div class="col-sm-12 text-centered">
                    <?php echo Form::hidden('id', $static_data['user']->id, ['class' => 'hidden']); ?>

                    <button type="submit" name="action" class="primary-button"><?php echo e($static_data['strings']['update']); ?></button>
                          <!--  <?php if($request && get_setting('allow_user_requests', 'owner')): ?>
      
        
            <a href="#" class="primary-button request-upgrade" data-toggle="modal" data-target="#confirm-modal">Request as Host</a>
                <p class="section-subtitle-light "> <?php echo e($static_data['strings']['update_account_request']); ?> </p>
       
        <?php endif; ?>-->
                </div>
          
            </div>
            <?php echo Form::close(); ?>

        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">

     <?php if(!empty($photo)): ?>
            <img src="<?php echo e(URL::asset('images/data').'/'.$photo->image); ?>" class="m-x-auto img-fluid rounded-circle" alt="avatar" height="150px" width="150px">
 <?php else: ?> 

 <img src="<?php echo e(URL::asset('images/user.png')); ?>" class="m-x-auto img-fluid rounded-circle" alt="avatar" height="150px" width="150px">
 <?php endif; ?>
        
                           <?php if($message = Session::get('success')): ?>

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong><?php echo e($message); ?></strong>

        </div>

      

        <?php endif; ?>


     <?php if($message = Session::get('error')): ?>

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                 

                        <li><?php echo e($message); ?></li>

                  

                </ul>

            </div>

        <?php endif; ?>

                      
<br><br>

           <div class="col-md-8">




                

                
                 <?php echo Form::open(['method' => 'post', 'url' => route('photo_upload'),'files'=>true]); ?>

            <label class="custom-file">
  
   <?php echo e(Form::file('images', array('class' => 'custom-file-label','id'=>'upload'))); ?>


  <span class="custom-file-label"></span>
</label>
                   
                    <?php echo e(Form::hidden('id', $static_data['user']->id)); ?>



                </div>
<br>
                <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Upload Photo</button>
                    

                </div>

            </div>

        <?php echo Form::close(); ?>

            
        </div>
    </div>
</div>
<hr>
    </div><!--/row-->
<script>
         $(document).ready(function(){

             var confirmid;
            $("#user-modal").on('hidden.bs.modal', function () {
                $('#user-details').html('');
            });

            $('.refund-info').click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
                confirmid = id;
               
            });

            $('.user-info').click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
                confirmid = id;
                var token = $('.token').val();
                $.ajax({
                    url: '<?php echo e(url('/user/booking/details')); ?>/' + id,
                    type: 'post',
                    data: {_token: "<?php echo e(csrf_token()); ?>"},
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
                                    url: '<?php echo e(url('/user/booking/cancel')); ?>/' + id,
                                    type: 'post',
                                    data: {_token: "<?php echo e(csrf_token()); ?>"},
                                    success: function (msg) {
                                        selector.addClass('disabled-style');
                                        status.html('<?php echo e(get_string('yes')); ?>');
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

                $('.confirm-refund').click(function(event){
                event.preventDefault();
                var id = confirmid;
                 var postData = [];
                                var bank = $('#bank').val();
                                 var acct_no = $('#acct_no').val();
                                var acct_name = $('#acct_name').val();
                              


              
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
                                    url: 'https://hoocay.com/user/refund/confirm',
                                    type: 'post',
                                    data: {_token: "<?php echo e(csrf_token()); ?>",bank:bank,acct_no : acct_no,acct_name:acct_name,id:id},
                                    success: function (msg) {
                                        selector.addClass('disabled-style');
                                        status.html('processing');
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
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>