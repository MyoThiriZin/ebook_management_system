<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebook Management System</title>
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('font/fontawesome-free-6.0.0-beta3-web/css/all.min.css') }}" rel="stylesheet">

</head>
<body>
  <div id="wrapper">
    <section class="sec-header">
        <div class="cmn-container clearfix">
         <a href=""><h1>EBOOK MANAGEMENT
            SYSTEM</h1></a>
          <a href=""><button>Admin</button></a>
        </div>
    </section>
    <div class="clearfix">
    <section class="side-content clearfix">
      <div class="sidenav">
        <ul>
          <li>
            <i class="fa-fw fas fa-chart-line"></i><a href="#">Dashboard</a>
          </li>
          <li>
            <i class="fa-fw fas fa-user"></i><a href="#">Admin Profile</a>
          </li>
          <li>
            <i class="fa-fw fas fa-book-open"></i><a href="#">Books</a>
          </li>
          <li>
            <i class="fa-fw fas fa-user"></i><a href="#">Authors</a>
          </li>
          <li>
            <i class="fa-fw fas fa-book"></i><a href="#">Categories</a>
          </li>
          <li>
            <i class="fa-fw fas fa-users"></i><a href="#">User Lists</a>
          </li>
          <li>
            <i class="fa-fw fas fa-book"></i><a href="#">ContactUs Lists</a>
          </li>
        </ul>
      </div>
    </section>
<div class="main-content">
    @yield('content')
</div>
</div>
    {{--<section class="sec-footer">
      <div class="clearfix">
        <p class="ft-left">Seattle Consulting Myanmar</p>
        <p class="ft-right">Copyright @ Seattle Consulting Myanmar Co.,Ltd. All right preserved.</p>
      </div>
    </section>--}}
  </div>
</body>
</html>