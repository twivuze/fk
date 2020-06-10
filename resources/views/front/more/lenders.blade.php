@extends('front.layouts.app')

@section('content')


<section class="testimonials1 cid-rYUtsXJVWG" id="testimonials1-3v">

    
<?php $lenders= \App\Models\Lender::where('status', 'Active')->paginate(12); ?>

    
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 align-center">
                <h2 class="pb-3 mbr-fonts-style display-2">Lenders</h2>
                
            </div>
        </div>
    </div>

    <div class="container pt-3 mt-2">
        <div class="media-container-row">

        @foreach($lenders AS $row)
        <a  href="/more/lender/{{$row->id}}">
            <div class="mbr-testimonial p-3 align-center col-12 col-md-6 col-lg-4">
                <div class="panel-item p-3">
                    <div class="card-block">
                        <div class="testimonial-photo">
                            <img src="/thumbnail/{{$row->lenders_passport_photo}}">
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <div class="mbr-author-name mbr-bold mbr-fonts-style display-7">
                             {{$row->name}}
                        </div>
                        <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
                        {{$row->country}}
                        </small>
                        <hr>
                        <a class="btn btn-sm btn-primary display-3"
                                    style="background:#fff!important;color:#000!important; border-color:#000!important;"
                                    href="/more/lender/{{$row->id}}">Details
                                </a>
                    </div>
                </div>
            </div>
            </a>
            @endforeach

        </div>
    </div>   
</section>




<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $lenders->links() !!}</span>
</div>

@endsection
