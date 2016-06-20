<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Cooliner - Resto & Cafe Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{URL::asset('template_assets/css/theme-brown.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('template_assets/restoicon/css/bistro.css')}}"></head>
    <!-- EOF CSS INCLUDE -->

</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    @include('template/sidebar')


    <!-- PAGE CONTENT -->
    <div class="page-content">


        @include('template/navigation-vertical')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <!--<li><a href="#">Home</a></li>
            <li class="active">Dashboard</li>-->
        </ul>
        <!-- END BREADCRUMB -->

        {{--TAMPIL KONTEN DISINI--}}
        @yield('content')


    </div>
    <!-- END PAGE CONTENT -->

</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ url('/logout') }}" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/jquery/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>


<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->

<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/dropzone/dropzone.min.js')}}"></script>

<script type='text/javascript' src="{{URL::asset('template_assets/js/plugins/icheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/morris/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/morris/morris.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/rickshaw/d3.v3.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
<script type='text/javascript' src='{{URL::asset('template_assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}'></script>
<script type='text/javascript' src='{{URL::asset('template_assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}'></script>
<script type='text/javascript' src='{{URL::asset('template_assets/js/plugins/bootstrap/bootstrap-datepicker.js')}}'></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/owl/owl.carousel.min.js')}}"></script>



<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/moment.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>


<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- END PAGE PLUGINS -->
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
{{--<script type="text/javascript" src="{{URL::asset('template_assets/js/settings.js')}}"></script>--}}

<script type="text/javascript" src="{{URL::asset('template_assets/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('template_assets/js/actions.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('template_assets/js/demo_dashboard.js')}}"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->

</body>
</html>






