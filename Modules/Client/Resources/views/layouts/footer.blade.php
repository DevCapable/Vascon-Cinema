<!DOCTYPE html>
<html>
<head>
    <title>footer</title>
</head>
<body>
 <!-- News letter-->
 <div class="bg-default-3 pt-lg-25 pt-13" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
    <div class="container">
        <section class="sign-up" style="padding: 20%; height: 50%">

            <div class="row">
                <div class="col-md-12">
                    <div class="heading" style="text-align: center">
                        <h2>Signup for our newsletters</h2>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <fieldset>
                            <input name="email" type="text" class="form-control" id="email"
                                placeholder="Enter your email here..." required="">
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset style="float: right">
                            <button type="submit" id="form-submit"  class="btn btn-success">Send
                                Message</button>
                        </fieldset>
                    </div>
                </div>
            </form>

        </section>
    </div>
</div>
<!-- News letter ends here-->

<!-- footer-header start -->
<div
    class="site-header footer-site-header bg-default-3 position-relative site-header--menu-center scrolling reveal-header pt-6 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar site-navbar d-md-flex d-block text-center px-0">
                    <!-- Brand Logo start-->
                    <div class="brand-logo">
                        <a href="{{ url('/') }}">
                            <!-- light version logo (logo must be black)-->
                            <img src="img/vas_new.png" alt="" class="light-version-logo" style="width: 30p; height: 25px;">
                            <!-- Dark version logo (logo must be White)-->
                        </a>
                    </div>
                    <!-- Brand Logo end-->
                    <!-- footer-menu start-->
                    <div class="footer-menu">
                        <!-- navbar-nav-wrapper start-->
                        <div class="navbar-nav-wrapper">
                            <!-- main-menu start-->
                            <ul class="navbar-nav main-menu flex-row justify-content-center">
                                <li class="nav-item mx-lg-0 mx-3">
                                    <a class="nav-link" href="#features">About</a>
                                </li>
                                <li class="nav-item mx-lg-0 mx-3">
                                    <a class="nav-link" href="#features">Features</a>
                                </li>
                                <li class="nav-item mx-lg-0 mx-3">
                                    <a class="nav-link" href="#features"> Works</a>
                                </li>
                                <li class="nav-item mx-lg-0 mx-3">
                                    <a class="nav-link" href="#career">Career</a>
                                </li>
                                <li class="nav-item mx-lg-0 mx-3">
                                    <a class="nav-link" href=" https://grayic.com/html-support/" role="button"
                                        aria-expanded="false">Cinema</a>
                                </li>
                            </ul>
                            <!-- main-menu end-->
                        </div>
                        <!-- navbar-nav-wrapper end-->
                    </div>
                    <!-- footer-menu end-->
                    <div class="ml-auto pr-2 ml-lg-12 ml-md-0">
                        <!-- widget social icon start -->
                        <div class="social-icons">
                            <!-- widget social icon list start -->
                            <ul class="pl-0 list-unstyled mb-lg-6 mb-0">
                                <li class="d-inline-block px-3 ml-3"><a href="#"
                                        class="hover-color-primary text-mineshaft"><i
                                            class="fab fa-facebook-f font-size-3 pt-2"></i></a></li>
                                <li class="d-inline-block px-3 ml-3"><a href="#"
                                        class="hover-color-primary text-mineshaft"><i
                                            class="fab fa-twitter font-size-3 pt-2"></i></a></li>
                                <li class="d-inline-block px-3 ml-3"><a href="#"
                                        class="hover-color-primary text-mineshaft"><i
                                            class="fab fa-linkedin-in font-size-3 pt-2"></i></a></li>
                            </ul>
                            <!-- widget social icon list end -->
                        </div>
                        <!-- widget social icon end -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright &copy; {{ now() }} VAS Solutions Services</p>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <p>Designed: CapeTech Inc 08162291993</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>