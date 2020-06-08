@extends('front.layouts.app')

@section('content')

<?php 
     $new = \App\Models\News::where('published', true)->where('id',$id)->first();
     $news= \App\Models\News::where('published', true)->where('id','!=',$id)->take(3)->orderBy(DB::raw('RAND()'))->get();
 ?>

<section class="mbr-section content4 cid-rYUfm4cV5h mt-5" id="content4-2t">

    

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>{{$new->title}}</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    

<div class="container-fluid">

<div class="media-container-row">

  <div class="card p-3 col-12 col-md-8 col-lg-8">
      <div class="card-wrapper">
          <div class="card-img">
              <img src="/images/{{$new->image}}" alt="Mobirise">
          </div>
          <div class="card-box">
              <h4 class="card-title pb-3 mbr-fonts-style display-7">
                {{$new->title}}
              </h4>
              <p class="mbr-text mbr-fonts-style display-7">
               
                  {!!html_entity_decode($new->description)!!}
              </p>
          </div>
      </div>
  </div>

  
  
</div>

</section>

<section class="mbr-section content4 cid-rYUin3zdln" id="content4-2y" style="background-color:rgb(69, 80, 91);">

    

<div class="container">

    <div class="media-container-row">
   
        <div class="title col-12 col-md-8">
        
            <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fff; "><strong>Related</strong></h2>
            
            
        </div>
    </div>
</div>
</section>

<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
        <div class="media-container-row">

          @foreach($news AS $row)
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="/thumbnail/{{$row->image}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                          
                            <?php  $end = ' <a  href="/more/new/'.$row->id.'" target="_blank"> ...</a>';
                        ?> 
                            {!!html_entity_decode(Str::limit($row->title, $limit = 30,$end)) !!}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                           
                        <?php  $end = ' <a  href="/more/new/'.$row->id.'" target="_blank"> read more ....</a>';
                        ?> 
    
                            {!!html_entity_decode(Str::limit($row->description, $limit = 100,$end))!!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
         
            
            
        </div>
    </div>
    
   
</section>



@endsection
