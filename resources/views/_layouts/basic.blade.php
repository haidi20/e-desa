<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token">
    <title>Standar Pelayanan Minimal</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
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
  </body>
</html>
