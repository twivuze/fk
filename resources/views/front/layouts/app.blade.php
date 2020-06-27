<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Ganza respcie">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{isset($icon)?$icon:'/assets/images/a-1-122x30.png'}}" type="image/x-icon">

    <title>{{isset($title)?$title:'All Trust Consult'}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{isset($description)?$description:'All Trust Consult'}}" />
    <meta name="author" content="Ganza Respice" />
    <meta property="og:image:width" content="1365">
    <meta property="og:image:height" content="406">
    <meta property="article:section" content="html">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta property="og:title" content="{{isset($title)?$title:'All Trust Consult'}}">
    <meta property="og:image" content="{{isset($icon)?$icon:'/assets/images/a-1-122x30.png'}}">
    <meta property="og:description" content="{{isset($description)?$description:'All Trust Consult'}}">

    <meta name="twitter:description" content="{{isset($description)?$description:'All Trust Consult'}}">
    <meta name="twitter:title" content="{{isset($title)?$title:'All Trust Consult'}}">
    <meta name="twitter:image" content="{{isset($icon)?$icon:'/assets/images/a-1-122x30.png'}}">
    <meta name="twitter:card" content="{{isset($description)?$description:'All Trust Consult'}}">

    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <!-- <link rel="stylesheet" href="/assets/facebook-plugin/style.css"> -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/assets/animatecss/animate.min.css">
    <link rel="stylesheet" href="/assets/tether/tether.min.css">
    <link rel="stylesheet" href="/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="/assets/theme/css/style.css">
    <link rel="preload" as="style" href="/assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="/assets/socicon/css/styles.css">







    <?php $vistor=new App\Models\Vistors; 
        $vistor->saveVistor(isset($title)?$title:'Welcome');
   ?>
<?php $statement = \App\Models\Statement::where('allow_to_apply',1)->orderBy('numbering','ASC')->first();
?>

    @yield('css')
</head>

<body>

    <?php $statement = \App\Models\Statement::where('allow_to_apply',1)->orderBy('numbering','ASC')->first();
?>
    <section class="menu cid-s2U4ZTw7GJ" once="menu" id="menu2-1">



        <nav
            class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
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
                            <img src="/assets/images/9xzokvlpkrotwx8vivxy5s6gobvvod6vnvut0hul-192x266.jpeg"
                                alt="Mobirise" title="" style="height: 3.8rem;">
                        </a>
                    </span>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-secondary display-4" href="/">
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-secondary display-4" href="/past-quates">Past Quotes</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="#">His Books</a></li>
                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="#">Team</a></li>
                            <?php if( $statement ){ ?>
                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="/statement/{{$statement->id}}#{{$statement->id}}">Statements</a></li>
                            <?php } ?>
                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="/#">Book Frank</a></li>
                </ul>

            </div>
        </nav>
    </section>



    @yield('content')



    <script src="/assets/web/assets/jquery/jquery.min.js"></script>
    <script src="/assets/popper/popper.min.js"></script>
    <!-- <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
    <script src="https://apis.google.com/js/plusone.js"></script>
    <script src="/assets/facebook-plugin/facebook-script.js"></script> -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/tether/tether.min.js"></script>
    <script src="/assets/dropdown/js/nav-dropdown.js"></script>
    <script src="/assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="/assets/smoothscroll/smooth-scroll.js"></script>
    <script src="/assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
    <script src="/assets/viewportchecker/jquery.viewportchecker.js"></script>
    <script src="/assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
    <script src="/assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
    <script src="/assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="/assets/theme/js/script.js"></script>
    <script src="/assets/slidervideo/script.js"></script>
    <script src="assets/formoid/formoid.min.js"></script>




    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
                class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">

    @stack('scripts')
</body>

</html>
