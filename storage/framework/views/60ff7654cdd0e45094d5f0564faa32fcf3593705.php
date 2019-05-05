

<?php $__env->startSection('title'); ?>
    <title>Transaction</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10">Transaction History</h3>
<?php $__env->stopSection(); ?>


<div class="col s12">
    <?php if($trans->count()): ?>
        <div class="table-responsive">
            <table class="table bordered striped ">
                <thead class="thead-inverse">
                <tr>
                    
                    <th>Date Created</th>
                    <th>Transaction Number</th>

                    <th>Description</th>
                    <th>Amount</th>
                  

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        
                   
                        <td><?php echo e($transaction->created_at); ?> </td>
                        <td><?php echo e($transaction->ref_no); ?> </td>
                             <td><?php echo e($transaction->description); ?></td>
                        <td class="table-danger">RM <?php echo e($transaction->amount); ?></td>

                       
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($trans->links()); ?>

    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>