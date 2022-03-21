<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebook Management System</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('font/fontawesome-free-6.0.0-beta3-web/css/all.min.css') }}" rel="stylesheet">
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
  <div id="wrapper">
    <section class="sec-header">
        <div class="cmn-container clearfix">
          <a href=""><h1>EBOOK MANAGEMENT 
            SYSTEM</h1></a>
          
          <div class="dropdown ft-right">
            <div class="dropbtn">
            <i class="fa-solid fa-circle-user"></i>
              <span> {{ Auth::user()->name }} </span>

            </div>
            <div class="dropdown-content">
              <a href="{{ route('logout') }}">Logout</a>
            </div>
          </div>
        </div>
    </section>
    <div class="clearfix">
    <section class="ft-left sidenav pc">
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
            <i class="fa-fw fas fa-user"></i><a href="{{route('authors.index')}}">Authors</a>
          </li>
          <li>
            <i class="fa-fw fas fa-book"></i><a href="#">Categories</a>
          </li>
          <li>
            <i class="fa-fw fas fa-users"></i><a href="#">User Lists</a>
          </li>
          <li>
            <i class="fas fa-list"></i></i><a href="#">Borrow Lists</a>
            <i class="fa-fw fas fa-users"></i><a href="#">Borrow Lists</a>
          </li>
          <li>
            <i class="fas fa-address-book"></i></i><a href="#">ContactUs Lists</a>
          </li>
        </ul>
    </section>
<div class="ft-right main-content">
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
