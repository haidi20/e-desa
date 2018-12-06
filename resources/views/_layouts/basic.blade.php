<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token">
    <title>Standar Pelayanan Minimal</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
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
    @yield('script-bottom')
  </body>
</html>
