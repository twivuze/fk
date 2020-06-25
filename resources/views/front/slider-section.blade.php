<?php 
     $quotes=\App\Models\Quotes::whereRaw('Date(created_at) = CURDATE()')->where('publish',1)->paginate(3);
    ?>
<section class="carousel slide cid-s2U4JA5Vsr" data-interval="false" id="slider1-0">



    <div class="full-screen">
        <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="10000"
            data-pause="true">

            <ol class="carousel-indicators">
                <?php $y=0; ?>
                @foreach($quotes AS $row)
                <?php $y++; ?>
                <li data-app-prevent-settings="" data-target="#slider1-0" class=" {{$y==0?'active':''}}" data-slide-to="{{$y}}"></li>
                
                @endforeach
            </ol>

            <?php $x=0; ?>
          <div class="carousel-inner" role="listbox">
                @foreach($quotes AS $quote )
               
                <div class="carousel-item slider-fullscreen-image {{$x==0?'active':''}}" data-bg-video-slide="false"
                        style="background-image: url(/images/{{$quote->slider_image}});">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay" style="opacity: 0.4;"></div><img
                                    src="/images/{{$quote->slider_image}}" alt="" title="">
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-left">
                                        <h2 class="mbr-fonts-style display-1">{{$quote->quote_owner}}</h2>
                                        <p class="lead mbr-text mbr-fonts-style display-5">{{$quote->quote}}</p>
                                        <div class="mbr-section-btn" buttons="0"><a class="btn display-4 btn-success"
                                                href="#">Book Frank</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $x++; ?>

                @endforeach
        </div>
        
        <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button"
            data-slide="prev" href="#slider1-0"><span aria-hidden="true" class="mbri-left mbr-iconfont"></span><span
                class="sr-only">Previous</span></a><a data-app-prevent-settings=""
            class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-0"><span
                aria-hidden="true" class="mbri-right mbr-iconfont"></span><span class="sr-only">Next</span></a>
    </div>
    </div>

</section>
