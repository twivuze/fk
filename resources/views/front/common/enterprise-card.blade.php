<div class="container-fluid">
    <div class="media-container-row">
        @foreach($enterprises as $enterprise)
        <div class="card p-3 col-12 col-md-6 col-lg-3">
            <div class="card-wrapper">
                <div class="card-img"
                    style="height:300px; width:100%; background-image: url('/thumbnail/{{$enterprise->upload_passport_photo}}'); background-repeat: no-repeat; background-size: cover;">
                </div>
                <div class="card-box">
                   <div class="row">
                   <div class="col-6">
                   <h4 class="card-title pb-3 mbr-fonts-style display-7">
                        {{ $enterprise->name }}

                    </h4>
                  
                    </div>
                    <div class="col-6">
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
                    </div>
                   </div>
                   {{ $enterprise->center? 'Center:'.$enterprise->center->region.' - '.$enterprise->center->country.'<br />' :'' }}
                    {{ $enterprise->businessCategory? 'Business category:'.$enterprise->businessCategory->category:'' }}
                    <hr>
                    <p class="mbr-text mbr-fonts-style display-7">
                        {{ $enterprise->short_summary }}
                        <?php $end = ' <a  href="/enterprises/view/'.$enterprise->id.'" target="_blank"> read more ....</a>'; ?>

                        {!!html_entity_decode(Str::limit($enterprise->short_summary, $limit = 60,$end))!!}
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
