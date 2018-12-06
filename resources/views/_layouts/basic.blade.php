<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token">
    <title>Standar Pelayanan Minimal</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
      $('#select2').select2();
    } );
    </script>
    @yield('script-bottom')
  </body>
</html>
