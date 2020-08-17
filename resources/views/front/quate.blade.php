
<?php 
     $quote=\App\Models\Quotes::orderBy('updated_at','DESC')->where('id',$id)->first();
     if(!$quote){return abort('404');}
?>
@extends('front.layouts.app',
['title'=>$quote->quote,
'description'=>$quote->quote,
'icon'=>'/thumbnail/'.$quote->avatar,
''
]
)

@section('content')



<section class="testimonials4 cid-s2Up6rkIw5" id="testimonials4-b">




    <div class="container mt-5">
        

        <div class="col-md-10 testimonials-container">


            <div class="testimonials-item">
                <div class="user row">
                    <div class="col-lg-3 col-md-4">
                        <div class="user_image">
                            <img src="/thumbnail/{{$quote->avatar}}">
                        </div>
                    </div>
                    <div class="testimonials-caption col-lg-9 col-md-8">
                        <div class="user_text ">
                            <p class="mbr-fonts-style  display-7">
                                <em>{{$quote->quote}}</em>
                            </p>
                        </div>
                        <div class="user_name mbr-bold mbr-fonts-style align-left pt-3 display-7">
                        {{$quote->quote_owner}}
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
    <span class="align-center">   <a  class="align-center"  href="/quates">Load more ..</a> </span>
</div>

</section>



@include('front.footer')

@endsection

