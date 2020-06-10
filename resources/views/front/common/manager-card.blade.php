
@foreach($managers as $manager)

<div class="carousel-item">
    <div class="media-container-row">
   
     <div class="card col-md-12 p-5" style="background:#ffff">
     <a  href="/more/manager/{{$manager->id}}"> 
            <div class="card-wrapper" style="padding-top:20px">
                <div class="card-img"
                    style="height:150px; width:100%; background-image: url('/thumbnail/{{$manager->profile_photo}}'); background-repeat: no-repeat; background-size: cover;">

                </div>

                <div class="card-box">

                    <h4 class="card-title pb-3 mbr-fonts-style display-7 text-center" style="margin-top:15px">
                        {{$manager->full_name}}
                        <hr>
                        <a class="btn btn-sm btn-primary display-3"
                                    style="background:#fff!important;color:#000!important; border-color:#000!important;"
                                    href="/more/manager/{{$manager->id}}">Details
                                </a>
                    </h4>
                   
                </div>

            </div>
            </a>
       
        </div>

      
    </div>
    </div>

  
    @endforeach
  
