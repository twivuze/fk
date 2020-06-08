@extends('front.layouts.app')

@section('content')

<?php $centers= \App\Models\Center::orderBy('id','DESC')->where('status','Active')->paginate(12); ?>

<section class="mbr-section content4 cid-rYUfm4cV5h mt-5" id="content4-2t">

    

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Centers</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    

<div class="container-fluid">
        <div class="media-container-row row">

          @foreach($centers AS $row)
          
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                <a  href="/more/center/{{$row->id}}"> 
                <div class="card-img"
                    style="height:150px; width:100%; background-image: url('/thumbnail/{{$row->cover_image}}'); background-repeat: no-repeat; background-size: cover;">

                </div>
                </a>
                    <div class="card-box">
                        <h4 class="card-title align-center pb-3 mbr-fonts-style display-7">
                          
                        <?php $end1 = ' <a  href="/more/center/'.$row->id.'">  •••</a>'; ?>
                        {!!html_entity_decode(Str::limit($row->name, $limit = 22,$end1))!!}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                           
                        <?php  $end = ' <a  href="/more/center/'.$row->id.'"> read more ....</a>';
                        ?> 
    
                            {!!html_entity_decode(Str::limit($row->short_summary, $limit = 80,$end))!!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
         
            
            
        </div>
    </div>
    
   
</section>



<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center"> {!! $centers->links() !!}</span>
</div>


@endsection
