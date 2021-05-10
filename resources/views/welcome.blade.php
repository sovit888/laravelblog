<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("/css/index.css")}}"/>
    </head>
    <body>
        @yield('content')
    </body>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var pusher = new Pusher('d0932f43689bd2234e87', {
        cluster: 'ap2'
      });
  
      var channel = pusher.subscribe('status-liked');
      channel.bind('pusher:first', function(data) {
        console.log(data)
      });
    </script>
</html>
