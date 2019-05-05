<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['payments']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?></title>
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
    <div class="row  marginalized justify-content-center">
        <div class="col-sm-12">
            <h1 class="section-title-dark"><?php echo e($static_data['strings']['pay_for_your_book']); ?></h1>
            <?php if(Session::has('activationSuccess')): ?>
                <p class="section-subtitle-light text-centered green-color"><strong><?php echo e($static_data['strings']['account_successfully_activated']); ?></strong></p>
            <?php endif; ?>
        </div>
        <div class="alert alert-warning" role="alert">
  You can cancel your booking thru your profile later, we will fully refund (service charge excluded) your payment if within cancellation period (before 48hours) otherwise please read terms and condition before confirming your booking
</div>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-inverse">
                    <tr>
                        <th><?php echo e(get_string('property')); ?></th>
                        <th><?php echo e(get_string('start_date')); ?></th>
                        <th><?php echo e(get_string('end_date')); ?></th>
                        <th><?php echo e(get_string('guest_number')); ?></th>
                        <th><?php echo e(get_string('total')); ?></th>
                        <th>Cleaning Fees</th>
                        <th>Service Charge</th>
                        <th><?php echo e(get_string('grand_total')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($property); ?></td>
                            <td><?php echo e($start_date); ?></td>
                            <td><?php echo e($end_date); ?></td>
                            <td><?php echo e($guest_number); ?></td>
                            <td><?php echo e($currency.' '.number_format($total, 2)); ?></td>
                            <td><?php echo e($currency.' '.number_format($fees, 2)); ?></td>
                            <td><?php echo e($currency.' '.number_format($charge, 2)); ?></td>
                            <td><?php echo e($currency.' '.number_format($grand_total, 2)); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-12">
            <?php echo Form::open(['method' => 'post', 'url' => route('booking_pay'), 'id' => 'payment-form']); ?>

                <div class="form-group  <?php echo e($errors->has('gateway') ? 'has-error' : ''); ?>">
                    <?php echo e(Form::select('gateway', ['2' => 'Online Banking','0' => 'Paypal'], null, ['class' => 'form-control', 'id' => 'type', 'required', 'placeholder' => $static_data['strings']['choose_payment_method']] )); ?>

                    <?php if($errors->has('gateway')): ?>
                        <span class="wrong-error">* <?php echo e($errors->first('gateway')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="stripe-payment hidden">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p> <?php echo e($static_data['strings']['enter_your_payment_details']); ?></p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div id="card-element"></div>
                            <div id="card-errors"></div>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::hidden('user_id', $user_id)); ?>

                <?php echo e(Form::hidden('owner_id', $owner_id)); ?>

                <?php echo e(Form::hidden('property_id', $property_id)); ?>

                <?php echo e(Form::hidden('property_name', $property)); ?>

                <?php echo e(Form::hidden('start_date', $start_date)); ?>

                <?php echo e(Form::hidden('end_date', $end_date)); ?>

                <?php echo e(Form::hidden('phone', $phone)); ?>

                <?php echo e(Form::hidden('email', $email)); ?>

                <?php echo e(Form::hidden('guest_number', $guest_number)); ?>

                <?php echo e(Form::hidden('first_name', $first_name)); ?>

                <?php echo e(Form::hidden('SC', $charge)); ?>

                <button class="primary-button mtop20" type="submit" name="action"><?php echo e($static_data['strings']['book_now']); ?></button>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#type").change(function(){
                var value = $(this).find("option:selected").val();
                var selector = $('.stripe-payment');
                switch (value){
                    case '1': selector.removeClass('hidden'); break;
                    default: selector.addClass('hidden'); break;
                }
            });
            var stripe = Stripe('<?php echo e(get_setting('stripe_public_api_key', 'payment')); ?>');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#34495e',
                    lineHeight: '24px',
                    fontFamily: 'PT Sans',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#34495e'
                    }
                },
                invalid: {
                    color: '#D32F2F',
                    iconColor: '#D32F2F'
                }
            };
            var classes = {
                base: 'form-control',
            };
            var card = elements.create('card', {style: style, classes:classes});
            card.mount('#card-element');
            card.addEventListener('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if(!$('.stripe-payment').hasClass('hidden')){
                    stripe.createToken(card).then(function(result) {
                        if (result.error) {
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            stripeTokenHandler(result.token);
                        }
                    });
                }else{
                    form.submit();
                }
            });
            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>