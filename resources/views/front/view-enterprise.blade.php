<?php $enterprise= \App\Models\LoanApplication::where('id',$id)->where('approved',1)->orderBy('id','DESC')->first();
?>

@extends('front.layouts.app',
['title'=>$enterprise->business_name.' Enterprise',
'description'=>$enterprise->short_summary,
]
)

@section('content')



<?php
if($enterprise){
    $businessCategories= \App\Models\BusinessCategory::where('used',1)->orderBy('id','DESC')->take(5)->orderBy(DB::raw('RAND()'))->get();
    $allBusinessType= \App\Models\BusinessCategory::where('used',1)->orderBy('id','DESC')->get();
$centers= \App\Models\Center::where('status','Active')->orderBy('id','DESC')->take(5)->orderBy(DB::raw('RAND()'))->get();
$amountLend = \App\Models\LenderInvoice::where('enterprise_id',$enterprise->id)->sum('amount');
$amountDonate = \App\Models\DonationInvoice::where('enterprise_id',$enterprise->id)->sum('amount');

$amountLoanInternalFunds = \App\Models\InternalFunder::where("type",'Loan')
->where('enterprise_id',$enterprise->id)->sum('fund');

$amountDonateInternalFunds = \App\Models\InternalFunder::where("type",'Donation')
->where('enterprise_id',$enterprise->id)->sum('fund');

$loan=intval($amountLend)+intval($amountLoanInternalFunds);

$donate=intval($amountDonate)+intval($amountDonateInternalFunds);

    $enterprise->views=$enterprise->views+1;
    $enterprise->save();

?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2 text-center">
                    <strong> {{ $enterprise->business_name }} |
                        {{ $enterprise->businessCategory? $enterprise->businessCategory->category:'' }}</strong>


                </h2>
                <p class="mbr-text mbr-fonts-style display-7 text-center">
                    {{$enterprise->fundraising_message}}
                </p>
                <hr>

            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card p-3 col-sm-4">
                <div class="profile-img">
                    <img class="rounded-circle" style="width:210px;height:200px"
                        src="{{$enterprise->upload_passport_photo?'/thumbnail/'.$enterprise->upload_passport_photo:'/images/male.jpg' }}"
                        alt="" />

                </div>
                <div class="profile-work">
                    <p class="text-center m-5">Profile Details</p>


                    <div class="row">
                        <div class="col-6">
                            <label>Views</label>
                        </div>
                        <div class="col-6">
                            <h1 style="font-size: 15px;font-weight:800" class="label label-default align-center">
                                {{$enterprise->views?$enterprise->views:0}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Name</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->name}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Email</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->email}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Address</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->address}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Country</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->country}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Region</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->region}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Marital status</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->marital_status}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Status</label>
                        </div>
                        <div class="col-6">
                            <p>{{$enterprise->status}}</p>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-6">
                            <label>Enterprise Category</label>
                        </div>
                        <div class="col-6">
                            <p> <?php if($enterprise->category=='Fully-Funded-Enterprises'){
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
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Business Category</label>
                        </div>
                        <div class="col-6">
                            <p>{{ $enterprise->businessCategory? $enterprise->businessCategory->category:'' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Center</label>
                        </div>
                        <div class="col-6">
                            <p>{{ $enterprise->center? $enterprise->center->name.' - '.$enterprise->center->country :'' }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <div class="row">

                    <div class="col-12">

                        <table style="width:100%;margin-left:-10px">
                            <tr>
                                <?php if($enterprise->category!='Fully-Funded-Enterprises'){ ?>

                                    <?php if(intval($enterprise->lender_initial_target) > 0  && (intval($loan) < intval($enterprise->lender_initial_target) ) ){?>
                                <td>
                                    <a class="btn btn-sm btn-primary btn-block display-3"
                                        href="/lender-enterprise?lendEnterprise={{$enterprise->id}}">Lend
                                    </a>
                                </td>
                                <?php } } ?>
                                <?php if(intval($enterprise->donor_initial_target) > 0 ){ ?>
                                <td>
                                    <a class="btn btn-sm btn-primary btn-block display-3"
                                        href="/donate-enterprise?donateEnterprise={{$enterprise->id}}"
                                        style="background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;">Donate
                                    </a>
                                </td>
                                <?php } ?>
                            </tr>
                        </table>

                    </div>


                    <div class="col-12">
                        <p>{{$enterprise->short_summary}}</p>
                    </div>

                    <div class="col-12">
                        <?php if( $enterprise->description){ ?>
                        <p><b>More Details</b><br />{!!html_entity_decode($enterprise->description)!!}</p>
                        <?php } ?>
                    </div>
                    <div class="col-12 mt-5">
                        <?php if( $enterprise->business_model_file){ ?>
                        <hr>

                        <a href="/documents/{{ $enterprise->business_model_file }}" class="btn btn-info btn-block"> <i
                                class="fa fa-download"></i> Download business model</a>


                        <?php } ?>
                    </div>
                    <?php
                
                if(intval($enterprise->lender_initial_target) > 0){ ?>

                    <div class="col-12 mt-5">

                     
                        <table style="width:100%;border:0px solid">
                            <tr rowspan="2">
                                <th>
                                    <b>{{ number_format(intval($loan), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Loans</b>
                                </th>
                                <th>
                                    <b style="text-right; float:right">{{ number_format(intval($enterprise->lender_initial_target), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}}
                                        Target</b>


                                </th>

                            </tr>
                            <tr>
                                <th colspan="2">
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
                                </th>

                            </tr>
                        </table>

                      
                    </div>

                    <?php } ?>

                    <?php

                    if(intval($enterprise->donor_initial_target) > 0){ ?>

                    <div class="col-12 mt-5">

                      
                        <table style="width:100%;border:0px solid">
                            <tr rowspan="2">
                                <th>
                                    <b>{{ number_format(intval($donate), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donations</b>
                                </th>
                                <th>
                                    <b style="text-right; float:right">{{ number_format(intval($enterprise->donor_initial_target), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}}
                                        Target</b>


                                </th>

                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar"
                                            style="width:{{(intval($donate)*100)/intval($enterprise->donor_initial_target)}}%;"
                                            role="progressbar"
                                            aria-valuenow="{{(intval($donate)*100)/intval($enterprise->donor_initial_target)}}"
                                            aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>
                                    <div class="text-center" style="color: #58d77a;font-weight:800">
                                    <?php if( (intval($enterprise->donor_initial_target)-$donate)  > 0){ ?>
                                    {{ number_format( intval($enterprise->donor_initial_target)-$donate, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donation remaining

                                    <?php }else{ ?>
                                    {{ number_format( $donate, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donation Target Reached

                                    <?php }?>
                                  </div>
                                </th>

                            </tr>
                        </table>

                       
                    </div>
                    <?php } ?>

                </div>
            </div>

            <div class="p-3 col-sm-3">

                <table style="width:100%;margin-left:-10px">
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                                href="/enterprises/search?category=Fully-Funded-Enterprises">Fully-Funded-Enterprises
                            </a>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                                href="/enterprises/search?category=Diaspora-Funded-Enterprises"
                                style="border:#58d77a !important; background:rgb(69, 80, 91)!important; color: #fff!important;">
                                Diaspora-Funded-Enterprises </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                                href="/enterprises/search?category=Enterprises-Awaiting-Funding"
                                style="border:#58d77a !important; background:#fa8709!important; color: #fff!important;">
                                Enterprises-Awaiting-Funding </a>
                        </td>
                    </tr>



                </table>






                <hr>

                <ul class="list-group">
                    <li class="list-group-item active"
                        style="border:#58d77a !important;background:rgb(69, 80, 91)!important;color:#fff!important">
                        Business Types</li>

                    @foreach($businessCategories as $businessCategory)
                    <li class="list-group-item "><a
                            href="/enterprises/search?business_category={{$businessCategory->id}}"
                            class="mbr-bold text-primary">{{$businessCategory->category}}</a>
                    </li>
                    @endforeach
                    <?php if(count( $businessCategories) > 0){?>
                    <li class="list-group-item align-center ">
                        <a href="#" data-toggle="modal" data-target="#exampleModalLong" class="align-center"
                            style="color: #fa8709!important;">View more..</a>
                    </li>
                    <?php } ?>



                </ul>

                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">More Business Types</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item active"
                                        style="border:#58d77a !important;background:rgb(69, 80, 91)!important;color:#fff!important">
                                        Business Types</li>

                                    @foreach($allBusinessType as $type)
                                    <li class="list-group-item "><a
                                            href="/enterprises/search?business_category={{$type->id}}"
                                            class="mbr-bold text-primary">{{$type->category}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>




                <ul class="list-group mt-3">
                    <li class="list-group-item active"
                        style="border:#58d77a !important;background:#58d77a!important;color:#fff!important">Centers</li>

                    @foreach($centers as $center)
                    <li class="list-group-item "><a href="/enterprises/search?center={{$center->id}}"
                            class="mbr-bold text-primary"> {{$center->name}}</a>
                    </li>
                    @endforeach
                    <?php if(count( $centers) > 0){?>
                    <li class="list-group-item align-center ">
                        <a href="/more/centers" class="align-center" style="color: #fa8709!important;">View more..</a>
                    </li>
                    <?php } ?>
                </ul>



            </div>


        </div>
    </div>

</section>


<?php 
     $enterprises=\App\Models\LoanApplication::where('category',$enterprise->category)
     ->where('approved',1)
     ->where('id','!=',$id)
     ->orderBy('id','DESC')->take(3)->orderBy(DB::raw('RAND()'))->get();
     if(count( $enterprises) > 0){
    ?>

<section class="mbr-section content4 cid-rYUin3zdln" id="content4-2y" style="background-color:rgb(69, 80, 91);">



    <div class="container">

        <div class="media-container-row">

            <div class="title col-12 col-md-8">

                <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fff; "><strong>Related</strong>
                </h2>


            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">


    @include('front.common.enterprise-card',['enterprises'=>$enterprises])


</section>
<?php } ?>
<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">

                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title" role="alert">
                    <strong>No Enterprise!</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>

<hr>
<section class="clients cid-rYUvGms2pw" style="background:#ffff!important;" data-interval="false" id="clients-3w">

    @include('front.component.partners-section')

</section>


@endsection
