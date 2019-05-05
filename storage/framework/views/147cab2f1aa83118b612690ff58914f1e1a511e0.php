<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('faq')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('faq')); ?></h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mbot0">
        <div class="col s12">
            <div class="col s12">
                <ul class="collapsible collapsible-accordion">
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <div class="collapsible-header"><span><?php echo e($faq->contentDefault->question); ?></span><i class="material-icons small accordion-active">remove_circle</i><i class="material-icons small accordion-disabled">add_circle</i></div>
                        <div class="collapsible-body">
                            <?php echo e($faq->contentDefault->answer); ?>

                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>