@extends('front.layouts.app',
['title'=>'Past Quotes',
'description'=>'All Past Quotes'
]
)

@section('content')

<?php 
     $quotes=\App\Models\Quotes::orderBy('updated_at','DESC')->where('publish',1)->paginate(12);
?>


<section class="testimonials4 cid-s2Up6rkIw5" id="testimonials4-b">




    <div class="container">
        <h2 class="pb-3 mbr-fonts-style mbr-white align-center display-2">
            Quotes</h2>

        <div class="col-md-10 testimonials-container">


        @foreach($quotes as $quote)
            <div class="testimonials-item" style="cursor:pointer" onclick="window.location.href='/quote/{{$quote->id}}'">
                
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
                        {{$quote->quote_owner}}  <strong class="float-right">{{$quote->viewers}} views</strong>
                        </div>

                    </div>
                </div>
             
            </div>
            @endforeach
            
        </div>
    </div>

    <div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $quotes->links() !!}</span>
</div>

</section>



@include('front.footer')

@endsection

