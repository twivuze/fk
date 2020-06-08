@extends('front.layouts.app')

@section('content')

<?php 
     $enterprises=\App\Models\LoanApplication::orderBy('id','DESC')->where('approved',1)->orderBy('views','DESC')->paginate(9);
    ?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>All Enterprises</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>
<section class="mbr-section form3 cid-rYMRYFsTOi" id="form3-21" data-bg-video="http://www.youtube.com/watch?v=uNCr7NdOJgw">

@include('front.component.search-section')

</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    
@include('front.common.enterprise-card',['enterprises'=>$enterprises])

        
   
</section>
<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $enterprises->links() !!}</span>
</div>



@endsection
