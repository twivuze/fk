@extends('front.layouts.app')

@section('content')

<?php 
     $story = \App\Models\VideosLinks::where('published', true)->where('id',$id)->first();
     $links= App\Models\VideosLinks::orderBy('id','DESC')->where('id','!=',$id)->get();
 ?>

<section class="mbr-section content4 cid-rYUfm4cV5h mt-5" id="content4-2t">




</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">



    <div class="container-fluid">

        <div class="media-container-row">
            <?php if($story->type=="YoutubeLink"){?>
            <div class="card p-3 col-12 col-md-8 col-lg-8 bg-white">
                <div class="card-wrapper">
                    <div class="card-img">
                        <div class="modalWindow-video" style="height: 400px;">
                            <iframe width="100%" height="100%" frameborder="0" allowfullscreen="1"
                                data-src="{{$story->link}}"></iframe>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            {{$story->title}}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">

                            {!!html_entity_decode($story->contents)!!}
                        </p>
                    </div>
                </div>
            </div>

            <?php }else{ ?>

            <div class="card p-3 col-12 col-md-8 col-lg-8">
                <div class="card-wrapper">
                    <a href="{{$story->link}}">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                                {{$story->title}}
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">

                                {!!html_entity_decode($story->contents)!!}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>

        </div>

    
    </div>


</section>



<section class="clients cid-rYUvGms2pw" style="background:#ffff!important;" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>


@endsection
