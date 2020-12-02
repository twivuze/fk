<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Ganza respcie">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{isset($icon)?$icon:'/assets/images/9xzokvlpkrotwx8vivxy5s6gobvvod6vnvut0hul-192x266.png'}}" type="image/x-icon">

    <title>{{isset($title)?$title:'Frank Rubaduka'}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{isset($description)?$description:'Frank Rubaduka'}}" />
    <meta name="author" content="Ganza Respice" />
    <meta property="og:image:width" content="1365">
    <meta property="og:image:height" content="406">
    <meta property="article:section" content="html">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta property="og:title" content="{{isset($title)?$title:'Frank Rubaduka'}}">
    <meta property="og:image" content="{{isset($icon)?$icon:'/assets/images/9xzokvlpkrotwx8vivxy5s6gobvvod6vnvut0hul-192x266.png'}}">
    <meta property="og:description" content="{{isset($description)?$description:'Frank Rubaduka'}}">

    <meta name="twitter:description" content="{{isset($description)?$description:'Frank Rubaduka'}}">
    <meta name="twitter:title" content="{{isset($title)?$title:'Frank Rubaduka'}}">
    <meta name="twitter:image" content="{{isset($icon)?$icon:'/assets/images/9xzokvlpkrotwx8vivxy5s6gobvvod6vnvut0hul-192x266.png'}}">
    <meta name="twitter:card" content="{{isset($description)?$description:'Frank Rubaduka'}}">

    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="/assets/facebook-plugin/style.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/assets/animatecss/animate.min.css">
    <link rel="stylesheet" href="/assets/tether/tether.min.css">
    <link rel="stylesheet" href="/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="/assets/theme/css/style.css">
    <link rel="stylesheet" href="/assets/gallery/style.css">
    <link rel="preload" as="style" href="/assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="/assets/socicon/css/styles.css">
    





    <?php $vistor=new App\Models\Vistors; 
        $vistor->saveVistor(isset($title)?$title:'Welcome');
   ?>
<?php 
$statement = \App\Models\Statement::where('allow_to_apply',1)->orderBy('numbering','ASC')->first();
$letter = \App\Models\Letters::where('allow_to_apply',1)->orderBy('numbering','ASC')->first();
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
                            <img src="/images/logo.png"
                                alt="Mobirise" title="" style="height: 3.8rem;">
                        </a>
                    </span>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <!-- <li class="nav-item">
                        <a class="nav-link link text-secondary display-4" href="/">
                            Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link link text-secondary display-4" href="/quates">Quotes</a>
                    </li>
                   
                   

                            <?php $subsidiaryCompanies = \App\Models\SubsidiaryCompanies::where('published',1)->get();?>
                           

                         <?php if( count($subsidiaryCompanies) > 0 ){ ?> 
                         <li class="nav-item dropdown text-left"><a
                            class="nav-link link text-secondary dropdown-toggle  display-4" href="#"
                            data-toggle="dropdown-submenu" aria-expanded="false">His Companies</a>
                        <div class="dropdown-menu text-left">
                      
                            @foreach($subsidiaryCompanies AS $subsidiaryCompany)
                            <a class="dropdown-item text-secondary display-4 text-left" href="{{$subsidiaryCompany->url}}" target="_blank"
                                aria-expanded="false">{{$subsidiaryCompany->name}}</a>

                             @endforeach

                        </div>
                    </li>
                    <?php } ?> 

                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="/his-books">His Books</a></li>
                            
                   
                            <?php $team = \App\Models\TeamCategory::where('published',1)->orderBy('numbering','ASC')->first();?>
                                <?php if( $team ){ ?>
                                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                                    href="/all-teams">Team</a>
                       <?php } ?>  

                     
                    <?php if( $letter ){ ?>
                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="/letter/{{$letter->id}}#{{$letter->id}}">Letters</a></li>
                            <?php } ?>


                   

                            <li class="nav-item dropdown text-left"><a
                            class="nav-link link text-secondary dropdown-toggle  display-4" href="#"
                            data-toggle="dropdown-submenu" aria-expanded="false">Social</a>
                        <div class="dropdown-menu text-left">
                        <a class="dropdown-item text-secondary display-4 text-left" href="https://twitter.com/rubadukafrank" target="_blank"
                                aria-expanded="false">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span> Twitter</a>

                               
                           
                              <a class="dropdown-item text-secondary display-4 text-left" href="https://www.linkedin.com/in/rubaduka-frank-871708106/" target="_blank"
                                aria-expanded="false">
                                <span class="socicon-linkedin socicon mbr-iconfont mbr-iconfont-social"></span> Linkedin</a>


                                <a class="dropdown-item text-secondary display-4 text-left" href="https://web.facebook.com/kayumba.frank.3/" target="_blank"
                                aria-expanded="false">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span> Facebook</a>

                                <a class="dropdown-item text-secondary display-4 text-left" href="https://www.instagram.com/rubadukafrank/" target="_blank"
                                aria-expanded="false">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span> Instagram</a>

                                <a class="dropdown-item text-secondary display-4 text-left" href="#" id="whatsapp-btn" 
                                aria-expanded="false">
                                <span class="socicon-whatsapp socicon mbr-iconfont mbr-iconfont-social"></span> Whatsapp</a>


                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="https://geniusgamez.com/">Play Game</a></li>
                

                    <li class="nav-item"><a class="nav-link link text-secondary display-4"
                            href="/book-frank">Book Frank</a></li>

                            <li class="nav-item dropdown text-left"><a class="nav-link link text-secondary dropdown-toggle  display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">more</a>
                        <div class="dropdown-menu text-left">

                            <?php if ($statement) { ?>
                                <a class="dropdown-item text-secondary display-4 text-left" href="/statement/{{$statement->id}}#{{$statement->id}}" aria-expanded="false">About</a>
                            <?php } ?>

                            <?php $photos = \App\Models\Photos::first(); ?>
                            <?php if ($photos) { ?>
                                <a class="dropdown-item text-secondary display-4 text-left" href="/protofolio" aria-expanded="false">Portfolio</a>
                            <?php } ?>
                          <a class="dropdown-item text-secondary display-4 text-left"
                            href="https://thegeniusafrica.com/" aria-expanded="false">Explore</a>


                        </div>
                    </li>
                </ul> 

            </div>
        </nav>
    </section>

    <!-- <div id="preloader"> 
    	<div id="loader"></div>
   </div>  -->


    @yield('content')



    <script src="/assets/web/assets/jquery/jquery.min.js"></script>
    <script src="/assets/popper/popper.min.js"></script>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
    <script src="https://apis.google.com/js/plusone.js"></script>
    <script src="/assets/facebook-plugin/facebook-script.js"></script>
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
    <script src="/assets/formoid/formoid.min.js"></script>

  <script src="/assets/parallax/jarallax.min.js"></script>
  <script src="/assets/mbr-clients-slider/mbr-clients-slider.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.3/mobile-detect.min.js"></script>

  <script>
    var whatsapp_number = "+250785821562";
    myWhatsappFunction();
    function myWhatsappFunction() {
      var md = new MobileDetect(window.navigator.userAgent);
      if (md.mobile()) {
        // mobile link
        document.getElementById("whatsapp-btn").href = "https://wa.me/" + whatsapp_number+'&text=Hello Frank!';
      } else {
        // desktop link
        document.getElementById("whatsapp-btn").href = "https://api.whatsapp.com/send?phone=" + whatsapp_number+'&text=Hello Frank!';
      }
    };
  </script>


<script>

    

$(document).on('click', '#addacomment', function(){
    $('#addcomment').toggle();
});

$(window).load(function() {

// will first fade out the loading animation 
  $("#loader").fadeOut("slow", function(){

  // will fade out the whole DIV that covers the website.
  $("#preloader").delay(300).fadeOut("slow");

});       

})
</script>


    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
                class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">

    @stack('scripts')
</body>

</html>
