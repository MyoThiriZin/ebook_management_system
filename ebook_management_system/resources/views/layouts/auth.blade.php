<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebook Management System</title>
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('font/fontawesome-free-6.0.0-beta3-web/css/all.min.css') }}" rel="stylesheet">

  <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
  <script>
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()",0);
    window.onunload = function(){null;}
  </script>
</head>
<body>
  <div id="wrapper">
    <div class="auth">
      @yield('content')
    </div>
  </div>

</body>
</html>