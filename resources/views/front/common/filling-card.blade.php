
<div class="container-fluid">
    <div class="media-container-row row">
        @foreach($fillings as $file)
        <div class="card p-3 col-6 col-md-3 col-sm-4 col-lg-2">
                <a href="/fillings/{{$file->id}}/documents">
            <div class="card-wrapper">
                <div class="card-img"
                    style="height:200px; width:100%; background-image: url('/thumbnail/{{$file->image}}'); background-repeat: no-repeat; background-size: cover;">
                   
                </div>
               
                <div class="card-box">
                 
                   <h4 class="card-title pb-1 mbr-fonts-style display-7 text-center">
                        {{ $file->name }}

                    </h4>
             
                </div>
               
            </div>
            </a>
        </div>
        @endforeach



    </div>
</div>
