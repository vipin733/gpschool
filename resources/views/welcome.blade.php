<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gramyanchal School Management System</title>
       <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
       <link rel="stylesheet" href="{{asset('/css/font-awesome-animation.css')}}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="/css/parsley.css" rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
    </head>
    <body>
    @yield('nav')
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div><br>
    @include('layouts.footer')
      <script src="/js/app.js"></script>
  <script type="text/javascript" src="/js/datatables.min.js"></script> 
      @yield('script')
  </body>

</html>
