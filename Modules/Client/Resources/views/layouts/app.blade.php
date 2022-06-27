<!DOCTYPE html>
<html>

<head>

  <title>VAS Solutionsservices</title>



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="shortcut icon" href="image/png/favicon.png" type="image/x-icon">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/icon-font/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/typography-font/typo.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/typography-font/lucida-grande/typo.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/fontawesome-5/css/all.css') }}">
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" href="{{ asset('plugins/aos/aos.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fancybox/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/slick/slick.min.css') }}">
  <!-- Vendor stylesheets  -->
  <link rel="stylesheet" href="{{ asset('/plugins/theme-mode-switcher/switcher-panel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link
    href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <!-- Custom stylesheet -->
  <!-- Bootstrap core CSS -->

</head>
<body style="background-color: #ffff; padding: 20px;">
  <div class="site-wrapper overflow-hidden">
    <!-- Header start  -->
    <!-- Header Area -->
    <header
      class="site-header l3-site-header site-header--menu-right sticky-bg-white light-mode-texts menu-link-hover-black site-header--absolute site-header--sticky">
      <div class="container">
        <nav class="navbar site-navbar offcanvas-active navbar-expand-lg px-0">
          <!-- Brand Logo-->
          <div class="brand-logo d-inline-block">
            <a href="{{ url('/client') }}">
              <!-- light version logo (logo must be black)-->
              <img src="/img/vas_new.png" alt="">
              <!-- Dark version logo (logo must be White)-->
            </a>
          </div>
          <div class="collapse navbar-collapse" id="mobile-menu">
            <div class="navbar-nav-wrapper">
              <ul class="navbar-nav main-menu">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle gr-toggle-arrow" id="navbarDropdown" href="#features" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CINEMA <i
                      class="icon icon-small-down"></i></a>
                  <ul class="gr-menu-dropdown dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="drop-menu-item">
                      <a href="{{ route('lekkiCinema') }}">
                        Lekki Cinema
                      </a>
                    </li>
                    <li class="drop-menu-item">
                      <a href="{{ route('ikejaCinema') }}">
                        Ikeja Cinema
                      </a>
                    </li>
                    <li class="drop-menu-item">
                      <a href="{{ route('ajahCinema') }}">
                        Ajah Cinema
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('aboutUs') }}">ABOUT VAS SOLUTIONS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contactUs') }}" role="button"
                    aria-expanded="false">Contact Us</a>
                </li>
              </ul>
            </div>
            <button class="d-block d-lg-none offcanvas-btn-close" type="button" data-toggle="collapse"
              data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true"
              aria-label="Toggle navigation">
              <i class="gr-cross-icon"></i>
            </button>
          </div>
          <div class="header-btn ">
            <a class="btn btn-1 btn-mineshaft-2 text-white font-size-5 letter-spacing-np4 font-weight-normal"
              href="#">
              Download Now
            </a>
          </div>
          <!-- Mobile Menu Hamburger-->
          <button class="navbar-toggler btn-close-off-canvas  hamburger-icon border-0" type="button"
            data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false"
            aria-label="Toggle navigation">
            <!-- <i class="icon icon-simple-remove icon-close"></i> -->
            <span class="hamburger hamburger--squeeze js-hamburger">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </span>
          </button>
          <!--/.Mobile Menu Hamburger Ends-->
        </nav>
      </div>
    </header>
    <!-- navbar- -->
    <!-- Header start end -->

</body>

</html>
