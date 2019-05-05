<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?php echo e($static_data['site_settings']['site_name']); ?></title>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta name="description" content="<?php echo e($static_data['site_settings']['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($static_data['site_settings']['site_keywords']); ?>">
    <meta name="author" content="<?php echo e($static_data['site_settings']['site_name']); ?>">
    <meta property="og:title" content="<?php echo e($static_data['site_settings']['site_name']); ?>" />
    <meta property="og:image" content="<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,700,900&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/plugins/tether.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/plugins/bootstrap.min.css')); ?>">
    <link href="<?php echo e(URL::asset('assets/css/plugins/toast.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/plugins/slick.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/plugins/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/home_style.css')); ?>">
    <?php if($static_data['site_settings']['google_analytics']): ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo e($static_data['site_settings']['google_analytics']); ?>', 'auto');
            ga('send', 'pageview');

        </script>
    <?php endif; ?>
    <?php echo $custom_css; ?>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '290917401626021');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=290917401626021&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->



<script>
  fbq('track', 'Lead');
</script>

<script>
  fbq('track', 'CompleteRegistration');
</script>


</head>
<body>

<div class="wrapper">
    <div class="container-fluid header-container" <?php if($static_data['design_settings']['slider_background']): ?> style="background-image: url('<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['slider_background']); ?>')" <?php endif; ?>>
        <div id="top" class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <span class="top-text"><?php echo e($static_data['strings']['opt_welcome_text']); ?> <?php if($static_data['user'] ): ?><?php echo e($static_data['user']->username); ?><?php else: ?><?php echo e($static_data['strings']['guest']); ?><?php endif; ?></span>
                        <ul class="top-social">
                           <?php if($static_data['design_settings']['show_social_top_bar']): ?>
                           <?php if($static_data['site_settings']['social_facebook']): ?> <li><a href="<?php echo e($static_data['site_settings']['social_facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li> <?php endif; ?>
                           <?php if($static_data['site_settings']['social_twitter']): ?> <li><a href="<?php echo e($static_data['site_settings']['social_twitter']); ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                           <?php if($static_data['site_settings']['social_youtube']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_youtube']); ?>"  target="_blank"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
                           <?php if($static_data['site_settings']['social_instagram']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
                           <?php if($static_data['site_settings']['social_google_plus']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_google_plus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                           <?php if($static_data['site_settings']['social_pinterest']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_pinterest']); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
                           <?php if($static_data['site_settings']['social_linkedin']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
                           <?php if($static_data['site_settings']['social_tripadvisor']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_tripadvisor']); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li><?php endif; ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <ul class="top-menu">
                            <?php if($static_data['user'] && $static_data['user']->role->id == 2): ?> <li><a href="<?php echo e(route('owner_dashboard')); ?>"><i class="fa fa-tachometer"></i> <?php echo e($static_data['strings']['dashboard']); ?></a></li> <?php endif; ?>
                            <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('register')); ?>"><a href=<?php echo e(route('register')); ?>><!--<i class="fa fa-plus-circle"></i> <?php echo e($static_data['strings']['register']); ?></a></li>-->
                            <?php else: ?><li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-power-off red-color"></i> <?php echo e($static_data['strings']['logout']); ?></a></li><?php endif; ?>
                            <?php if($static_data['user'] && $static_data['user']->role->id == 3): ?><li class="<?php echo e(setActive('my-account')); ?>"><a href="https://hoocay.com/user-profile"><i class="fa fa-user"></i> <?php echo e($static_data['strings']['my_account']); ?></a></li>
                           <?php endif; ?>
                            <?php if(count($static_data['languages']) > 1): ?>
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-language"></i>
                                    <?php if(Session::has('language')): ?>
                                    <?php $__currentLoopData = $static_data['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if(Session::get('language')): ?>
                                            <?php if(strpos(Session::get('language'), $language->code) !== false): ?>
                                                <?php echo e($language->language); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php else: ?>
                                        <?php echo e($default_language->language); ?>

                                    <?php endif; ?>
                                </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="language-dropdown">
                                        <?php $__currentLoopData = $static_data['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <a class="dropdown-item language-switcher" data-code="<?php echo e($language->code); ?>" href="#"><?php echo e($language->language); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </div>
                                </li>
                                    <?php echo csrf_field(); ?>

                             <?php endif; ?>
                             <?php if(count($currencies) > 1): ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-usd"></i>
                                        <?php echo e(currency()->getUserCurrency()); ?>

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="language-dropdown">
                                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <a class="dropdown-item currency-switcher" data-code="<?php echo e($currency['code']); ?>" href="#"><?php echo e($currency['symbol']); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-phantom" class="hidden"></div>
        <div id="header" class="row sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div id="logo">
                        <a href="<?php echo e(url('/')); ?>"><img class="img-fluid" src="<?php echo e(URL::asset('assets/images/home/logo.png')); ?>"/></a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <ul class="main-menu">
                            <li class="active"><a href="<?php echo e(route('home')); ?>"><?php echo e($static_data['strings']['home']); ?></a></li>
                            <?php if(get_setting('services_allowed', 'service')): ?><li>
                                <a class="dropdown-toggle" id="explore-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($static_data['strings']['explore']); ?></a>
                                <div class="dropdown-menu" aria-labelledby="explore-dropdown">
                                    <a href="<?php echo e(route('explore_properties')); ?>"><div class="dropdown-item"><?php echo e($static_data['strings']['properties']); ?></div></a>
                                    <a href="<?php echo e(route('explore_services')); ?>"><div class="dropdown-item"><?php echo e($static_data['strings']['services']); ?></div></a>
                                </div>
                            </li>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('explore_properties')); ?>"><?php echo e($static_data['strings']['properties']); ?></a></li>
                            <?php endif; ?>
                           <!-- <li>
                                <a class="dropdown-toggle" id="properties-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($static_data['strings']['locations']); ?></a>
                                <div class="dropdown-menu" aria-labelledby="properties-dropdown">
                                    <?php $__currentLoopData = $static_data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <a href="<?php echo e(url('/location').'/'.$location->alias); ?>"><div class="dropdown-item"><?php echo e($location->contentload->location); ?></div></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>
                            </li>
                          <!---  <li>
                                <a class="dropdown-toggle" id="categories-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($static_data['strings']['categories']); ?></a>
                                <div class="dropdown-menu" aria-labelledby="categories-dropdown">
                                    <?php $__currentLoopData = $static_data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <a href="<?php echo e(url('/category').'/'.$category->alias); ?>"><div class="dropdown-item"><?php echo e($category->contentload->name); ?></div></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>
                            </li>
                        <!-- <li><a href="#"><?php echo e($static_data['strings']['owners']); ?></a></li> -->
                            <?php if($static_data['site_settings']['allow_blog']): ?> <li class="<?php echo e(setActive('blog')); ?>"><a href="<?php echo e(route('blog')); ?>"><?php echo e($static_data['strings']['blog']); ?></a></li><?php endif; ?>
                            <!--<li class="<?php echo e(setActive('contact')); ?>"><a href="<?php echo e(route('contact')); ?>"><?php echo e($static_data['strings']['contact']); ?></a></li>-->
                            <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('login')); ?>"><a href="<?php echo e(route('login')); ?>" class="white-button"><?php echo e($static_data['strings']['sign_in']); ?></a></li><?php endif; ?>
                             <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('register')); ?>"><a href="<?php echo e(route('register')); ?>" class="white-button">Register As Guest</a></li><?php endif; ?>
                            <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('register_owner')); ?>"><a href="<?php echo e(route('register_owner')); ?>" class="white-button">Become a Host</a></li><?php endif; ?>
                             <?php if($static_data['user'] && $static_data['user']->role->id == 2): ?><li class="<?php echo e(setActive('owner/property/create')); ?>"><a href="<?php echo e(route('owner.property.create')); ?>" class="white-button"><?php echo e($static_data['strings']['add_your_property']); ?></a></li><?php endif; ?>
                         
                       
                          <!--  <?php if($static_data['user'] && $static_data['user']->role->id == 3 && $owner_request): ?><li><a class="white-button request-upgrade" data-toggle="modal" data-target="#upgrade-confirm-modal" ><?php echo e($static_data['strings']['add_your_property']); ?></a></li><?php endif; ?>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 hidden-md-up">
                <a href="#" class="mobile-menu-button"><i class="fa fa-bars"></i></a>
            </div>
            <div class="mobile-menu">
                <ul class="mobile-main-menu">
                    <li class="active"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> <?php echo e($static_data['strings']['home']); ?></a></li>
                    <?php if(get_setting('services_allowed', 'service')): ?><li>
                        <a class="dropdown-toggle" id="explore-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-binoculars"></i> <?php echo e($static_data['strings']['explore']); ?></a>
                        <div class="dropdown-menu" aria-labelledby="explore-dropdown">
                            <a href="<?php echo e(route('explore_properties')); ?>"><div class="dropdown-item"><?php echo e($static_data['strings']['properties']); ?></div></a>
                            <a href="<?php echo e(route('explore_services')); ?>"><div class="dropdown-item"><?php echo e($static_data['strings']['services']); ?></div></a>
                        </div>
                    </li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('explore_properties')); ?>"><i class="fa fa-building"></i> <?php echo e($static_data['strings']['properties']); ?></a></li>
                    <?php endif; ?>
                   <!-- <li>
                        <a class="dropdown-toggle" id="properties-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-map-o"></i> <?php echo e($static_data['strings']['locations']); ?></a>
                        <div class="dropdown-menu" aria-labelledby="properties-dropdown">
                            <?php $__currentLoopData = $static_data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <a href="<?php echo e(url('/location').'/'.$location->alias); ?>"><div class="dropdown-item"><?php echo e($location->contentload->location); ?></div></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-toggle" id="categories-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cube"></i> <?php echo e($static_data['strings']['categories']); ?></a>
                        <div class="dropdown-menu" aria-labelledby="categories-dropdown">
                            <?php $__currentLoopData = $static_data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <a href="<?php echo e(url('/category').'/'.$category->alias); ?>"><div class="dropdown-item"><?php echo e($category->contentload->name); ?></div></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    </li>-->
                <!-- <li><a href="#"><?php echo e($static_data['strings']['owners']); ?></a></li> -->
                    <?php if($static_data['site_settings']['allow_blog']): ?> <li class="<?php echo e(setActive('blog')); ?>"><a href="<?php echo e(route('blog')); ?>"><i class="fa fa-newspaper-o"></i> <?php echo e($static_data['strings']['blog']); ?></a></li><?php endif; ?>
                    <!--<li class="<?php echo e(setActive('contact')); ?>"><a href="<?php echo e(route('contact')); ?>"><i class="fa fa-envelope"></i> <?php echo e($static_data['strings']['contact']); ?></a></li>-->
                     <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('register')); ?>"><a href="<?php echo e(route('register')); ?>"> <i class="fa fa-user"></i>  Register As Guest</a></li><?php endif; ?>
                    <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('login')); ?>"><a href="<?php echo e(route('login')); ?>"> <i class="fa fa-user"></i> <?php echo e($static_data['strings']['sign_in']); ?></a></li><?php endif; ?>
                    <?php if(!$static_data['user']): ?><li class="<?php echo e(setActive('register_owner')); ?>"><a href="<?php echo e(route('register_owner')); ?>"> <i class="fa fa-user"></i> Become a Host</a></li><?php endif; ?>
                   <?php if($static_data['user']): ?><li class="<?php echo e(setActive('owner/property/create')); ?>"><a href="<?php echo e(route('owner.property.create')); ?>" class="white-button"><?php echo e($static_data['strings']['add_your_property']); ?></a></li><?php endif; ?>
                    <?php if($static_data['user'] && $static_data['user']->role->id == 3 && $owner_request): ?><li><a class="white-button request-upgrade" data-toggle="modal" data-target="#upgrade-confirm-modal" ><?php echo e($static_data['strings']['add_your_property']); ?></a></li><?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="container" id="slider">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="slider-heading">Homestay?</h1><h1 class="slider-heading1">Hoocay</h1><h1 class="slider-heading">je lah</h1>
                    <h4 class="slider-subheading"><?php echo e($static_data['strings']['opt_slider_subheading']); ?></h4>
                    <?php echo Form::open(['method' => 'post', 'url' => route('search'), 'id' => 'slider-search-form']); ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="slider-box">
                                    <div class="form-group not-after">
                                        <input type="text" value="" name="keyword" class="form-control slider-field" placeholder="<?php echo e($static_data['strings']['keywords']); ?> ...">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="" readonly class="form-control slider-field" placeholder="<?php echo e($static_data['strings']['choose_your_location']); ?>">
                                        <input type="hidden" name="location_id" value="0" class="form-control slider-hidden hidden" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        <ul class="dropdown-slider-menu">
                                            <li data-id="" data-name="<?php echo e($static_data['strings']['all']); ?>">
                                                <a href="#" class="location_id_picker">
                                                    <i class="fa fa-map-marker"></i>
                                                    <span><?php echo e($static_data['strings']['all']); ?></span>
                                                </a>
                                            </li>
                                            <?php $__currentLoopData = $static_data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($location->id); ?>" data-name="<?php echo e($location->contentload->location); ?>">
                                                    <a href="#">
                                                        <i class="fa fa-map-marker"></i>
                                                        <span><?php echo e($location->contentload->location); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" readonly class="form-control slider-field" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        <input type="hidden" name="category_id" value="0" class="form-control slider-hidden hidden" placeholder="<?php echo e($static_data['strings']['choose_your_category']); ?>">
                                        <ul class="dropdown-slider-menu">
                                            <li data-id="" data-name="<?php echo e($static_data['strings']['all']); ?>">
                                                <a href="#" class="category_id_picker">
                                                    <i class="fa fa-th-large"></i>
                                                    <span><?php echo e($static_data['strings']['all']); ?></span>
                                                </a>
                                            </li>
                                            <?php $__currentLoopData = $static_data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li data-id="<?php echo e($category->id); ?>" data-name="<?php echo e($category->contentload->name); ?>">
                                                    <a href="#">
                                                        <i class="fa fa-th-large"></i>
                                                        <span><?php echo e($category->contentload->name); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </ul>
                                    </div>
                                      <!--  <div class="form-group">
                                        <input type="text" readonly class="form-control slider-field" placeholder="How many guest?">
                                      
                                        <ul class="dropdown-slider-menu">
                                          
                                          <?php for($i = 1; $i <= 30; $i++): ?>
                                                <li data-id="<?php echo e($i); ?>" data-name="<?php echo e($i); ?>">
                                                    <a href="#">
                                                        <i class="fa fa-users"></i>
                                                        <span><?php echo e($i); ?></span>
                                                          <input type="hidden" name="guest" value='<?php echo e($i); ?>' class="form-control slider-hidden hidden" placeholder="How many guess?">
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                            
                                        </ul>
                                    </div>-->
                                    <button type="submit" class="primary-button"><i class="fa fa-search"></i> <?php echo e($static_data['strings']['search']); ?></button>
                                </div>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
                <div id="scroll-down" class="col-sm-12 text-centered">
                    <a class="scroll-down-button" href="#first-section"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="discover-more"></div>
                </div>
            </div>
        </div>
    </div>
    <?php if($static_data['design_settings']['show_featured_locations']): ?>
    <div id="first-section" class="container-fluid first-section">
        <div class="container first-container">
            <div class="row">
                <div class="col-sm-12 mbot20">
                    <h2 class="section-title-dark"><?php echo e($static_data['strings']['opt_fl_heading']); ?></h2>
                    <p class="section-description-dark"><?php echo e($static_data['strings']['opt_fl_subheading']); ?></p>
                </div>
                <?php $__currentLoopData = $f_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="featured-location box-shadow">
                            <div class="inner bg-overlay">
                                <a href="<?php echo e(url('/location') .'/'. $location->alias); ?>">
                                    <img src="<?php echo e(url('/') .'/'. $location->home_image); ?>" class="responsive-img">
                                    <h1 class="title"><?php echo e($location->contentload->location); ?></h1>
                                    <div class="hover-overlay">
                                        <div class="hover-overlay-inner"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($static_data['design_settings']['show_featured_properties']): ?>
    <div class="container-fluid second-section">
        <div class="container second-container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title-dark"><?php echo e($static_data['strings']['opt_fp_heading']); ?></h2>
                    <p class="section-description-dark"><?php echo e($static_data['strings']['opt_fp_subheading']); ?></p>
                </div>
            </div>
            <div class="row">
                <div id="featured-properties" class="col-sm-12 items-grid">
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    
                        <?php echo $__env->make('home.partials.property_grid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div>
            <div class="col-sm-12 text-centered">
                <div class="dots-navigation-1"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($static_data['design_settings']['show_quick_boxes']): ?>
    <div class="container-fluid third-section bg-overlay" <?php if($static_data['design_settings']['qs_background']): ?> style="background-image: url('<?php echo e(URL::asset('/assets/images/home/').'/'.$static_data['design_settings']['qs_background']); ?>')" <?php endif; ?>>
        <div class="container third-container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title-light"><?php echo e($static_data['strings']['opt_qs_heading']); ?></h2>
                    <p class="section-description-light"><?php echo e($static_data['strings']['opt_qs_subheading']); ?></p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="quick-boxes">
                        <div class="heading-number">1.</div>
                        <div class="main-heading"><?php echo e($static_data['strings']['opt_qs_box1_head']); ?></div>
                        <div class="main-subheading"><?php echo e($static_data['strings']['opt_qs_box1_sub']); ?></div>
                        <div class="description"><?php echo e($static_data['strings']['opt_qs_box1_text']); ?></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="quick-boxes">
                        <div class="heading-number">2.</div>
                        <div class="main-heading"><?php echo e($static_data['strings']['opt_qs_box2_head']); ?></div>
                        <div class="main-subheading"><?php echo e($static_data['strings']['opt_qs_box2_sub']); ?></div>
                        <div class="description"><?php echo e($static_data['strings']['opt_qs_box2_text']); ?></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="quick-boxes">
                        <div class="heading-number">3.</div>
                        <div class="main-heading"><?php echo e($static_data['strings']['opt_qs_box3_head']); ?></div>
                        <div class="main-subheading"><?php echo e($static_data['strings']['opt_qs_box3_sub']); ?></div>
                        <div class="description"><?php echo e($static_data['strings']['opt_qs_box3_text']); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($static_data['design_settings']['show_blog_section'] && $static_data['site_settings']['allow_blog']): ?>
    <div class="container-fluid fourth-section">
        <div class="container fourth-container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title-dark"><?php echo e($static_data['strings']['opt_lb_heading']); ?></h2>
                    <p class="section-description-dark"><?php echo e($static_data['strings']['opt_lb_subheading']); ?></p>
                </div>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="items-grid col-md-4 col-sm-12">
                    <div class="item box-shadow">
                        <div class="main-image bg-overlay">
                            <img class="responsive-img" src="<?php echo e(url('/').$post->image); ?>"/>
                        </div>
                        <div class="data">
                            <a href="<?php echo e(url('/blog/post').'/'.$post->alias); ?>"><h3 class="item-title primary-color"><?php echo e($post->contentload->title); ?></h3></a>
                            <div class="item-category"><?php echo str_limit(strip_tags($post->contentload->content), 120); ?></div>
                            <div class="small-text"><?php echo e($static_data['strings']['posted_by']); ?> : <?php echo e($post->user->username); ?> | <?php echo e($post->created_at); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <div class="col-sm-12 mtop20 text-centered"><a href="<?php echo e(route('blog')); ?>" class="black-button"><?php echo e($static_data['strings']['view_all_blog_posts']); ?></a></div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($static_data['design_settings']['show_icons_section']): ?>
    <div class="container-fluid fifth-section">
        <div class="container fifth-container">
            <div id="icon-boxes" class="row">
                <div class="col-md-6 col-sm-12 mbot20">
                    <div class="icon"><i class="fa <?php echo e($static_data['design_settings']['is_icon1_icon']); ?> 2x primary-color"></i></div>
                    <div class="title"><?php echo e($static_data['design_settings']['is_icon1_head']); ?></div>
                    <div class="description"><?php echo e($static_data['design_settings']['is_icon1_text']); ?></div>
                </div>
                <div class="col-md-6 col-sm-12 mbot20">
                    <div class="icon"><i class="fa <?php echo e($static_data['design_settings']['is_icon2_icon']); ?> 2x primary-color"></i></div>
                    <div class="title"><?php echo e($static_data['design_settings']['is_icon2_head']); ?></div>
                    <div class="description"><?php echo e($static_data['design_settings']['is_icon2_text']); ?></div>
                </div>
                <div class="col-md-6 col-sm-12 mtop20">
                    <div class="icon"><i class="fa <?php echo e($static_data['design_settings']['is_icon4_icon']); ?> 2x primary-color"></i></div>
                    <div class="title"><?php echo e($static_data['design_settings']['is_icon3_head']); ?></div>
                    <div class="description"><?php echo e($static_data['design_settings']['is_icon3_text']); ?></div>
                </div>
                <div class="col-md-6 col-sm-12 mtop20">
                    <div class="icon"><i class="fa <?php echo e($static_data['design_settings']['is_icon4_icon']); ?> 2x primary-color"></i></div>
                    <div class="title"><?php echo e($static_data['design_settings']['is_icon4_head']); ?></div>
                    <div class="description"><?php echo e($static_data['design_settings']['is_icon4_text']); ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="container-fluid footer-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 footer-widgets">
                <h2 class="widget-title"><?php echo e($static_data['strings']['about_us']); ?></h2>
                <p><?php echo e($static_data['strings']['opt_site_description']); ?></p>
            </div>
            <div class="col-md-3 col-sm-12 footer-widgets">
                <h2 class="widget-title"><?php echo e($static_data['strings']['opt_footer_menu1_head']); ?></h2>
                <ul class="footer-menu">
                    <li><a href="<?php echo e($static_data['design_settings']['footer_menu1_link1']); ?>"><?php echo e($static_data['strings']['opt_footer_menu1_text1']); ?></a></li>
                    <li><a href="<?php echo e($static_data['design_settings']['footer_menu1_link2']); ?>"><?php echo e($static_data['strings']['opt_footer_menu1_text2']); ?></a></li>
                    <li><a href="<?php echo e($static_data['design_settings']['footer_menu1_link3']); ?>"><?php echo e($static_data['strings']['opt_footer_menu1_text3']); ?></a></li>
                    <li><a href="<?php echo e($static_data['design_settings']['footer_menu1_link4']); ?>"><?php echo e($static_data['strings']['opt_footer_menu1_text4']); ?></a></li>
                    <!--<li><a href="<?php echo e($static_data['design_settings']['footer_menu1_link5']); ?>"><?php echo e($static_data['strings']['opt_footer_menu1_text5']); ?></a></li> -->                   </ul>
            </div>
            <div class="col-md-3 col-sm-12 footer-widgets">
                <h2 class="widget-title"><?php echo e($static_data['strings']['opt_footer_menu2_head']); ?></h2>
                <ul class="footer-menu">
                   <!-- <li><a href="<?php echo e($static_data['design_settings']['footer_menu2_link1']); ?>"><?php echo e($static_data['strings']['opt_footer_menu2_text1']); ?></a></li>-->
                    <li><a href="<?php echo e($static_data['design_settings']['footer_menu2_link2']); ?>"><?php echo e($static_data['strings']['opt_footer_menu2_text2']); ?></a></li>
                    <li><a href="<?php echo e($static_data['design_settings']['footer_menu2_link5']); ?>">News</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 footer-widgets">
                <h2 class="widget-title"><?php echo e($static_data['strings']['contact']); ?></h2>
                <ul class="footer-menu">
                    <?php if($static_data['site_settings']['location_address'] || $static_data['site_settings']['location_city'] || $static_data['site_settings']['location_country']): ?><li><a href="#"><i class="fa fa-home"></i> <?php echo e($static_data['site_settings']['location_address'].', '.$static_data['site_settings']['location_city'].', '.$static_data['site_settings']['location_state'].' - '.$static_data['site_settings']['location_country']); ?></a></li><?php endif; ?>
                    <?php if($static_data['site_settings']['contact_tel1']): ?><li><a href="tel:<?php echo e($static_data['site_settings']['contact_tel1']); ?>"><i class="fa fa-phone"></i> <?php echo e($static_data['site_settings']['contact_tel1']); ?></a></li><?php endif; ?>
                    <?php if($static_data['site_settings']['contact_tel2']): ?><li><a href="tel:<?php echo e($static_data['site_settings']['contact_tel2']); ?>"><i class="fa fa-phone"></i> <?php echo e($static_data['site_settings']['contact_tel2']); ?></a></li><?php endif; ?>
                    <?php if($static_data['site_settings']['contact_fax']): ?><li><a href="tel:<?php echo e($static_data['site_settings']['contact_fax']); ?>"><i class="fa fa-fax"></i><?php echo e($static_data['site_settings']['contact_fax']); ?></a></li><?php endif; ?>
                    <?php if($static_data['site_settings']['contact_email']): ?><li><a href="mailto:<?php echo e($static_data['site_settings']['contact_email']); ?>"><i class="fa fa-envelope"></i><?php echo e($static_data['site_settings']['contact_email']); ?></a></li><?php endif; ?>
                    <?php if($static_data['site_settings']['contact_web']): ?><li><a href="<?php echo e($static_data['site_settings']['contact_web']); ?>"><i class="fa fa-globe"></i> <?php echo e($static_data['site_settings']['contact_web']); ?></a></li><?php endif; ?>
                </ul>
            </div>
            <?php if($static_data['design_settings']['footer_social']): ?>
                <div class="col-sm-12 footer-divider"></div>
                <div class="col-sm-12 footer-social footer-widgets">
                    <h2 class="widget-title"><?php echo e($static_data['strings']['follow_us']); ?></h2>
                    <ul class="social-icons">
                        <?php if($static_data['site_settings']['social_facebook']): ?> <li><a href="<?php echo e($static_data['site_settings']['social_facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li> <?php endif; ?>
                        <?php if($static_data['site_settings']['social_twitter']): ?> <li><a href="<?php echo e($static_data['site_settings']['social_twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                        <?php if($static_data['site_settings']['social_youtube']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_youtube']); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
                        <?php if($static_data['site_settings']['social_instagram']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
                        <?php if($static_data['site_settings']['social_google_plus']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_google_plus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                        <?php if($static_data['site_settings']['social_pinterest']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_pinterest']); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
                        <?php if($static_data['site_settings']['social_linkedin']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
                        <?php if($static_data['site_settings']['social_tripadvisor']): ?>  <li><a href="<?php echo e($static_data['site_settings']['social_tripadvisor']); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row copyright-row">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 copyright">
                    <p><?php echo e($static_data['strings']['copyright'] . date('Y') . ' ' . $static_data['strings']['rights_reserved'] . get_setting('site_name', 'site')); ?></p>
                </div>
                <div class="col-sm-6 powered-by">
                    <p><?php echo $static_data['strings']['powered_by']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo e(URL::asset('assets/js/plugins/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/tether.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/slick.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/slidereveal.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/toast.min.js')); ?>"></script>
<script type="text/javascript">
    window.paceOptions = {
        ajax: false,
        restartOnRequestAfter: false,
    };
</script>
<script src="<?php echo e(URL::asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/home_init.js')); ?>"></script>
<script type="text/javascript">
</script>
<?php echo csrf_field(); ?>

<?php if($static_data['user'] && $owner_request): ?>
<div class="modal fade" id="upgrade-confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e($static_data['strings']['confirm_action']); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo e($static_data['strings']['upgrade_request_confirm']); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="primary-button" data-dismiss="modal"><?php echo e($static_data['strings']['close']); ?></button>
                <a href="#" data-id="<?php echo e($static_data['user']->id); ?>" class="primary-button confirm-request" data-dismiss="modal"><?php echo e($static_data['strings']['request']); ?></a>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.confirm-request').click(function(e){
                        e.preventDefault();
                        var id = $(this).data('id'),
                            token = $('[name="_token"]').val();
                        $.ajax({
                            url: '<?php echo e(url('/user-request')); ?>',
                            type: 'post',
                            data: {_token: token, id: id},
                               success: function(){
                               toastr.success('<?php echo e($static_data['strings']['text_for_request']); ?>');
                                setTimeout(function(){location.reload();}, 1200);

                        }
                    });
                });
                });
            </script>
        </div>
    </div>
</div>
<?php endif; ?>
</body>
</html>