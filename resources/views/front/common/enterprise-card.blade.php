 <div class="container-fluid">
    <div class="media-container-row row">
        @foreach($enterprises as $enterprise)
        <div class="card p-3 col-12 col-md-6 col-lg-3">
            <div class="card-wrapper">
            <?php $sample=$enterprise->gender=='Male'?'/images/male.jpg':'/images/female.jpg'; ?>
                <div class="card-img"
                    style="height:300px; width:100%; background-image: url({{$enterprise->upload_passport_photo?'/thumbnail/'.$enterprise->upload_passport_photo:$sample }}); background-repeat: no-repeat; background-size: cover;">
                   <div style="position:relative;top:280px;left:5;float:left">
                   <h6 class="label label-default">Views ({{$enterprise->views?$enterprise->views:0}})</h6></div>
                    <div style="position:relative;top:280px;right:5;float:right">
                        <?php 
                    $amountLend = \App\Models\LenderInvoice::where('enterprise_id',$enterprise->id)->sum('amount');
                    $amountDonate = \App\Models\DonationInvoice::where('enterprise_id',$enterprise->id)->sum('amount');

                    $amountLoanInternalFunds = \App\Models\InternalFunder::where("type",'Loan')
                    ->where('enterprise_id',$enterprise->id)->sum('fund');

                    $amountDonateInternalFunds = \App\Models\InternalFunder::where("type",'Donation')
                    ->where('enterprise_id',$enterprise->id)->sum('fund');

                    $loan=intval($amountLend)+intval($amountLoanInternalFunds);

                    $donate=intval($amountDonate)+intval($amountDonateInternalFunds);


                    if($enterprise->category=='Fully-Funded-Enterprises'){
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
                        <?php $end1 = ' <a  href="/enterprises/view/'.$enterprise->id.'" target="_blank">  •••</a>'; ?>
                        {!!html_entity_decode(Str::limit($enterprise->business_name, $limit = 22,$end1))!!}

                    </h4>
                    <h6 class="card-title pb-3 mbr-fonts-style display-7 text-center">
                        <b> {{ $enterprise->country }}</b>

                    </h6>
                    <hr>

                    <p class="mbr-text mbr-fonts-style display-7">

                        <?php $end = ' <a  href="/enterprises/view/'.$enterprise->id.'" target="_blank">  •••</a>'; ?>

                        {!!html_entity_decode(Str::limit($enterprise->fundraising_message, $limit = 64,$end))!!}
                    </p>
                    <?php if(intval($enterprise->lender_initial_target) > 0){ ?>

                    <div class="progress" style="height:8px;">
                        <div class="progress-bar"
                            style="width:{{(intval($loan)*100)/intval($enterprise->lender_initial_target)}}%; background:#58d77a;"
                            role="progressbar"
                            aria-valuenow="{{(intval($loan)*100)/intval($enterprise->lender_initial_target)}}"
                            aria-valuemin="0" aria-valuemax="100"></div>

                    </div>
                    <div class="text-center" style="color: #58d77a;font-weight:800">

                   <?php if( (intval($enterprise->lender_initial_target)-$loan)  > 0){ ?>
                    {{ number_format( intval($enterprise->lender_initial_target)-$loan, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Loans Remaining
                
                   <?php }else{ ?>
                    {{ number_format( $loan, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Loan Target Reached
                   
                    <?php }?>
                    </div>
                    <?php } ?>
                    <?php if(intval($enterprise->donor_initial_target) > 0){ ?>

                    <div class="progress" style="height:8px;">
                        <div class="progress-bar"
                            style="width:{{(intval($donate)*100)/intval($enterprise->donor_initial_target)}}%;"
                            role="progressbar"
                            aria-valuenow="{{(intval($donate)*100)/intval($enterprise->donor_initial_target)}}"
                            aria-valuemin="0" aria-valuemax="100"></div>

                    </div>
                    <div class="text-center" style="color: #007bff;font-weight:800">

                    <?php if( (intval($enterprise->donor_initial_target)-$donate)  > 0){ ?>
                    {{ number_format( intval($enterprise->donor_initial_target)-$donate, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donation remaining

                    <?php }else{ ?>
                    {{ number_format( $donate, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donation Target Reached

                    <?php }?>
                    </div>
                    <?php } ?>

                    </div>
                <div class="card-footer">
                    <table style="width:100%;margin-left:-10px">
                        <tr>
                            <?php if($enterprise->category!='Fully-Funded-Enterprises'){?>

                            <?php if(intval($enterprise->lender_initial_target) > 0  && (intval($loan) < intval($enterprise->lender_initial_target) ) ){?>
                            <td>
                                <a class="btn btn-sm btn-primary btn-block display-3"
                                    href="/lender-enterprise?lendEnterprise={{$enterprise->id}}">Lend
                                </a>
                            </td>
                            <?php } } ?>

                            <?php if(intval($enterprise->donor_initial_target) > 0 ){?>
                            <td>
                                <a class="btn btn-sm btn-primary btn-block display-3"
                                    href="/donate-enterprise?donateEnterprise={{$enterprise->id}}"
                                    style="background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;">Donate
                                </a>
                            </td>
                            <?php }  ?>
                            <td>
                                <a class="btn btn-sm btn-primary btn-block display-3"
                                    style="background:#fff!important;color:#000!important; border-color:#000!important;"
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
