<?php if($properties->count()): ?>
<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    
    <?php echo $__env->make('home.partials.property', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>