@extends('front.layouts.app')

@section('content')
<?php $sections= \App\Models\AboutSections::orderBy('position','DESC')->get() ?>


<section class="mbr-gallery gallery5 cid-rYUla9oZUo" id="gallery5-31">


    <div class="container">
        @foreach($sections AS $section)

        <?php $photos[$section->id]= \App\Models\AboutContents::where('about_section_id', $section->id)->get() ?>
            <?php $i[$section->id]=0;
               if(count($photos[$section->id]) > 0){

                ?>
        <h3 class="mbr-section-title align-center mbr-fonts-style display-2">
            {{$section->name}}<br><br>
        </h3>

        <div class="row mbr-gallery" data-toggle="modal" data-target="#rYUxKjjLlw{{$section->id}}">
          

         
            @foreach($photos[$section->id] AS $photo)
            <div class="col-sm-6 col-md-4 col-lg-3 item gallery-image">
                <div class="item-wrapper" style="height: 180px;">
                    <img class="w-100" src="/{{$photo->image}}" alt="" data-slide-to="{{$i[$section->id]}}"
                        data-target="#rYUxKjkMOb{{$section->id}}">
                </div>
            </div>
            <?php $i[$section->id]++; ?>
            @endforeach

        </div>

        <div class="modal mbr-slider fade" tabindex="-1" role="dialog" aria-hidden="true"
            id="rYUxKjjLlw{{$section->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel slide" data-ride="carousel" id="rYUxKjkMOb{{$section->id}}">
                            <div class="carousel-inner">
                                <?php $x[$section->id]=0; ?>
                                @foreach($photos[$section->id] AS $photo)
                                <div class="carousel-item {{$x[$section->id]==0?'active':''}}">
                                    <img class="d-block w-100" src="/{{$photo->image}}" alt="">
                                </div>
                                <?php $x[$section->id]++; ?>
                                @endforeach
                            </div>
                            <ol class="carousel-indicators">
                                <?php $y[$section->id]=0; ?>
                                @foreach($photos[$section->id] AS $photo)
                                <li data-slide-to="{{$y[$section->id]}}" class="{{$y[$section->id]==0?'active':''}}"
                                    data-target="#rYUxKjkMOb{{$section->id}}"></li>
                                <?php $y[$section->id]++; ?>
                                @endforeach
                            </ol>
                            <a role="button" href="" class="close" data-dismiss="modal" aria-label="Close">
                            </a>
                            <a class="carousel-control-prev carousel-control" role="button" data-slide="prev"
                                href="#rYUxKjkMOb{{$section->id}}">
                                <span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next carousel-control" role="button" data-slide="next"
                                href="#rYUxKjkMOb{{$section->id}}">
                                <span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <?php } ?>

        @endforeach
    </div>

</section>
<?php $news= \App\Models\AboutUsHistory::get() ?>
<?php  if(count($news) > 0){?>
<section class="mbr-section content4 cid-rYUfm4cV5h" id="content4-2t">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Our History</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>
<?php  } ?>

<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    


<div class="container-fluid">
        <div class="media-container-row">

          @foreach($news AS $row)
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="/thumbnail/{{$row->image}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                          
                            <?php  $end = ' <a  href="/more/history/'.$row->id.'" target="_blank"> ...</a>';
                        ?> 
                            {!!html_entity_decode(Str::limit($row->title, $limit = 30,$end)) !!}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                           
                        <?php  $end = ' <a  href="/more/history/'.$row->id.'" target="_blank"> read more ....</a>';
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


<section class="clients cid-rYUvGms2pw" data-interval="false" id="clients-3w">

    @include('front.component.partners-section')

</section>


@endsection
