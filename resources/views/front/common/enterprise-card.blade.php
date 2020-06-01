<div class="container-fluid">
    <div class="media-container-row">
        @foreach($enterprises as $enterprise)
        <div class="card p-3 col-12 col-md-6 col-lg-3">
            <div class="card-wrapper">
                <div class="card-img"
                    style="height:300px; width:100%; background-image: url('/thumbnail/{{$enterprise->upload_passport_photo}}'); background-repeat: no-repeat; background-size: cover;">
                    <div style="position:relative;top:280px;right:5;float:right">
                    <?php if($enterprise->category=='Fully-Funded-Enterprises'){
                            ?>
                    <h6 class="label label-success">{{ $enterprise->category }}</h6>
                    <?php } ?>
                    <?php if($enterprise->category=='Diaspora-Funded-Enterprises'){
                            ?>
                    <h6 class="label label-default">{{ $enterprise->category }}</h6>
                    <?php } ?>
                    <?php if($enterprise->category=='Enterprises-Awaiting-Funding'){
                            ?>
                    <h6 class="label label-warning">{{ $enterprise->category }}</h6>
                    <?php } ?>
                    </div>
                </div>
               
                <div class="card-box">
                 
                   <h4 class="card-title pb-3 mbr-fonts-style display-7 text-center">
                        {{ $enterprise->business_name }}

                    </h4>
                    <h6 class="card-title pb-3 mbr-fonts-style display-7 text-center">
                       <b> {{ $enterprise->country }}</b>

                    </h6>
                    <hr>
                    
                
                    <p class="mbr-text mbr-fonts-style display-7">
                     
                        <?php $end = ' <a  href="/enterprises/view/'.$enterprise->id.'" target="_blank"> read more ....</a>'; ?>

                        {!!html_entity_decode(Str::limit($enterprise->fundraising_message, $limit = 140,$end))!!}
                    </p>


                </div>
                <div class="card-footer">
                    <table style="width:100%;margin-left:-10px">
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-primary btn-block display-3" href="#">Lend
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                 href="#">Donor
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary btn-block display-3"
                                 href="/enterprises/view/{{$enterprise->id}}">View
                                </a>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        @endforeach



    </div>
</div>
