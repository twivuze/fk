@extends('front.layouts.app')

@section('content')


<section class="header8 cid-rYMyQ3IifK " id="header8-1q">

@include('front.component.slider-section')
</section>

<section class="mbr-section form3 cid-rYMRYFsTOi" id="form3-21" data-bg-video="http://www.youtube.com/watch?v=uNCr7NdOJgw">

    @include('front.component.search-section')

</section>

<section class="mbr-section content4 cid-rYUfuivAPG" id="content4-2u">

<?php 
     $pending=\App\Models\LoanApplication::where('category','=','Pending-Enterprises')->where('approved',1)->take(3)->get();
     $shortlisted=\App\Models\LoanApplication::where('category','=','Short-listed-Enterprises')->where('approved',1)->take(3)->get();
     $diasporaBank=\App\Models\LoanApplication::where('category','=','Diaspora-Bank')->where('approved',1)->take(3)->get();
    ?>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Short-listed Enterprises</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>

<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">

    
@include('front.common.enterprise-card',['enterprises'=>$shortlisted])
    
   
</section>

<section class="mbr-section content4 cid-rYUin3zdln" id="content4-2y">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Diaspora Bank</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>

<section class="features17 cid-rYUihfOEje" id="features17-2x">
    
@include('front.common.enterprise-card',['enterprises'=>$diasporaBank])

</section>

<section class="mbr-section content4 cid-rYUfm4cV5h" id="content4-2t">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>
                    Pending Enterprises</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>

<section class="features17 cid-rYUiJVUB3K" id="features17-2z">
    
@include('front.common.enterprise-card',['enterprises'=>$pending])

</section>

<section class="clients cid-rYUvGms2pw" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>



@endsection
