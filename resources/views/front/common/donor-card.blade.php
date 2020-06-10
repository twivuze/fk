
@foreach($donors as $donor)
<div class="carousel-item">
    <div class="media-container-row">
     <div class="card col-md-12 p-5" style="background:#ffff">
     <a  href="/more/donor/{{$donor->id}}">
            <div class="card-wrapper" style="padding-top:20px">
                <div class="card-img"
                    style="height:150px; width:100%; background-image: url('/thumbnail/{{$donor->donors_passport_photo}}'); background-repeat: no-repeat; background-size: cover;">

                </div>

                <div class="card-box">

                    <h4 class="card-title pb-3 mbr-fonts-style display-7 text-donor" style="margin-top:15px">
                        {{$donor->name}}<br><br>
                        <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
                        {{$donor->country}}
                        </small>
                        <hr>
                        <a class="btn btn-sm btn-primary display-3"
                                    style="background:#fff!important;color:#000!important; border-color:#000!important;"
                                    href="/more/donor/{{$donor->id}}">Details
                                </a>
                    </h4>
                   
                   
                </div>

            </div>
            </a>
        </div>
    </div>
    </div>

  
    @endforeach
  
