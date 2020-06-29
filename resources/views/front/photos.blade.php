@extends('front.layouts.app')

@section('content')
<style>
    body{background-color: #45505b!important;}
</style>
<?php $photos= \App\Models\Photos::paginate(24); ?>

<section class="mbr-section content4 cid-rYUq0W1Zxh mt-5" id="content4-3i" style="position:relative;top:40px;background-color: #45505b!important;">

    <div class="container mt-5">
        <div class="media-container-row mt-5">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fa8709">Photos</h2>

            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery mbr-slider-carousel cid-rYUqipJbaB mt-5" id="gallery1-3j">

    <div>
        <div>
            <!-- Filter -->
            <!-- Gallery -->
            <div class="mbr-gallery-row">
                <div class="mbr-gallery-layout-default">
                    <div>
                        <div>
                        <?php $i=0; ?>
                        @foreach($photos AS $photo)
                            <div class="mbr-gallery-item mbr-gallery-item--p2" style="margin-left:10px;width:250px" data-video-url="false"
                                data-tags="Awesome">
                                <div href="#lb-gallery1-3j" data-slide-to="{{$i}}" data-toggle="modal"><img
                                        src="/{{$photo->image}}" alt="" title=""><span
                                        class="icon-focus"></span></div>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                         
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!-- Lightbox -->
            <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1"
                data-keyboard="true" data-interval="false" id="lb-gallery1-3j">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <ol class="carousel-indicators">
                            <?php $y=0; ?>
                           @foreach($photos AS $row)
                                <li data-app-prevent-settings="" data-target="#lb-gallery1-3j" class="{{$y==0?'active':''}}"
                                    data-slide-to="{{$y}}"></li>

                             <?php $y++; ?>
                            @endforeach 
                            </ol>
                            <div class="carousel-inner">
                            <?php $x=0; ?>
                            @foreach($photos AS $photo )
                                <div class="carousel-item {{$x==0?'active':''}}"><img src="/{{$photo->image}}" alt=""
                                        title=""></div>
                                        <?php $x++; ?>
                             @endforeach          
                               
                            
                            </div><a class="carousel-control carousel-control-prev" role="button" data-slide="prev"
                                href="#lb-gallery1-3j"><span class="mbri-left mbr-iconfont"
                                    aria-hidden="true"></span><span class="sr-only">Previous</span></a><a
                                class="carousel-control carousel-control-next" role="button" data-slide="next"
                                href="#lb-gallery1-3j"><span class="mbri-right mbr-iconfont"
                                    aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close"
                                href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $photos->links() !!}</span>
</div>


@endsection
