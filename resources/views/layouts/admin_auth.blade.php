<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    @yield('title')
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/backend_materialize.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/admin_login.min.css')}}" rel="stylesheet">

</head>
<body>

<div class="container login-container">
    <div class="row">
        <div class="col s12">
            <div class="panel panel-default">
                <div class="panel-heading"><span>{{get_string('welcome_admin')}}</span> {{get_string('please_login')}}</div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
            <p class="powered">{{ get_string('copyright') . date('Y') . ' ' . get_string('rights_reserved') . get_setting('site_name', 'site')}}</p>
        </div>
    </div>
</div>
<!--  Scripts-->
<script src="{{URL::asset('assets/js/plugins/jquery.min.js')}}"></script>
<script type="text/javascript">
    window.paceOptions = {
        ajax: false,
        restartOnRequestAfter: false,
    };
</script>
<script src="{{URL::asset('assets/js/plugins/backend_materialize.min.js')}}"></script>
<script type="text/javascript">
    Pace.on("done", function(){
        $(".cover").fadeOut(500);
    });
</script>
</body>
</html>
