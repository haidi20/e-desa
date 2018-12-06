<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token">
    <title>Standar Pelayanan Minimal</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @yield('script-top')
  </head>
  <body>
    <div id="app">
      @yield('tubuh')
    </div>
    <script>
      var Laravel = {
        csrfToken: '{{ csrf_token() }}'
      }
    </script>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>
    @yield('script-bottom')
  </body>
</html>
