@extends('front.layouts.app')

@section('content')



<section class="mbr-gallery gallery5 cid-rYUla9oZUo" id="gallery5-31">


    <div class="container">
        <h3 class="mbr-section-title align-center mbr-fonts-style display-2">
            Videos & Links<br><br>
        </h3>
        <?php $links= App\Models\VideosLinks::orderBy('id','DESC')
        ->where('type','Link')->where('published',true)->get();

           $videos= App\Models\VideosLinks::orderBy('id','DESC')
           ->where('type','YoutubeLink')->where('published',true)->get();
        ?>
        <div class="row media-container-row">
            @foreach($videos AS $story)
            
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <div class="modalWindow-video" style="height: 180px;">
                            <iframe width="100%" height="100%" frameborder="0" allowfullscreen="1"
                                data-src="{{$story->link}}"></iframe>
                        </div>

                    </div>
                    <div class="card-box p-3 bg-white">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            <?php  $end = ' <a  href="/more/links/'.$story->id.'" target="_blank"> ...</a>'; ?>
                            {!!html_entity_decode(Str::limit($story->title, $limit = 400,$end)) !!}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <?php  $end = ' <a  href="/more/links/'.$story->id.'" target="_blank"> read more ....</a>'; ?>
                            {!!html_entity_decode(Str::limit($story->contents, $limit = 200,$end))!!}
                        </p>
                    </div>
                </div>
            </div>

            @endforeach
            </div>
            <div class="row media-container-row">
            @foreach($links AS $story)

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <a href="{{$story->link}}">
                        <div class="card-box p-3 bg-white">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                                <?php  $end = ' <a  href="/more/links/'.$story->id.'" target="_blank"> ...</a>'; ?>
                                {!!html_entity_decode(Str::limit($story->title, $limit = 400,$end)) !!}
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <?php  $end = ' <a  href="/more/links/'.$story->id.'" target="_blank"> read more ....</a>'; ?>
                                {!!html_entity_decode(Str::limit($story->contents, $limit = 100,$end))!!}
                            </p>
                        </div>
                    </a>
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
