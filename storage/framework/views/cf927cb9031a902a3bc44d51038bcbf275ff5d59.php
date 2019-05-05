
<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['blog']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['strings']['blog']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta name="description" content="<?php echo e($static_data['site_settings']['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['strings']['blog']); ?> - <?php echo e($static_data['site_settings']['site_name']); ?>" />
    <meta property="og:image" content="<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bg'); ?>
    <?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row  marginalized">
        <div class="col-sm-12">
            <h1 class="section-title-dark"><?php echo e($static_data['strings']['blog']); ?></h1>
            <div class="row">
            <?php if($posts->count()): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="items-grid col-md-4 col-sm-12">
                        <div class="item box-shadow">
                            <div class="main-image bg-overlay">
                                <img class="responsive-img" src="<?php echo e(url('/').$post->image); ?>"/>
                            </div>
                            <div class="data">
                                <a href="<?php echo e(url('/blog/post').'/'.$post->alias); ?>"><h3 class="item-title primary-color"><?php echo e($post->contentload->title); ?></h3></a>
                                <div class="item-category"><?php echo str_limit(strip_tags($post->contentload->content), 120); ?></div>
                                <?php if($post->user): ?><div class="small-text"><?php echo e($static_data['strings']['posted_by']); ?> : <?php echo e($post->user->username); ?> | <?php echo e($post->created_at); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php echo e($posts->links()); ?>

                <?php else: ?>
                    <div class="col-sm-12"><strong class="center-align"><?php echo e($static_data['strings']['no_results']); ?></strong></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>