@extends('front.layouts.app')

@section('content')


<section class="testimonials1 cid-rYUtsXJVWG" id="testimonials1-3v">

    
<?php $teams= \App\Models\Teams::where('published', true)->get() ?>

    
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 align-center">
                <h2 class="pb-3 mbr-fonts-style display-2">Our Team</h2>
                
            </div>
        </div>
    </div>

    <div class="container pt-3 mt-2">
        <div class="media-container-row">

        @foreach($teams AS $row)
            <div class="mbr-testimonial p-3 align-center col-12 col-md-6 col-lg-4">
                <div class="panel-item p-3">
                    <div class="card-block">
                        <div class="testimonial-photo">
                            <img src="/thumbnail/{{$row->avatar}}">
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <div class="mbr-author-name mbr-bold mbr-fonts-style display-7">
                             {{$row->full_name}}
                        </div>
                        <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
                        {{$row->title}}
                        </small>
                        <hr>
                        <p class="mbr-text mbr-fonts-style display-7">
                        {!!html_entity_decode($row->bio) !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>   
</section>



<section class="clients cid-rYUvGms2pw" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>


@endsection
