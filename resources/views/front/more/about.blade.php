@extends('front.layouts.app')

@section('content')



<section class="mbr-gallery gallery5 cid-rYUla9oZUo" id="gallery5-31">


    <div class="container">
        <h3 class="mbr-section-title align-center mbr-fonts-style display-2">
            Mission<br><br>
        </h3>
        
        <div class="row mbr-gallery" data-toggle="modal" data-target="#rYUxKjjLlw">
            <div class="col-sm-6 col-md-4 col-lg-3 item gallery-image">
                <div class="item-wrapper" style="height: 180px;">
                    <img class="w-100" src="/assets/images/background1.jpg" alt="" data-slide-to="0" data-target="#rYUxKjkMOb">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 item gallery-image">
                <div class="item-wrapper" style="height: 180px;">
                    <img class="w-100" src="/assets/images/background2.jpg" alt="" data-slide-to="1" data-target="#rYUxKjkMOb">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 item gallery-image">
                <div class="item-wrapper" style="height: 180px;">
                    <img class="w-100" src="/assets/images/background3.jpg" alt="" data-slide-to="2" data-target="#rYUxKjkMOb">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 item gallery-image">
                <div class="item-wrapper" style="height: 180px;">
                    <img class="w-100" src="/assets/images/background4.jpg" alt="" data-slide-to="3" data-target="#rYUxKjkMOb">
                </div>
            </div>
        </div>

        <div class="modal mbr-slider fade" tabindex="-1" role="dialog" aria-hidden="true" id="rYUxKjjLlw">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel slide" data-ride="carousel" id="rYUxKjkMOb">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/assets/images/background1.jpg" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/assets/images/background2.jpg" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/assets/images/background3.jpg" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/assets/images/background4.jpg" alt="">
                                </div>
                            </div>
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" class="active" data-target="#rYUxKjkMOb"></li>
                                <li data-slide-to="1" data-target="#rYUxKjkMOb"></li>
                                <li data-slide-to="2" data-target="#rYUxKjkMOb"></li>
                                <li data-slide-to="3" data-target="#rYUxKjkMOb"></li>
                            </ol>
                            <a role="button" href="" class="close" data-dismiss="modal" aria-label="Close">
                            </a>
                            <a class="carousel-control-prev carousel-control" role="button" data-slide="prev" href="#rYUxKjkMOb">
                                <span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next carousel-control" role="button" data-slide="next" href="#rYUxKjkMOb">
                                <span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="clients cid-rYUvGms2pw" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>


@endsection
