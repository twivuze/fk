@extends('front.layouts.app')

@section('content')

<div class="mt-5">
<section class="mbr-section form3 cid-rYMRYFsTOi mt-5" id="form3-21" data-bg-video="http://www.youtube.com/watch?v=uNCr7NdOJgw">

@include('front.component.search-section')

</section>
</div>
<?php  if(count( $enterprises) > 0){?>

<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    
@include('front.common.enterprise-card',['enterprises'=>$enterprises])
    
   
</section>
<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">

                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title" role="alert">
                    <strong>No Enterprise found!</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>

<hr>
<section class="clients cid-rYUvGms2pw" style="background:#ffff!important;" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>


@endsection
