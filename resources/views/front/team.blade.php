<?php $team = \App\Models\Team::where('published',1)->where('id',$id)->orderBy('numbering','ASC')->first();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{$team->name}} - {{$team->title}}</title>
    <link rel="shortcut icon" href="{{$team->image}}" type="image/x-icon">
    <meta property="og:image" content="{{$team->image}}">
    <meta name="twitter:image" content="{{$team->image}}">
    <meta property="og:image:width" content="1365">
    <meta property="og:image:height" content="406">
    <meta name="description" content="{{$team->bio}}" />
    <meta name="keywords" content="Miss Career, yegobox, flipper" />
    <meta name="author" content="Yegobox Team" />
    <?php  $vistor=new App\Models\Vistors; $vistor->saveVistor('Visit '. $team->name.' '.$team->title) ?>
    <!--
//////////////////////////////////////////////////////

Website: 		http://yegobox.com/
Email: 			info@yegobox.com
Twitter: 		http://twitter.com/yegobox
Facebook: 		https://www.facebook.com/yegobox

//////////////////////////////////////////////////////
-->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="/images/logo.png">
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

    <!-- Stylesheets -->
    <!-- Dropdown Menu -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/superfish.css') }}">
    <!-- Owl Slider -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <!-- Date Picker -->
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <!-- CS Select -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/cs-select.css') }}">
    <link rel="stylesheet" href="https://misscareerafrica.org/css/cs-skin-border.css">

    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/themify-icons.css') }}">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/flaticon.css') }}">
    <!-- Icomoon -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/icomoon.css') }}">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/flexslider.css') }}">
   
   
    <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="/assets/socicon/css/styles.css">


    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('https://misscareerafrica.org/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('https://misscareerafrica.org/js/modernizr-2.6.2.min.js') }}"></script>
    
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <div id="fh5co-wrapper" style=" background-image: url('{{ asset('https://misscareerafrica.org/images/image-2.jpg') }}');
                                    background-repeat: no-repeat;width:100%;
                                    background-size: cover; background-size: center center">
        <div id="fh5co-page">

            <div id="fh5co-blog-section">
                <div class="container" id="contact">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-success mb-3" style="max-width: 100%">
                                <div class="card-header bg-transparent border-success"><b
                                        style="color: #8d1212!important;">
                                        {{$team->name}}</b><br>
                                    <strong style=" color: #28a745!important;">{{$team->title}}</strong></div>
                                <img class="img-fluid" src="{{$team->image}}" style="width:100%;">
                                <div class="card-body text-success">
                                    <b class="card-text text-center mx-auto col-8"
                                        style="border-bottom:2px solid; text-align: center">{{$team->country}}</b><br>
                                    <b class="card-text">
                                        <hr />
                                        {!! html_entity_decode(str_replace('.', '<br />', $team->bio)) !!}
                                    </b>
                                </div>
                                <!-- <div class="card-footer bg-transparent border-success">
                                    <div class="row">

                                        <div class="col-12 mb-2">

                                            <a href="/donate"
                                                class="donate text-center  btn-block">#Donate2HerProject</a>

                                        </div>

                                        <div class="col-12">
                                            <a href="/book-mca" class="btn btn-info btn-block btn-sm">
                                                BOOK HER
                                            </a>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <a href="https://www.hireherapp.com/register"
                                                style="background:#000;border-color:#000"
                                                class="btn btn-info btn-block btn-sm">
                                                Get Hired
                                            </a>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer id="footer" class="fh5co-bg-color">
            <div class="container">

                <div class="row">
                    <div class="float-left col-sm-6">
                        <!-- <img src="/assets/images/9xzokvlpkrotwx8vivxy5s6gobvvod6vnvut0hul-192x266.jpeg" class="img-rounded" style="width: 200px"> -->
                    </div>

                    <div class="col-sm-6 float-right">
                        <ul class="social-icons float-right">
                            <li>
                                <!-- <a href="https://twitter.com/Misscareerafric"><i
                                        class="icon-twitter-with-circle"></i></a> -->
                                <!-- <a href="#"><i class="icon-facebook-with-circle"></i></a> -->
                                <!-- <a href="https://www.instagram.com/miss_career_africa20/"><i
                                        class="icon-instagram-with-circle"></i></a> -->
                                <!-- <a href="#"><i class="icon-linkedin-with-circle"></i></a> -->
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </footer>

    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->
    <!-- Javascripts -->
    <script src="{{ asset('https://misscareerafrica.org/js/jquery-2.1.4.min.js') }}"></script>

    <script src="{{ asset('https://misscareerafrica.org/js/mca.js') }}"></script>

</body>

</html>
