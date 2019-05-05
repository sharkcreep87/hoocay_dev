
<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['my_account']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta name="description" content="<?php echo e($static_data['site_settings']['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['site_settings']['site_name']); ?>" />
    <meta property="og:image" content="<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bg'); ?>
    <?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row  marginalized">
        <div class="col-sm-12">
            <h1 class="section-title-dark"><?php echo e($static_data['strings']['update_profile']); ?></h1>
        </div>
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
               <!-- <div class="col-sm-12 col-md-6">
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
                </div>-->
                     <div class="col-md-6 col-sm-12">
                   
                        <div class="input-group">
                            
                        <input type="checkbox" name="terms" required/> &nbsp;&nbsp;&nbsp;I have agree with  <a href="https://hoocay.com/page/terms-of-use" > &nbsp;Terms&nbsp; </a> and Conditions from hoocay.
               
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
        <?php if(count($bookings)): ?>
            <div class="col-sm-12">
                <h3 class="section-type mtop20"><?php echo e($static_data['strings']['bookings']); ?></h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th><?php echo e($static_data['strings']['property']); ?></th>
                            <th><?php echo e($static_data['strings']['start_date']); ?></th>
                            <th><?php echo e($static_data['strings']['end_date']); ?></th>
                            <th><?php echo e($static_data['strings']['guest_number']); ?></th>
                            <th><?php echo e($static_data['strings']['total']); ?></th>
                            <th><?php echo e($static_data['strings']['completed']); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php if($booking->property_id): ?> <?php echo e($booking->property->contentload->name); ?> <?php else: ?> <?php echo e($booking->service->contentDefault->name); ?> <?php endif; ?></td>
                                <td><?php echo e($booking->start_date); ?></td>
                                <td><?php echo e($booking->end_date); ?></td>
                                <td><?php echo e($booking->guest_number); ?></td>
                                <td><?php echo e($booking->total); ?> <?php echo e($currency); ?></td>
                                <td class="booking-status"><?php echo e($booking->completed ? $static_data['strings']['yes'] : $static_data['strings']['no']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <!-- Modal -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e($static_data['strings']['confirm_action']); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
             
                    <div class="form-group">
        <label class="col-xs-3 control-label">Terms of use</label>
        <div class="col-xs-9">
            <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                <p>
7.1.1   When creating a Listing through the Hoocay Platform you must (i) provide complete and accurate information about your Host Service (such as listing description, location, and calendar availability), (ii) disclose any deficiencies, restrictions (such as house rules) and requirements that apply (such as any minimum age, proficiency or fitness requirements for an Experience) and (iii) provide any other pertinent information requested by Hoocay. You are responsible for keeping your Listing information (including calendar availability) up-to-date at all times.
</p>
                <p>7.1.2    You are solely responsible for setting a price for your Listing (“Listing Fee”). Once a Guest requests a booking of your Listing, you may not request that the Guest pays a higher price than in the booking request.</p>
                <p>7.1.3    Any terms and conditions included in your Listing, in particular in relation to cancellations, must not conflict with these Terms or the relevant cancellation policy for your Listing.</p>
                <p>7.1.4    Pictures, animations or videos (collectively, "Images") used in your Listings must accurately reflect the quality and condition of your Host Services. Hoocay reserves the right to require that Listings have a minimum number of Images of a certain format, size and resolution.</p>
                <p>7.1.5    The placement and ranking of Listings in search results on the Hoocay Platform may vary and depend on a variety of factors, such as Guest search parameters and preferences, Host requirements, price and calendar availability, number and quality of Images, customer service and cancellation history, Reviews and Ratings, type of Host Service, and/or ease of booking.</p>
                <p>7.1.6    When you accept a booking request by a Guest, you are entering into a legally binding agreement with the Guest and are required to provide your Host Service(s) to the Guest as described in your Listing when the booking request is made.</p>
                 <p>7.1.7   Hoocay will not responsible for any booking cancelation made by guest, once listing are booked, all payment (including service fee) will credit to Host Hoocay Accountan and refund will be host responsibility.</p>
                  
            </div>
        </div>
    </div>
 <a href="#" >Read full terms and conditions here</a>
    <div class="form-group">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="checkbox">
                <label>
                     Agree with the terms and conditions?
                </label>
            </div>
        </div>
    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="primary-button" data-dismiss="modal"><?php echo e($static_data['strings']['close']); ?></button>
                    <a href="#" data-id="<?php echo e($static_data['user']->id); ?>" class="primary-button confirm-request" data-dismiss="modal">Agree</a>
                </div>
                <script type="text/javascript">
                var ajaxLoading = false;
                    $(document).ready(function(){

                        $('.confirm-request').click(function(e){
                            e.preventDefault();
                            var id = $(this).data('id'),
                                    token = $('[name="_token"]').val();

                       if(!ajaxLoading) {
            ajaxLoading = true;
                            $.ajax({
                                url: '<?php echo e(url('/user-request')); ?>',
                                type: 'post',
                                data: {_token: token, id: id},
                                success: function(){
                                    var tmp = '<?php echo e($static_data['strings']['text_for_request']); ?>';
                                    $('.request-completed').html('<p class="section-subtitle-light ">' + tmp + '</p>');
                                    ajaxLoading = false;
                                }
                            });
                        });}

                    });

                  


                </script>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>