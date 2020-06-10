@extends('front.layouts.app')

@section('content')

<?php 
     $centers=\App\Models\Center::orderBy('id','DESC')->where('status','Active')->take(6)->orderBy(DB::raw('RAND()'))->get();
     $lenders=\App\Models\Lender::orderBy('id','DESC')->where('status','Active')->take(6)->orderBy(DB::raw('RAND()'))->get();
     $donors=\App\Models\Donor::orderBy('id','DESC')->where('status','Active')->take(6)->orderBy(DB::raw('RAND()'))->get();

     $managers=\App\Models\MicroFundApplication::orderBy('id','DESC')->where('approved',1)->take(6)->orderBy(DB::raw('RAND()'))->get();
    ?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Profiles</strong></h2>


            </div>
        </div>
    </div>
</section>

<section class="clients cid-rYUvGms2pw" style="background:#efefef!important;">


    <div class="container mb-5">
        <div class="media-container-row">
            <div class="col-12 align-center">
                <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2" style="color:rgb(69, 80, 91);">Centers</h2>

            </div>
        </div>
    </div>

    <div class="container" style="margin-top:-30px">
       
        <div class="" role="listbox" >
        <div class="align-right" style="float:right">
            <nav>
                <ul class="pagination">

                    <li class="page-item" aria-disabled="true" aria-label="more..">
                        <a href="/more/centers"
                            style="cursor:pointer; border:#fa8709 !important;background:#fa8709!important; color: #fff!important;"
                            class="page-link" aria-hidden="true">View more..</a>
                    </li>
                </ul>
            </nav>

        </div>
            <div class="carousel-inner" data-visible="5" style="position:relative;top:-35px">



                @include('front.common.center-card',['centers'=>$centers])



            </div>

        </div>
    </div>

</section>

<section class="clients cid-rYUvGms2pw" style="background:#45505b!important;" data-interval="false" id="clients-3w">


    <div class="container mb-5">
        <div class="media-container-row">
            <div class="col-12 align-center">
                <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2" style="color: #e98e2a!important">Donors</h2>

            </div>
        </div>
    </div>

    
    <div class="container" style="margin-top:-30px">
       
        <div class="" role="listbox" >
        <div class="align-right" style="float:right">
            <nav>
                <ul class="pagination">

                    <li class="page-item" aria-disabled="true" aria-label="more..">
                        <a href="/more/donors"
                            style="cursor:pointer; border:#27a248 !important;background:#27a248!important; color: #fff!important;"
                            class="page-link" aria-hidden="true">View more..</a>
                    </li>
                </ul>
            </nav>

        </div>
            <div class="carousel-inner" data-visible="5" style="position:relative;top:-35px">



                @include('front.common.donor-card',['donors'=>$donors])



            </div>

        </div>
    </div>



</section>

<section class="clients cid-rYUvGms2pw" style="background:#efefef!important;">


    <div class="container mb-5">
        <div class="media-container-row">
            <div class="col-12 align-center">
                <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2" style="color:rgb(69, 80, 91);">Lenders</h2>

            </div>
        </div>
    </div>

    <div class="container" style="margin-top:-30px">
       
        <div class="" role="listbox" >
        <div class="align-right" style="float:right">
            <nav>
                <ul class="pagination">

                    <li class="page-item" aria-disabled="true" aria-label="more..">
                        <a href="/more/lenders"
                            style="cursor:pointer; border:#fa8709 !important;background:#fa8709!important; color: #fff!important;"
                            class="page-link" aria-hidden="true">View more..</a>
                    </li>
                </ul>
            </nav>

        </div>
            <div class="carousel-inner" data-visible="5" style="position:relative;top:-35px">



                @include('front.common.lender-card',['lenders'=>$lenders])



            </div>

        </div>
    </div>

</section>


<section class="clients cid-rYUvGms2pw" style="background:#45505b!important;" data-interval="false" id="clients-3w">


    <div class="container mb-5">
        <div class="media-container-row">
            <div class="col-12 align-center">
                <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2" style="color: #e98e2a!important">Fund
                    Managers</h2>

            </div>
        </div>
    </div>

    
    <div class="container" style="margin-top:-30px">
       
        <div class="" role="listbox" >
        <div class="align-right" style="float:right">
            <nav>
                <ul class="pagination">

                    <li class="page-item" aria-disabled="true" aria-label="more..">
                        <a href="/more/managers"
                            style="cursor:pointer; border:#27a248 !important;background:#27a248!important; color: #fff!important;"
                            class="page-link" aria-hidden="true">View more..</a>
                    </li>
                </ul>
            </nav>

        </div>
            <div class="carousel-inner" data-visible="5" style="position:relative;top:-35px">



                @include('front.common.manager-card',['managers'=>$managers])



            </div>

        </div>
    </div>



</section>




@endsection
