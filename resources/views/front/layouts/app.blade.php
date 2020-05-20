<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Ganza respcie">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="/assets/images/a-1-122x30.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Home</title>
    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="/assets/facebook-plugin/style.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="/assets/tether/tether.min.css">
  <link rel="stylesheet" href="/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="/assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="/assets/theme/css/style.css">
  <link rel="stylesheet" href="/assets/gallery/style.css">
  <link rel="stylesheet" href="/assets/socicon/css/styles.css">
  <link rel="preload" as="style" href="/assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">
  


    @yield('css')
</head>

<body>

    <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">



        <nav
            class="navbar navbar-expand beta-menu navbar-dropdown align-items-left navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="/">
                            <img src="/assets/images/a-122x30.png" alt="All Trust Consult" title="" style="width:200px;height:40px">
                        </a>
                    </span>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav nav-dropdown nav-right text-left" data-app-modern-menu="true">

                    <li class="nav-item dropdown text-left"><a
                            class="nav-link link dropdown-toggle text-primary display-4 {{ Request::is('apply/*') ? 'active' : '' }}" href="#"
                            data-toggle="dropdown-submenu" aria-expanded="false">Apply</a>
                        <div class="dropdown-menu text-left">
                            <a class="dropdown-item text-primary display-4 text-left" href="/apply/loan">Loans</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="/apply/yes-conferance" aria-expanded="false">Yes
                                Conference(s)</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="training-workshops"
                                aria-expanded="false">Training & Workshops</a>


                        </div>
                    </li>

                    <li class="nav-item dropdown text-left"><a
                            class="nav-link link dropdown-toggle text-primary display-4 {{ Request::is('become/*') ? 'active' : '' }}" href="#"
                            data-toggle="dropdown-submenu" aria-expanded="false">Become</a>
                        <div class="dropdown-menu text-left">
                        <a class="dropdown-item text-primary display-4 text-left" href="/become/ngo"
                                aria-expanded="false">NGOs</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="/become/lender">Lender</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="/become/donor"
                                aria-expanded="false">Donor</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="/become/partener"
                                aria-expanded="false">Partener</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="/become/microfund-manager"
                                aria-expanded="false">MicroFund Manager</a>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4 {{ Request::is('lend*') ? 'active' : '' }}" href="/lend">
                            Lend
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4 {{ Request::is('donate*') ? 'active' : '' }}" href="/donate">Donate</span></a></li>

                    <li class="nav-item"><a class="nav-link link text-primary display-4 {{ Request::is('enterprises*') ? 'active' : '' }}" href="/enterprises">
                            Enterprises</a></li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4 {{ Request::is('profiles*') ? 'active' : '' }}" href="/profiles">Profiles</a></li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4 {{ Request::is('fillings*') ? 'active' : '' }}" href="/fillings">Fillings</a></li>

                    <li class="nav-item dropdown"><a class="nav-link link dropdown-toggle text-primary display-4 {{ Request::is('more/*') ? 'active' : '' }}"
                            href="#" data-toggle="dropdown-submenu" aria-expanded="false"><span
                                class="mobi-mbri mobi-mbri-more-vertical mbr-iconfont mbr-iconfont-btn"></span>More..</a>

                        <div class="dropdown-menu text-left">
                       
                                <a class="dropdown-item text-primary display-4 text-left" href="/more/stories">Stories</a>
                                <a class="dropdown-item text-primary display-4 text-left" href="/more/news">News</a>
                            <a class="dropdown-item text-primary display-4 text-left" href="/more/team">Team</a>

                            <a class="dropdown-item text-primary display-4 text-left" href="/more/about"
                                aria-expanded="false">About</a>

                           
                            <a class="dropdown-item text-primary display-4 text-left" href="/more/photos"
                                aria-expanded="false">Photos</a>

                           
                               
                                <a class="dropdown-item text-primary display-4 text-left" href="/more/contact"
                                aria-expanded="false">Contact</a>
                                <a class="dropdown-item text-primary display-4 text-left" href="/more/video-links"
                                aria-expanded="false">Video &
                                Links</a>
                        </div>
                    </li>
                </ul>

                <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-sm btn-primary display-3"
                        href="#" style="border:#58d77a !important; background:#fff!important; color: #fa8709!important;"> BORROW
                    </a> <a class="btn btn-sm btn-primary display-3" href="#"
                    style="border:#58d77a !important; background:#fa8709!important; color: #fff!important;">
                        REPAY
                    </a></div>
            </div>
        </nav>
    </section>



    @yield('content')



    <section once="footers" class="cid-rYUrwfea5A mbr-reveal" id="footer7-3s">

    

    

<div class="container">
    <div class="media-container-row align-center mbr-white">
        <div class="row row-links">
            <ul class="foot-menu">
                
                
                
                
                
            <li class="foot-menu-item mbr-fonts-style display-7">
                    <a class="mbr-bold text-primary" href="#" target="_blank">About us</a>
                </li><li class="foot-menu-item mbr-fonts-style display-7">
                    <a class="mbr-bold text-primary" href="#" target="_blank">Services</a>
                </li><li class="foot-menu-item mbr-fonts-style display-7">
                    <a class="mbr-bold text-primary" href="#" target="_blank">Get In Touch</a>
                </li><li class="foot-menu-item mbr-fonts-style display-7">
                    <a class="mbr-bold text-primary" href="#" target="_blank">Careers</a>
                </li><li class="foot-menu-item mbr-fonts-style display-7">
                    <a class="mbr-bold text-primary" href="#" target="_blank">Work</a>
                </li>
                </li></ul>
        </div>
        <div class="row social-row">
            <div class="social-list align-right pb-2">
                
                
                
                
                
                
            <div class="soc-item">
                    <a href="#" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon" style="color: rgb(250, 135, 9); fill: rgb(250, 135, 9);"></span>
                    </a>
                </div><div class="soc-item">
                    <a href="#" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon" style="color: rgb(250, 135, 9); fill: rgb(250, 135, 9);"></span>
                    </a>
                </div><div class="soc-item">
                    <a href="#" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon" style="color: rgb(250, 135, 9); fill: rgb(250, 135, 9);"></span>
                    </a>
                </div><div class="soc-item">
                    <a href="#" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon" style="color: rgb(250, 135, 9); fill: rgb(250, 135, 9);"></span>
                    </a>
                </div></div>
        </div>
        <div class="row row-copirayt">
            <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-4">
                © Copyright 2020 All Trust Consult - All Rights Reserved
            </p>
        </div>
    </div>
</div>
</section>


<script src="/assets/web/assets/jquery/jquery.min.js"></script>
  <script src="/assets/popper/popper.min.js"></script>
  <!-- <script src="https:/connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script> -->
  <script src="https:/apis.google.com/js/plusone.js"></script>
  <!-- <script src="/assets/facebook-plugin/facebook-script.js"></script> -->
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/smoothscroll/smooth-scroll.js"></script>
  <script src="/assets/tether/tether.min.js"></script>
  <script src="/assets/dropdown/js/nav-dropdown.js"></script>
  <script src="/assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="/assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="/assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="/assets/playervimeo/vimeo_player.js"></script>
  <script src="/assets/parallax/jarallax.min.js"></script>
  <script src="/assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="/assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="/assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
  <script src="/assets/mbr-clients-slider/mbr-clients-slider.js"></script>
  <script src="/assets/theme/js/script.js"></script>
  <script src="/assets/formoid/formoid.min.js"></script>


  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
 

    @stack('scripts')
</body>

</html>