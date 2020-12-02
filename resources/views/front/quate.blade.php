
<?php 
     $quote=\App\Models\Quotes::orderBy('updated_at','DESC')->where('id',$id)->first();
     if(!$quote){return abort('404');
    
    }
    $quote->viewers=$quote->viewers+1;
    $quote->save();
?>
@extends('front.layouts.app',
['title'=>$quote->quote,
'description'=>$quote->quote,
'icon'=>'/thumbnail/'.$quote->avatar,
''
]
)

<section class="header8 cid-rYMyQ3IifK" id="header8-1q">

<section class="carousel slide cid-s2U4JA5Vsr" data-interval="false" id="slider1-0" style="margin-top:20px">



    <div class="full-screen">
        <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="10000"
            data-pause="true">

          <div class="carousel-inner" role="listbox">
                
               
                <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false"
                        style="background-image: url(/images/{{$quote->slider_image}});">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay" style="opacity: 0.4;"></div><img
                                    src="/images/bg.jpg" alt="" title="">
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-left">
                                        <h2 class="mbr-fonts-style display-1">{{$quote->quote_owner}}
                                        
                                        </h2>
                                        <p class="lead mbr-text mbr-fonts-style display-5">{{$quote->quote}}
                                            <br>
                                            <strong class="float-right">{{$quote->viewers}} views</strong>
                                        </p>
                                        <div class="mbr-section-btn" buttons="0">
                                        @if($quote->button_name)
                                        <a class="btn display-4 btn-danger" href="{{$quote->url}}" target="_blank">{{$quote->button_name}}</a>   
                                                @endif 
                                        <a class="btn display-4 btn-success" href="/quates">Load more ..</a> 
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
               

        </div>
      

    </div>
    </div>

</section>


</section>


