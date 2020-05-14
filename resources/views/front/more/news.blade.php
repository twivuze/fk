@extends('front.layouts.app')

@section('content')

<section class="mbr-section content4 cid-rYUfm4cV5h mt-5" id="content4-2t">

    

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>News</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    
@include('front.common.enterprise-card')
    
   
</section>


<section class="clients cid-rYUvGms2pw" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>


@endsection
