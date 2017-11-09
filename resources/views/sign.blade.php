<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <!-- Bootstrap -->
    <link href={{asset("css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Font Awesome -->
    <link href={{asset("css/font-awesome.min.css")}} rel="stylesheet">
    <!-- NProgress -->
    <link href={{asset("css/nprogress.css")}} rel="stylesheet">
    <!-- Animate.css -->
    <link href={{asset("css/animate.min.css")}} rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href={{asset("css/custom.min.css")}} rel="stylesheet">

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        @yield('content')

    </div>
</div>
</body>
</html>