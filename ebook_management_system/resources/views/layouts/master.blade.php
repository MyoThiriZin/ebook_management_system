<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebook Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('font/fontawesome-free-6.0.0-beta3-web/css/all.min.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>
<body>
  <div id="wrapper">
    <section class="sec-header">
        <div class="cmn-container clearfix">
          <a href=""><h1>EBOOK MANAGEMENT 
            SYSTEM</h1></a>
          
          <div class="dropdown ft-right">
            <div class="dropbtn">
              <span> {{ Auth::user()->name }} <span>
              <i class="fa-solid fa-circle-user"></i>
            </div>
            <div class="dropdown-content">
              <a href="{{ route('logout') }}">Logout</a>
            </div>
          </div>
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
            <i class="fa-fw fas fa-book-open"></i><a href="{{route('books.index')}}">Books</a>
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
            <i class="fa-fw fas fa-users"></i><a href="#">Borrow Lists</a>
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
