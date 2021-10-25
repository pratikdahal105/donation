<!-- Created by Ashish Shrestha -->
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $page['title'] }}</title>

    <?php $cssVersion = "1.1"; ?>

<!------------------------ Meta Starts ---------------------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client_assets')}}/img/site_logo.png">

    <meta property="og:title" content=""/>
    <meta property="og:type"   content="website" />
    <meta property="og:url"    content="" />
    <meta property="og:site_name" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:image:alt" content="">
    <meta property="og:description" content="">
    <!------------------------- Meta Ends ----------------------->


    <!----------------------- Fonts Starts ---------------------->

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!------------------------ Fonts Ends ----------------------->


    <!-------------------- Components Starts -------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--    <link href="css/bowercomponent/bootstrap.min.css" rel="stylesheet">-->
    <link href="{{asset('client_assets')}}/css/bowercomponent/slick-theme.css" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/bowercomponent/slick.css" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/bowercomponent/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/bowercomponent/lightbox.min.css" rel="stylesheet">
    <!--------------------- Components Ends --------------------->


    <!-------------------- Site Style Starts -------------------->
    <link href="{{asset('client_assets')}}/css/global.css" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/thestyles.css" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/responsive.css" rel="stylesheet">
    <!--------------------- Site Style Ends --------------------->


    <!-------------------- Site Style Starts -------------------->
    <link href="{{asset('client_assets')}}/css/global.css?v=<?php echo $cssVersion; ?>" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/thestyles.css?v=<?php echo $cssVersion; ?>" rel="stylesheet">
    <link href="{{asset('client_assets')}}/css/responsive.css?v=<?php echo $cssVersion; ?>" rel="stylesheet">
    <link href="{{asset('client_assets')}}/alertifyjs/css/alertify.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{asset('client_assets')}}/css/jquery.steps.css" rel="stylesheet">
    <!--------------------- Site Style Ends --------------------->

</head>
@include('frontend.includes.header')
<div>
    @yield('content')
</div>
@include('frontend.includes.footer')
