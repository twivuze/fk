<div class="container-fluid">
        <div class="media-container-row">
        @foreach($enterprises as $enterprise)
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img" style="height:300px; width:100%; background-image: url('/thumbnail/{{$enterprise->upload_passport_photo}}'); background-repeat: no-repeat; background-size: cover;">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                        {{ $enterprise->name }}
                        </h4>
                        <?php if($enterprise->category=='Short-listed-Enterprises'){
                            ?>
                        <h6 class="label label-success">{{ $enterprise->category }}</h6>
                        <?php } ?>
                        <?php if($enterprise->category=='Diaspora-Bank'){
                            ?>
                        <h6 class="label label-default">{{ $enterprise->category }}</h6>
                        <?php } ?>
                        <?php if($enterprise->category=='Pending-Enterprises'){
                            ?>
                        <h6 class="label label-warning">{{ $enterprise->category }}</h6>
                        <?php } ?>
                        <hr>
                        <p class="mbr-text mbr-fonts-style display-7">
                           {{ $enterprise->what_makes_you_move_on_in_life }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
       
            
            
        </div>
    </div>