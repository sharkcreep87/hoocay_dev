
<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['post'] .' - '. $post->contentload->title); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['strings']['post'] .' - '. $post->contentload->title); ?>">
    <meta name="description" content="<?php echo e(strip_tags(str_limit($post->contentload->content, 200))); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['strings']['post'] .' - '. $post->contentload->title); ?>" />
    <meta property="og:image" content="<?php echo e(url('images/data').'/'.$post->image); ?>" />
    <meta property="og:description" content="<?php echo e(strip_tags(str_limit($post->contentload->content, 200))); ?>" />
<?php $__env->stopSection(); ?>
<?php 
    $share_links = Share::load(Request::fullUrl(), $post->contentload->title)->services('facebook', 'gplus', 'twitter', 'pinterest', 'email', 'reddit', 'linkedin');
?>
<?php $__env->startSection('bg'); ?>
    <?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row  marginalized">
            <div class="col-sm-12">
            <h1 class="section-title-dark"><?php echo e($post->contentload->title); ?></h1>
            <p class="meta-data"><?php if($post->user): ?><?php echo e($static_data['strings']['posted_by'].': '.$post->user->username); ?> <?php endif; ?> <?php echo e(' | '.$post->created_at); ?></p>
            <div class="row">
                <div class="post-image col-md-4 col-sm-12">
                    <img class="img-fluid" src="<?php echo e($post->image); ?>"/>
                </div>
                <div class="col-md-8 col-sm-12"><?php echo $post->contentload->content; ?></div>
                <div class="col-sm-12">
                    <div class="social-buttons">
                        <h3 class="section-type"><?php echo e($static_data['strings']['share']); ?> - <?php echo e($post->contentload->title); ?></h3>
                        <a href="<?php echo e($share_links['facebook']); ?>" target="_blank" class="primary-color"><i class="fa fa-facebook-official"></i></a>
                        <a href="<?php echo e($share_links['twitter']); ?>" target="_blank" class="primary-color"> <i class="fa fa-twitter-square"></i></a>
                        <a href="<?php echo e($share_links['gplus']); ?>" target="_blank" class="primary-color"><i class="fa fa-google-plus-square"></i></a>
                        <a href="<?php echo e($share_links['pinterest']); ?>" target="_blank" class="primary-color"><i class="fa fa-pinterest-square"></i></a>
                        <a href="<?php echo e($share_links['reddit']); ?>" target="_blank" class="primary-color"><i class="fa fa-reddit-square"></i></a>
                        <a href="<?php echo e($share_links['linkedin']); ?>" target="_blank" class="primary-color"><i class="fa fa-linkedin-square"></i></a>
                        <a href="<?php echo e($share_links['email']); ?>" target="_blank" class="primary-color"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>