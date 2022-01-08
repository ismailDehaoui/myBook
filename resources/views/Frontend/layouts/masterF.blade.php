<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/bootstrap.css')}}">
  
  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/owl-carousel/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/owl-carousel/css/owl.theme.default.css')}}">
  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/fancybox/css/jquery.fancybox.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/theme.css')}}">
  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/asideBar.css')}}">
  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/animationPhoto.css')}}">
  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/livreView.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/myCss.css')}}">
  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/style.css')}}">

  <link href="{{asset('../assets/css/toastr.min.css')}}" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oooh+Baby&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('../assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('../assets/img/favicon.png')}}">
  
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  @include('Frontend.include.navBar')
  
  <div class="content container-fluid">
      @yield('content')
  </div>


 
