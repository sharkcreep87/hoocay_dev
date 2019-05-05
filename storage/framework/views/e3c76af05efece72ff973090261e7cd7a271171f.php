<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('booksi')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('booksi')); ?></h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mbot0">
        <div class="col s12">
            <div class="col s12">
                <ul class="booksi-menu">
                    <li>Script Name: <strong>Booksi</strong></li>
                    <li>Version: <strong><?php echo e(config('app.version')); ?></strong></li>
                    <li>Author: <a href="http://abxweb.com"><strong><?php echo e(config('app.author')); ?></strong></a></li>
                    <li>Contact: <a href="mailto:<?php echo e(config('app.contact')); ?>"><strong><?php echo e(config('app.contact')); ?></strong></a></li>
                    <li>Website: <a href="<?php echo e(config('app.website')); ?>"><strong><?php echo e(config('app.website')); ?></strong></a></li>
                    <li>Documentation: <a href="<?php echo e(config('app.documentation')); ?>"><strong><?php echo e(config('app.documentation')); ?></strong></a></li>
                    <li>Support: <a href="<?php echo e(config('app.support')); ?>"><strong><?php echo e(config('app.support')); ?></strong></a></li>
                    <li>Market: <a href="<?php echo e(config('app.market')); ?>"><strong><?php echo e(config('app.market')); ?></strong></a></li>
                    <li><strong>Contact us if you need any customization, we are happy to help you out. Thank you for using our script!</strong></li>
                    <li><strong>Please note that for any copyright infringement we will take legal action!</strong></li>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>