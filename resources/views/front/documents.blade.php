@extends('front.layouts.app')

@section('content')

<?php 
$filling = \App\Models\FillingCategory::find($id);
$documents= \App\Models\FillingDocument::where('filling_category_id',$id)->get() ?>



<section class="mbr-section content4 cid-rYUq0W1Zxh" id="content4-3i">

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fa8709">
                    {{$filling?$filling->name:''}} - Documents</h2>
                <hr style="color:#fff">

            </div>
        </div>
    </div>
</section>




<section class="mbr-gallery mbr-slider-carousel cid-rYUqipJbaB" id="gallery1-3j">

    <div class="container-fluid">
    <div class="media-container-row row">
        @foreach($documents AS $row)
        <div class="portfolio">

            <a href="#!" data-toggle="modal" data-target="#pdf{{$row->id}}">
                <img class="card-img" src="/images/pdf.png" alt="{{$row->name}}">
            </a>
            <div id="pdf{{$row->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$row->name}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body" style="overflow:hidden; text-align:left;">
                            <iframe src="/documents/{{$row->file_name}}#zoom=65" style="width:100%; height:600px" frameborder="0"
                                style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>


            <div class="desc">{{$row->name}}</div>
        </div>
        @endforeach

    </div>
    </div>

</section>

<section class="mbr-section form3 cid-rYMRYFsTOi" id="form3-21" data-bg-video="http://www.youtube.com/watch?v=uNCr7NdOJgw">

@include('front.component.search-file-section')

</section>


<section class="clients cid-rYUvGms2pw" style="background:#ffff!important;" data-interval="false" id="clients-3w">

    @include('front.component.partners-section')

</section>


@endsection
