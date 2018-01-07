<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Standar Pelayanan Minimal</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <meta name="csrf-token">
  </head>
  <body>
    @yield('tubuh')
    <script src="{{mix('js/app.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('[data-toggle="popover"]').popover({
              placement : 'top'
          });
      });
    </script>
  </body>
</html>
