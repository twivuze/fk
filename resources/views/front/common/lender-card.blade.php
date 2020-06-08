
@foreach($lenders as $lender)
<div class="carousel-item">
    <div class="media-container-row">
     <div class="card col-md-12 p-5" style="background:#ffff">
     <a  href="#">
            <div class="card-wrapper" style="padding-top:20px">
                <div class="card-img"
                    style="height:150px; width:100%; background-image: url('/thumbnail/{{$lender->lenders_passport_photo}}'); background-repeat: no-repeat; background-size: cover;">

                </div>

                <div class="card-box">

                    <h4 class="card-title pb-3 mbr-fonts-style display-7 text-lender" style="margin-top:15px">
                        {{$lender->name}}<hr>
                        <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
                        {{$lender->address?$lender->address.',':''}} {{$lender->country}}
                        </small>
                    </h4>
                    
                   
                </div>

            </div>
            </a>
        </div>
    </div>
    </div>

  
    @endforeach
  
