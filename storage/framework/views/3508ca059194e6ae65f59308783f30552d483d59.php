<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <?php echo $__env->yieldContent('title'); ?>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,500,600,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/plugins/backend_materialize.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/plugins/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/plugins/toast.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/plugins/summernote.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/plugins/dropzone.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/backend_style.css')); ?>" rel="stylesheet">
    <?php if(get_setting('google_analytics', 'site')): ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo e(get_setting('google_analytics', 'site')); ?>', 'auto');
            ga('send', 'pageview');

        </script>
    <?php endif; ?>

    <?php echo $__env->yieldContent('style'); ?>

</head>
<body class="mtop20">

    <div class="container header-container z-depth-1">
        <div class="row no-pad-bot mbot0">
            <nav>
                <div id="header-left" class="col l10 m12 s12 header-col">
                    <div id="logo" class="col s6 m6">
                        <p class="date-text"><?php echo e(date('l, jS \of F Y')); ?></p>
                         <div id="logo">
                        <a href="<?php echo e(url('/')); ?>"><img class="img-fluid" src="<?php echo e(URL::asset('assets/images/home/logo.png')); ?>"  height="70" width="250"/></a>
                        </div>
                    </div>
                    <div id="navigation">
                        <ul class="hide-on-med-and-down clearfix">
                            <li class="<?php echo e(setActive('owner/dashboard')); ?>"><a href="<?php echo e(route('owner_dashboard')); ?>"><?php echo e(get_string('dashboard')); ?></a></li>
                                <?php if(get_setting('show_add_points_menu','payment')): ?><li  class="<?php echo e(setActive('owner/points')); ?>"><a href="<?php echo e(route('owner_points')); ?>" class=""><?php echo e(get_string('add_points')); ?> <i class="material-icons tiny color-white" style="vertical-align: text-top;">add_circle</i></a></li><?php endif; ?>
                                <?php if(get_setting('show_price_menu','payment')): ?><li  class="<?php echo e(setActive('owner/prices')); ?>"><a href="<?php echo e(route('owner_prices')); ?>" class=""><?php echo e(get_string('prices')); ?></a></li><?php endif; ?>
                                <li class="<?php echo e(setActive('owner/property')); ?>"><a href="<?php echo e(route('owner.property.index')); ?>"><?php echo e(get_string('properties')); ?></a></li>
                                <?php if(get_setting('services_allowed', 'service') && get_setting('allow_owners_services', 'owner')): ?><li class="<?php echo e(setActive('owner/service')); ?>"><a href="<?php echo e(route('owner.service.index')); ?>"><?php echo e(get_string('services')); ?></a></li><?php endif; ?>
                                <li  class="<?php echo e(setActive('owner/booking')); ?>"><a href="<?php echo e(route('owner_booking')); ?>"><?php echo e(get_string('bookings')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/review')); ?>"><a href="<?php echo e(route('owner_review')); ?>"><?php echo e(get_string('reviews')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/purchase')); ?>"><a href="<?php echo e(route('owner_purchases')); ?>"><?php echo e(get_string('purchases')); ?></a></li>

                                <?php if(get_setting('enable_messages', 'user')): ?>
                                    <li class="<?php echo e(setActive('owner/message')); ?>"><a href="<?php echo e(route('owner_message')); ?>"><?php echo e(get_string('messages')); ?></a></li>
                                <?php endif; ?>
                                <li  class="<?php echo e(setActive('owner/activity')); ?>"><a href="<?php echo e(route('owner_activities')); ?>"><?php echo e(get_string('activities')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/withdrawal')); ?>"><a href="<?php echo e(route('owner_withdrawal')); ?>"><?php echo e(get_string('withdrawals')); ?></a></li>
                                 <li  class="<?php echo e(setActive('owner/list-payment')); ?>"><a href="<?php echo e(route('owner_list_payment')); ?>"><?php echo e(get_string('payments')); ?></a></li>
                                 <li><a href="<?php echo e(route('owner_transaction')); ?>">Transaction History</a></li>

                                <li  class="<?php echo e(setActive('owner/faq')); ?>"><a href="<?php echo e(route('owner_faq')); ?>"><?php echo e(get_string('faq')); ?></a></li>
                                <li><a href="<?php echo e(route('home')); ?>">Go to webiste</a></li>
                        </ul>
                    </div>
                    <div class="col s6 show-on-small">
                        <ul id="slide-out" class="side-nav">
                            <li class="<?php echo e(setActive('owner/dashboard')); ?>"><a href="<?php echo e(route('owner_dashboard')); ?>"><?php echo e(get_string('dashboard')); ?></a></li>
                                <?php if(get_setting('show_add_points_menu','payment')): ?><li  class="<?php echo e(setActive('owner/points')); ?>"><a href="<?php echo e(route('owner_points')); ?>" class=""><?php echo e(get_string('add_points')); ?> <i class="material-icons tiny color-white" style="vertical-align: text-top;">add_circle</i></a></li><?php endif; ?>
                                <?php if(get_setting('show_price_menu','payment')): ?><li  class="<?php echo e(setActive('owner/prices')); ?>"><a href="<?php echo e(route('owner_prices')); ?>" class=""><?php echo e(get_string('prices')); ?></a></li><?php endif; ?>
                                <li class="<?php echo e(setActive('owner/property')); ?>"><a href="<?php echo e(route('owner.property.index')); ?>"><?php echo e(get_string('properties')); ?></a></li>
                                <?php if(get_setting('services_allowed', 'service') && get_setting('allow_owners_services', 'owner')): ?><li class="<?php echo e(setActive('owner/service')); ?>"><a href="<?php echo e(route('owner.service.index')); ?>"><?php echo e(get_string('services')); ?></a></li><?php endif; ?>
                                <li  class="<?php echo e(setActive('owner/booking')); ?>"><a href="<?php echo e(route('owner_booking')); ?>"><?php echo e(get_string('bookings')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/review')); ?>"><a href="<?php echo e(route('owner_review')); ?>"><?php echo e(get_string('reviews')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/purchase')); ?>"><a href="<?php echo e(route('owner_purchases')); ?>"><?php echo e(get_string('purchases')); ?></a></li>
                                <li class="<?php echo e(setActive('owner/message')); ?>"><a href="<?php echo e(route('owner_message')); ?>"><?php echo e(get_string('messages')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/activity')); ?>"><a href="<?php echo e(route('owner_activities')); ?>"><?php echo e(get_string('activities')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/withdrawal')); ?>"><a href="<?php echo e(route('owner_withdrawal')); ?>"><?php echo e(get_string('withdrawals')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/list-payment')); ?>"><a href="<?php echo e(route('owner_list_payment')); ?>"><?php echo e(get_string('payments')); ?></a></li>
                                <li  class="<?php echo e(setActive('owner/faq')); ?>"><a href="<?php echo e(route('owner_faq')); ?>"><?php echo e(get_string('faq')); ?></a></li>
                            <li class="no-padding">
                                <ul class="collapsible collapsible-accordion">
                                    <li>
                                        <a class="collapsible-header <?php echo e(setActive('owner/my_account')); ?>" href="#"><?php echo e(get_string('my_account')); ?><i class="material-icons tiny">arrow_drop_down</i></a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li class="<?php echo e(setActive('owner/my_account')); ?>"><a href="<?php echo e(route('owner_my_account')); ?>"><?php echo e(get_string('my_account')); ?></a></li>
                                                <li><a href="<?php echo e(route('owner_logout')); ?>"><?php echo e(get_string('logout')); ?></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><?php echo e(get_string('my_website')); ?></a></li>
                        </ul>
                        <a href="#" data-activates="slide-out" class="button-collapse menu-button"><i class="material-icons">menu</i></a>
                    </div>
                </div>
                <div id="header-right" class="col s2 header-col hide-on-med-and-down">
                    <div class="user-box">
                        <?php if(Auth::user()->owner): ?>
                        <div class="user-img">
                            <img src="<?php echo e(Auth::user()->owner->logo); ?>" alt="user-img" title="<?php echo e(Auth::user()->username); ?>" class="responsive-img">
                        </div>
                        <?php endif; ?>
                        <div class="user-icons">
                                <span class="user-name"><?php echo e(Auth::user()->username); ?></span>
                                <span class="user-role"><?php echo e(get_string('points')); ?>: <?php echo e(Auth::user()->owner->points); ?> </span>
                                <a href="<?php echo e(config('app.url')); ?>" title="<?php echo e(get_string('my_website')); ?>"><i class="material-icons tiny color-white">input</i></a>
                                <a href="<?php echo e(route('owner_my_account')); ?>" title="<?php echo e(get_string('my_account')); ?>"><i class="material-icons tiny color-white">settings</i></a>
                                <a href="<?php echo e(route('owner_logout')); ?>" title="<?php echo e(get_string('logout')); ?>"><i class="material-icons tiny color-red">power_settings_new</i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container home-container z-depth-1">
        <div class="row mbot0">
            <div class="col s12">
    <?php echo $__env->yieldContent('page_title'); ?>
            </div>
    <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <div class="container footer-container">
        <div class="row">
            <div class="col s12 text-centered">
                <p> <?php echo e(get_string('copyright') . date('Y') . ' ' . get_string('rights_reserved') . get_setting('site_name', 'site')); ?> | <?php echo get_string('powered_by'); ?></p>
            </div>
        </div>
    </div>
<!--  Scripts-->
<script src="<?php echo e(URL::asset('assets/js/plugins/jquery.min.js')); ?>"></script>
<script type="text/javascript">
    window.paceOptions = {
        ajax: false,
        restartOnRequestAfter: false,
    };
</script>
<script src="<?php echo e(URL::asset('assets/js/plugins/backend_bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/backend_plugins.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/waves.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/toast.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/counter.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/summernote.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins/bootbox.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/backend_init.js')); ?>"></script>

<script type="text/javascript">
    // Mobile Menu
$('.button-collapse').sideNav({
    menuWidth: 240,
    edge: 'right',
    closeOnClick: true,
    draggable: true
});
</script>
    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
