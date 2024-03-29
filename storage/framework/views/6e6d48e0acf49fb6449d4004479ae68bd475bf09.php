

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('purchases') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('purchases')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if($purchases->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th><?php echo e(get_string('points_purchased')); ?></th>
                    <th><?php echo e(get_string('price')); ?></th>
                    <th><?php echo e(get_string('transaction')); ?></th>
                    <th><?php echo e(get_string('payment_method')); ?></th>
                    <th><?php echo e(get_string('date_of_purchase')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr class="<?php echo e($purchase->completed ? 'disabled-style' : ''); ?>">
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($purchase->id); ?>" />
                            <label for="<?php echo e($purchase->id); ?>"></label>
                        </td>
                        <td><?php echo e($purchase->points); ?></td>
                        <td><?php echo e($purchase->price); ?> <?php echo e($currency); ?></td>
                        <td><?php echo e($purchase->transaction); ?></td>
                        <td><?php echo e($purchase->method); ?></td>
                        <td><?php echo e(date(get_setting('dateformat', 'site'), strtotime($purchase->created_at))); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($purchases->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<input type="hidden" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>