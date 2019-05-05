

<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('activities') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('activities')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if($activities->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th><?php echo e(get_string('activity')); ?></th>
                    <th><?php echo e(get_string('item')); ?></th>
                    <th><?php echo e(get_string('points')); ?></th>
                    <th><?php echo e(get_string('date')); ?></th>
                    <th><?php echo e(get_string('end_date')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($activity->id); ?>" />
                            <label for="<?php echo e($activity->id); ?>"></label>
                        </td>
                        <td><?php echo e($activity->activity); ?></td>
                        <td><?php if($activity->property_id && $activity->property): ?> <?php echo e($activity->property->contentDefault->name); ?> <?php elseif($activity->service): ?> <?php echo e($activity->service->contentDefault->name); ?> <?php endif; ?></td>
                        <td><?php echo e($activity->points); ?></td>
                        <td><?php echo e(date(get_setting('dateformat', 'site'), strtotime($activity->created_at))); ?></td>
                        <td><?php echo e(date(get_setting('dateformat', 'site'), strtotime($activity->end_date))); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($activities->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<input type="hidden" class="token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>