<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href={{asset("css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Font Awesome -->
    <link href={{asset("css/font-awesome.min.css")}} rel="stylesheet">
    <!-- NProgress -->
    <link href={{asset("css/nprogress.css")}} rel="stylesheet">
    <!-- iCheck -->
    <link href={{asset("css/green.css")}} rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href={{asset("css/bootstrap-progressbar-3.3.4.min.css")}} rel="stylesheet">
    <!-- JQVMap -->
    <link href={{asset("css/jqvmap.min.css")}} rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href={{asset("css/daterangepicker.css")}} rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href={{asset("css/custom.min.css")}} rel="stylesheet">
    <link href={{asset("css/jquery.mCustomScrollbar.min.css")}} rel="stylesheet">

    @yield('css')

</head>

<body class="nav-md footer_fixed">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

            @include('header.logo')

                <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('sideBar.userInfos')

            <!-- /menu profile quick info -->

                <br />

            <!-- sidebar menu -->
                @include('sideBar.menu')
                <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('sideBar.footerMenu')

                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            @include('header.navbar')
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        {{--@include('footer.block_footer')--}}
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src={{asset("js/jquery.min.js")}}></script>

<!-- Bootstrap -->
<script src={{asset("js/bootstrap.min.js")}}></script>

<!-- FastClick -->
<script src={{asset("js/fastclick.js")}}></script>

<!-- NProgress -->
<script src={{asset("js/nprogress.js")}}></script>

<!-- Chart.js -->
<script src={{asset("js/Chart.min.js")}}></script>

<!-- gauge.js -->
<script src={{asset("js/gauge.min.js")}}></script>

<!-- bootstrap-progressbar -->
<script src={{asset("js/bootstrap-progressbar.min.js")}}></script>

<!-- iCheck -->
<script src={{asset("js/icheck.min.js")}}></script>

<!-- Skycons -->
<script src={{asset("js/skycons.js")}}></script>

<!-- Flot -->
<script src={{asset("js/jquery.flot.js")}}></script>
<script src={{asset("js/jquery.flot.pie.js")}}></script>
<script src={{asset("js/jquery.flot.time.js")}}></script>
<script src={{asset("js/jquery.flot.stack.js")}}></script>
<script src={{asset("js/jquery.flot.resize.js")}}></script>

<!-- Flot plugins -->
<script src={{asset("js/jquery.flot.orderBars.js")}}></script>
<script src={{asset("js/jquery.flot.spline.min.js")}}></script>
<script src={{asset("js/curvedLines.js")}}></script>
<!-- DateJS -->
<script src={{asset("js/date.js")}}></script>

<!-- JQVMap -->
<script src={{asset("js/jquery.vmap.js")}}></script>
<script src={{asset("js/jquery.vmap.world.js")}}></script>
<script src={{asset("js/jquery.vmap.sampledata.js")}}></script>

<!-- bootstrap-daterangepicker -->
<script src={{asset("js/moment.min.js")}}></script>
<script src={{asset("js/daterangepicker.js")}}></script>


<!-- Custom Theme Scripts -->
<script src={{asset("js/custom.min.js")}}></script>
<script src={{asset("js/jquery.mCustomScrollbar.concat.min.js")}}></script>

@yield('js')


</body>
</html>

@yield('modal_content')