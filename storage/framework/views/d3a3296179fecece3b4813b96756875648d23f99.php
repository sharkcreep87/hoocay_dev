
<?php $max_price = get_setting('price_range_max', 'property') ?>
<?php $__env->startSection('title'); ?>
    <title><?php echo e($static_data['strings']['search_results']); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta name="description" content="<?php echo e($static_data['site_settings']['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['site_settings']['site_name']); ?>" />
    <meta property="og:image" content="<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/plugins/nouislider.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/plugins/jquery-ui.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bg'); ?>
    <?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row header-tabs">
        <div class="col-sm-12">
            <ul class="nav nav-tabs" id="header-tabs">
                <?php if(isset($properties) && count($properties)): ?><li class="nav-item"><a class="nav-link active" href="#accordion-properties" data-toggle="tab" aria-expanded="true"><i class="fa fa-building-o"></i><span><?php echo e($static_data['strings']['properties']); ?></span></a></li><?php endif; ?>
                <?php if(isset($services) && count($services)): ?><li class="nav-item"><a class="nav-link <?php if(!count($properties)): ?> active <?php endif; ?>" href="#accordion-services" data-toggle="tab" aria-expanded="false"><i class="fa fa-cutlery"></i><span><?php echo e($static_data['strings']['services']); ?></span></a></li><?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="row marginalized">
        <div class="col-sm-12">
            <h1 class="section-title-dark"><?php echo e($static_data['strings']['search_results']); ?></h1>
            <div class="tab-content">
                <div class="tab-pane active" id="accordion-properties" role="tabpanel">
                    <div class="row">
                        <?php if(count($properties)): ?>
                            <div class="col-sm-12">
                                <h3 class="section-type text-uppercase"><?php echo e($static_data['strings']['properties']); ?></h3>
                            </div>
                            <div class="col-sm-12 filter-box">
                                <?php echo Form::open(['method' => 'post', 'url' => route('search')]); ?>

                                    <div class="form-group not-after">
                                        <div class="input-group">
                                            <span class="fa fa-font input-group-addon"></span>
                                            <input type="text" value="" name="keyword" class="form-control slider-field" placeholder="<?php echo e($static_data['strings']['keywords']); ?> ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="fa fa-map-marker input-group-addon"></span>
                                            <input type="text" readonly name="location_id_value" class="form-control filter-field" placeholder="<?php echo e($static_data['strings']['choose_your_location']); ?>">
                                        </div>
                                        <input type="hidden" name="location_id" value="0" class="form-control filter-hidden hidden" placeholder="<?php echo e($static_data['strings']['choose_your_location']); ?>">
                                        <ul class="dropdown-filter-menu">
                                            <li data-id="" data-name="<?php echo e($static_data['strings']['all']); ?>">
                                                <a href="#" class="location_id_picker">
                                                    <span><?php echo e($static_data['strings']['all']); ?></span>
                                                </a>
                                            </li>
                                            <?php $__currentLoopData = $static_data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($location->id); ?>" data-name="<?php echo e($location->contentload->location); ?>">
                                                    <a href="#" class="location_id_picker">
                                                        <span><?php echo e($location->contentload->location); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="fa fa-map-marker input-group-addon"></span>
                                            <input type="text" readonly name="category_id_value" class="form-control filter-field" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        </div>
                                        <input type="hidden" name="category_id" value="0" class="form-control filter-hidden hidden" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        <ul class="dropdown-filter-menu">
                                            <li data-id="" data-name="<?php echo e($static_data['strings']['all']); ?>">
                                                <a href="#" class="category_id_picker">
                                                    <span><?php echo e($static_data['strings']['all']); ?></span>
                                                </a>
                                            </li>
                                            <?php $__currentLoopData = $static_data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($category->id); ?>" data-name="<?php echo e($category->contentload->name); ?>">
                                                    <a href="#" class="category_id_picker">
                                                        <span><?php echo e($category->contentload->name); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>

                                    

                                    <button type="submit" class="primary-button"><i class="fa fa-search"></i> <?php echo e($static_data['strings']['search']); ?></button>
                                <?php echo Form::close(); ?>

                            </div>
                            <div id="filtered-properties" class="row">
                                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    
                                    <?php echo $__env->make('home.partials.property', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        <?php else: ?>
                            <?php if(!count($properties) && !count($services)): ?><div class="col-sm-12 text-centered"><strong class="center-align"><?php echo e($static_data['strings']['no_results']); ?></strong></div><?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(get_setting('services_allowed', 'service')): ?>
                    <div class="tab-pane <?php if(!count($properties)): ?> active <?php endif; ?>" id="accordion-services" role="tabpanel">
                        <div class="row">
                            <?php if(isset($services) && count($services)): ?>
                                <div class="col-sm-12 mbot10"><h3 class="section-type text-uppercase"><?php echo e($static_data['strings']['services']); ?></h3></div>
                                <div class="col-sm-12 filter-box">
                                    <?php echo Form::open(['method' => 'post', 'url' => route('search')]); ?>

                                    <div class="form-group not-after">
                                        <div class="input-group">
                                            <span class="fa fa-font input-group-addon"></span>
                                            <input type="text" value="" name="keyword" class="form-control slider-field" placeholder="<?php echo e($static_data['strings']['keywords']); ?> ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="fa fa-map-marker input-group-addon"></span>
                                            <input type="text" readonly name="location_id_value" class="form-control filter-field" placeholder="<?php echo e($static_data['strings']['choose_your_location']); ?>">
                                        </div>
                                        <input type="hidden" name="location_id" value="0" class="form-control filter-hidden hidden" placeholder="<?php echo e($static_data['strings']['choose_your_location']); ?>">
                                        <ul class="dropdown-filter-menu">
                                            <li data-id="" data-name="<?php echo e($static_data['strings']['all']); ?>">
                                                <a href="#" class="location_id_picker">
                                                    <span><?php echo e($static_data['strings']['all']); ?></span>
                                                </a>
                                            </li>
                                            <?php $__currentLoopData = $static_data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($location->id); ?>" data-name="<?php echo e($location->contentload->location); ?>">
                                                    <a href="#" class="location_id_picker">
                                                        <span><?php echo e($location->contentload->location); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="fa fa-map-marker input-group-addon"></span>
                                            <input type="text" readonly name="category_id_value" class="form-control filter-field" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        </div>
                                        <input type="hidden" name="category_id" value="0" class="form-control filter-hidden hidden" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        <ul class="dropdown-filter-menu">
                                            <li data-id="" data-name="<?php echo e($static_data['strings']['all']); ?>">
                                                <a href="#" class="category_id_picker">
                                                    <span><?php echo e($static_data['strings']['all']); ?></span>
                                                </a>
                                            </li>
                                            <?php $__currentLoopData = $static_data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($category->id); ?>" data-name="<?php echo e($category->contentload->name); ?>">
                                                    <a href="#" class="category_id_picker">
                                                        <span><?php echo e($category->contentload->name); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                    <button type="submit" class="primary-button"><i class="fa fa-search"></i> <?php echo e($static_data['strings']['search']); ?></button>
                                    <?php echo Form::close(); ?>

                                </div>
                        </div>
                        <div class="row" id="filtered-services">
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php echo $__env->make('home.partials.service_grid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home_layout', ['static_data', $static_data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>