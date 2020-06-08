
@foreach($centers as $center)
<div class="carousel-item">
    <div class="media-container-row">
     <div class="card col-md-12 p-5" style="background:#ffff">
            <div class="card-wrapper" style="padding-top:20px">
                <div class="card-img"
                    style="height:150px; width:100%; background-image: url('/thumbnail/{{$center->cover_image}}'); background-repeat: no-repeat; background-size: cover;">

                </div>

                <div class="card-box">

                    <h4 class="card-title pb-3 mbr-fonts-style display-7 text-center" style="margin-top:15px">
                        <?php $end1 = ' <a  href="/centers/view/'.$center->id.'" target="_blank">  •••</a>'; ?>
                        {!!html_entity_decode(Str::limit($center->name, $limit = 22,$end1))!!}

                    </h4>
                   
                </div>

            </div>
        </div>
    </div>
    </div>

  
    @endforeach
  
