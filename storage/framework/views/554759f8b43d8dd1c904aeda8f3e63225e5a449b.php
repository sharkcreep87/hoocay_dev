

<?php $__env->startSection('title'); ?>
<title><?php echo e(get_string('dashboard') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('page_title'); ?>
        <h3 class="page-title mbot10"><?php echo e(get_string('dashboard')); ?></h3>
    <?php $__env->stopSection(); ?>
        <?php $__env->startSection('content'); ?>
            <div class="row mbot0">
                <?php if(true): ?>
                 <?php if(Session::has('payment_status')): ?> <?php $status = Session::get('payment_status'); ?>
                    <div class="col s12">
                        <div class="col s12 text-centered">
                            <h5 class="<?php if(!$status['status']): ?> color-red <?php else: ?> color-primary <?php endif; ?>"><?php echo e($status['msg']); ?></h5>
                        </div>
                    </div>
                 <?php endif; ?>
                <div class="col s12">
                    <div class="col l3 m6 s12">
                        <div class="card">
                            <div class="card-content no-padding">
                                <div class="blue-card card-stats-body waves-effect">
                                    <div class="stats-icon right-align">
                                        <i class="medium material-icons">payment</i>
                                    </div>
                                    <div class="stats-text left-align">
                                        <strong class="counter"><?php echo e($data['properties']); ?></strong><br>
                                        <span><?php echo e(get_string('properties')); ?></span>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>
                   <div class="col l3 m6 s12">
                        <div class="card">
                            <div class="card-content no-padding">
                                <div class="blue-card card-stats-body waves-effect">
                                    <div class="stats-icon right-align">
                                        <i class="medium material-icons">attach_money</i>
                                    </div>
                                    <div class="stats-text left-align">
                                        <strong class="counter"><?php echo e(number_format($data['pending_balance'], 2, '.', ',')); ?></strong> <?php echo e($currency); ?><br>
                                        <span><?php echo e(get_string('pending_balance')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l3 m6 s12">
                        <div class="card">
                            <div class="card-content no-padding">
                                <div class="blue-card card-stats-body waves-effect">
                                    <div class="stats-icon right-align">
                                        <i class="medium material-icons">attach_money</i>
                                    </div>
                                    <div class="stats-text left-align">
                                        <strong class="counter"> <?php echo e(number_format($data['active_balance'] , 2, '.', ',')); ?></strong> <?php echo e($currency); ?><br>
                                        <span>Available Balance</span>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>

                     <div class="col l3 m6 s12">
                        <div class="card">
                            <div class="card-content no-padding">
                                <div class="blue-card card-stats-body waves-effect">
                                    <div class="stats-icon right-align">
                                        <i class="medium material-icons">attach_money</i>
                                    </div>
                                    <div class="stats-text left-align">
                                        <strong class="counter"><?php echo e(number_format($withdraw, 2, '.', ',')); ?></strong> <?php echo e($currency); ?><br>
                                        <span>Total Paid</span>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>
                    <div class="col l3 m6 s12">
                        <div class="card">
                            <div class="card-content no-padding">
                                <div class="blue-card card-stats-body waves-effect">
                                    <div class="stats-icon right-align">
                                        <i class="medium material-icons">extension</i>
                                    </div>
                                    <div class="stats-text left-align">
                                        <strong class="counter"><?php echo e($data['points']); ?></strong><br>
                                        <span><?php echo e(get_string('points')); ?></span>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l6 m12 s12">
                <h3 class="page-title"><?php echo e(get_string('latest_bookings')); ?></h3>
                <?php if(count($bookings)): ?>
                <div class="table-responsive">
                <table id="latest-bookings" class="responsive-table bordered striped">
                    <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th><?php echo e(get_string('property')); ?></th>
                        <th><?php echo e(get_string('start_date')); ?></th>
                        <th><?php echo e(get_string('end_date')); ?></th>
                        <th><?php echo e(get_string('guest_number')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in primary-color" id="<?php echo e($booking->id); ?>" />
                                    <label for="<?php echo e($booking->id); ?>"></label>
                                </td>
                                <td><?php if($booking->property_id && $booking->property): ?> <?php echo e($booking->property->contentDefault->name); ?> <?php elseif($booking->service): ?> <?php echo e($booking->service->contentDefault->name); ?> <?php endif; ?></td>
                                <td><?php echo e($booking->start_date); ?></td>
                                <td><?php echo e($booking->end_date); ?></td>
                                <td><?php echo e($booking->guest_number); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
                </div>
                <?php else: ?>
                <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
                <?php endif; ?>
            </div>
            <div class="col l6 m12 s12">
                <h3 class="page-title"><?php echo e(get_string('latest_purchases')); ?></h3>
                <?php if(count($purchases)): ?>
                <div class="table-responsive">
                <table id="latest-purchases" class="responsive-table bordered striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th><?php echo e(get_string('points_purchased')); ?></th>
                            <th><?php echo e(get_string('price')); ?></th>
                            <th><?php echo e(get_string('transaction')); ?></th>
                            <th><?php echo e(get_string('date_of_purchase')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in primary-color" id="<?php echo e($purchase->id); ?>" />
                                    <label for="<?php echo e($purchase->id); ?>"></label>
                                </td>
                                <td><?php echo e($purchase->points); ?></td>
                                <td><?php echo e($purchase->price); ?> <?php echo e($currency); ?></td>
                                <td><?php echo e($purchase->transaction); ?></td>
                                <td><?php echo e(date(get_setting('dateformat', 'site'), strtotime($purchase->created_at))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                    </div>
                <?php else: ?>
                    <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
                <?php endif; ?>
            <?php else: ?>
                <?php if(Session::has('payment_status')): ?> <?php $status = Session::get('payment_status'); ?>
                        <div class="col s12">
                            <div class="col s12 text-centered">
                                <h5 class="<?php if(!$status['status']): ?> color-red <?php else: ?> color-primary <?php endif; ?>"><?php echo e($status['msg']); ?></h5>
                                <p><?php echo e(get_string('redirected_to_dashboard')); ?></p>
                            </div>
                            <?php Session::pull('payment_status') ?>
                            <script type="text/javascript">
                                setTimeout(function(){window.location = '/owner/dashboard'}, 4000);
                            </script>
                        </div>
                <?php else: ?>
                <div class="col s12">
                    <div class="col s12"><p><?php echo e(get_string('entrance_fee_text')); ?></p>
                    <?php echo Form::open(['method' => 'post', 'url' => route('owner_payment'), 'id' => 'payment-form']); ?>

                        <strong> <?php echo e(get_string('entrance_fee') . ' ' . get_string('is')); ?>: <?php echo e(get_setting('entrance_fee', 'payment') .' '. get_string('points')); ?></strong>
                        <div class="form-group  <?php echo e($errors->has('package') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('package', $packages, null, ['class' => 'form-control', 'required', 'placeholder' => get_string('choose_your_package')])); ?>

                            <?php if($errors->has('package')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('package')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group  <?php echo e($errors->has('gateway') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('gateway', $gateways, null, ['class' => 'form-control', 'id' => 'type', 'required', 'placeholder' => get_string('choose_payment_method')])); ?>

                            <?php if($errors->has('gateway')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('gateway')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="stripe-payment hidden">
                            <div class="row">
                                <div class="col s12">
                                    <p> <?php echo e(get_string('enter_your_payment_details')); ?></p>
                                </div>
                                <div class="col s6">
                                    <div id="card-element"></div>
                                    <div id="card-errors"></div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::hidden('user_id', Auth::user()->id)); ?>

                        <button class="btn waves-effect" type="submit" name="action"><?php echo e(get_string('buy_points')); ?></button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        $(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>