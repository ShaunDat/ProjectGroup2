<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('header')
</head>
<body>
        {{-- ---------------------------Header------------------------------------ --}}
    <section class="header">
        {{-- --------------------------------------------------------------- --}}
        <div class="container">	<div class="superNav border-bottom py-2 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
        <select  class="me-3 border-0 bg-light">
          <option value="en-us">EN-US</option>
        </select>
        <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>info@somedomain.com</strong></span>
        <span class="me-3"><i class="fa-solid fa-phone me-1 text-warning"></i> <strong>1-800-123-1234</strong></span>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
        <span class="me-3"><i class="fa-solid fa-truck text-muted me-1"></i><a class="text-muted header-link" href="#">Shipping</a></span>
        <span class="me-3"><i class="fa-solid fa-file  text-muted me-2"></i><a class="text-muted header-link" href="#">Policy</a></span>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand header-link" href="#"><i class="fa-solid fa-shop me-2"></i> <strong>GEAR SHOP</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
      <div class="input-group">
        <span class="border-warning input-group-text bg-warning text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input type="text" class="form-control border-warning" style="color:#7a7a7a">
        <button class="btn btn-warning text-white">Search</button>
      </div>
    </div>
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <div class="ms-auto d-none d-lg-block">
        <div class="input-group">
          <span class="border-warning input-group-text bg-warning text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" class="form-control border-warning" style="color:#7a7a7a">
          <button class="btn btn-warning text-white">Search</button>
        </div>
      </div>
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase active" aria-current="page" href="#">Offers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase" href="#">Catalog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase" href="#">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase" href="#"><i class="fa-solid fa-cart-shopping me-1"></i> Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link mx-2 text-uppercase" href="#"><i class="fa-solid fa-circle-user me-1"></i> Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav></div>
  {{-- --------------------------------------------------------------- --}}
    </section>
  {{-- ---------------------------End Header------------------------------------ --}}

  {{-- ---------------------------Main menu------------------------------------ --}}
    <section class="main-menu">
  {{-- --------------------------------------------------------------- --}}
        <div class="container">main menu</div>
  {{-- --------------------------------------------------------------- --}}
    </section>
    {{-- ---------------------------End main menu------------------------------------ --}}

    {{-- ----------------------------Begin main content----------------------------------- --}}
    <section class="main-content">
      {{-- --------------------------------------------------------------- --}}
        <div class="container"></div>@yield('maincontent')
        {{-- --------------------------------------------------------------- --}}
    </section>
    {{-- ---------------------------End main content------------------------------------ --}}

    {{-- -------------------------------footer-------------------------------- --}}
    <section class="footer">
      {{-- --------------------------------------------------------------- --}}
      {{-- <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6>
              <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
            </div>

            <div class="col-xs-6 col-md-3">
              <h6>Categories</h6>
              <ul class="footer-links">
                <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
              </ul>
            </div>

            <div class="col-xs-6 col-md-3">
              <h6>Quick Links</h6>
              <ul class="footer-links">
                <li><a href="http://scanfcode.com/about/">About Us</a></li>
                <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
              </ul>
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
          <a href="#">Scanfcode</a>.
              </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
              </ul>
            </div>
          </div>
        </div>
      </footer> --}}
    </section>
    <section class="copyright">
        <div class="container">copyright</div>
        {{-- --------------------------------------------------------------- --}}
    </section>
    {{-- ------------------------------End footer--------------------------------- --}}
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    @yield('footer')
</body>
</html>