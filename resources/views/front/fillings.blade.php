@extends('front.layouts.app',
['title'=>'Fillings',
'description'=>All Fillings'
]
)

@section('content')
<?php 
$fillings = \App\Models\FillingCategory::where('published',1)->orderBy('id','DESC')->paginate(18);
?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Fillings</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>
<section class="mbr-section form3 cid-rYMRYFsTOi" id="form3-21" data-bg-video="http://www.youtube.com/watch?v=uNCr7NdOJgw">

@include('front.component.search-file-section')

</section>

<section class="features17 cid-rYUhzEzUWQ " id="features17-2w">
    
@include('front.common.filling-card',['fillings'=>$fillings])
   
</section>



<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $fillings->links() !!}</span>
</div>

@endsection
