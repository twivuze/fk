@extends('front.layouts.app')

@section('content')

<?php $centers= \App\Models\Center::orderBy('id','DESC')->where('status','Active')->paginate(12); ?>

<section class="mbr-section content4 cid-rYUfm4cV5h mt-5" id="content4-2t">

    

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Centers</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    

<div class="container-fluid">
        <div class="media-container-row row">

          @foreach($centers AS $row)
          <a  href="/more/center/{{$row->id}}"> 
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
              
                <div class="card-img"
                    style="height:150px; width:100%; background-image: url('/thumbnail/{{$row->cover_image}}'); background-repeat: no-repeat; background-size: cover;">

                </div>
              
                    <div class="card-box">
                    <h4 class="card-title pb-3 mbr-fonts-style display-7 text-center" style="margin-top:15px">
                    {{$row->name}}<br><br>
                        <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
                        {{$row->country}}
                        </small>
                        <hr>
                        <a class="btn btn-sm btn-primary display-3"
                                    style="background:#fff!important;color:#000!important; border-color:#000!important;"
                                    href="/more/center/{{$row->id}}">Details
                                </a>
                    </h4>
                   
                    </div>
                </div>
            </div>
            </a>
            @endforeach
         
            
            
        </div>
    </div>
    
   
</section>



<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $centers->links() !!}</span>
</div>


@endsection
