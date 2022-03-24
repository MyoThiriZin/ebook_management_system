<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Book Management System</title>

  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/user/common.css') }}" rel="stylesheet">
  <link href="{{ asset('font/fontawesome-free-6.0.0-beta3-web/css/all.min.css') }}" rel="stylesheet">
  <script src="{{ asset('js/library/jquery-3.6.0.min.js')}}"></script>
  <script src="{{ asset('js/user/common.js')}}"></script>
</head>
<body>
  <div class="wrapper">
    <section class="sec-header">
      <div class="container clearfix">
        <h1 class="logo ft-left">
          <img src="{{ asset('img/logo.png') }}" alt="E-Book">
          <a href="">eBook</a>
        </h1>
        <div class="user ft-right clearfix">
          <i class="fa-solid fa-circle-user ft-right"></i>
          <ul class="dropdown-content ft-left">
            <li>
              <a href="#">Sign in</a>
            </li>
            <li>
              <a href="#">Sign up</a>
            </li>
          </ul>
        </div>
        
      </div>
    </section> <!-- /.sec-header -->

    <section class="sec-nav">
      <div class="container">
        <p class="btn-gnavi">
          <span></span>
          <span></span>
          <span></span>
        </p>
        <nav class="sidenav">
          <ul class="clearfix">
            <li class="active">
              <a href="">Home</a>
            </li>
            <li>
              <a href="">Books</a>
            </li>
            <li>
              <a href="">Borrows</a>
            </li>
            <li>
              <a href="">Contact us</a>
            </li>
          </ul>
        </nav>
      </div>
    </section> <!-- /.sec-nav -->

    <div class="sec-body">
      @yield('content')
    </div>

    <section class="sec-footer">
      <div class="container clearfix">
        <div class="ft-left footer-frt-txt">
          <h4>
            <a href="">eBook</a>
          </h4>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae alias aspernatur officia odit nam sint ad voluptates dignissimos accusantium error eveniet eum fugiat sit praesentium, maiores sapiente adipisci officiis fugit!
          </p>
        </div>

        <div class="ft-left footer-snd-nav">
        <h5 class="footer-ttl">Links</h5>
          <ul class="clearfix">
            <li>
              <a href="">Home</a>
            </li>
            <li>
              <a href="">Books</a>
            </li>
            <li>
              <a href="">Borrows</a>
            </li>
            <li>
              <a href="">Contact us</a>
            </li>
          </ul>
        </div>

        <div class="ft-left footer-address">
          <h5 class="footer-ttl">Contact Info</h5>
          <ul class="clearfix">
            <li class="address">
              <a href="#">No. 2A, Second Floor, Pearl Condo, Yangon</a>
            </li>
            <li class="frt-ph">
              <a href="tel:+959450540999">(+95) 9 450 540 999</a>
            </li>
            <li class="snd-ph">
              <a href="tel:+959450540888">(+95) 9 450 540 888</a>
            </li>
            <li class="mail">
              <a href="mailto:info.hr@bridge.com">info.hr@seattle.com</a>
            </li>
          </ul>
        </div>

        <div class="social ft-left">
          <ul class="clearfix">
            <li class="facebook">
              <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
            </li>
            <li class="instagram">
              <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li class="twitter">
              <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
            </li>
            <li class="email">
              <a href="https://mail.google.com"><i class="fa-solid fa-envelope"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="sec-copyright">
      <div class="container">
          <div class="copyright">
            <span>Copyright @ Seattle Consulting Myanmar Co.,Ltd. All right preserved.</span>
          </div>
      </div>
    </section>

  </div>
  
</body>
</html>