@extends('front.layouts.app')

@section('content')

<?php $enterprise= \App\Models\LoanApplication::where('id',$id)->orderBy('id','DESC')->first();
$businessCategories= \App\Models\BusinessCategory::where('used',1)->orderBy('id','DESC')->get();
$centers= \App\Models\Center::where('status','Active')->orderBy('id','DESC')->get();
?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">
                    <strong>{{ $enterprise->name." 's Profile" }}</strong>

                </h2>
                <hr>

            </div>
        </div>
    </div>
</section>

<?php
if($enterprise){
?>


<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card p-3 col-sm-4">
                <div class="profile-img">
                    <img class="rounded-circle" style="width:210px;height:200px"
                        src="{{$enterprise->upload_passport_photo?'/thumbnail/'.$enterprise->upload_passport_photo:'/images/user.jpg' }}"
                        alt="" />

                </div>
                <div class="profile-work">
                    <p class="text-center m-5">Profile Details</p>
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
                            <p> <?php if($enterprise->category=='Short-listed-Enterprises'){
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
                        <p><b>Short Summary</b><br />{{$enterprise->short_summary}}</p>
                    </div>

                    <div class="col-12">
                        <?php if( $enterprise->description){ ?>
                        <p><b>More Details</b><br />{!!html_entity_decode($enterprise->description)!!}</p>
                        <?php } ?>
                    </div>
                    <div class="col-12">
                        <?php if( $enterprise->business_model_file){ ?>

                        <a href="/documents/{{ $enterprise->business_model_file }}" class="btn btn-info"> <i
                                class="fa fa-download"></i> Download business model</a>


                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="p-3 col-sm-3">
                <table style="width:100%;margin-left:-10px">
                <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                             href="/enterprises/search?category=Short-listed-Enterprises">Short-listed-Enterprises
                            </a>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                             href="/enterprises/search?category=Diaspora-Bank"
                                style="border:#58d77a !important; background:rgb(69, 80, 91)!important; color: #fff!important;">
                                Diaspora-Bank-Enterprises </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3" href="/enterprises/search?category=Pending-Enterprises"
                                style="border:#58d77a !important; background:#fa8709!important; color: #fff!important;">
                                Pending-Enterprises </a>
                        </td>
                    </tr>
                   
                   
                   
                </table>






                <hr>

                <ul class="list-group">
                    <li class="list-group-item active" style="border:#58d77a !important;background:rgb(69, 80, 91)!important;color:#fff!important">Business Categories</li>

                    @foreach($businessCategories as $businessCategory)
                    <li class="list-group-item "><a href="/enterprises/search?business_category={{$businessCategory->id}}" class="mbr-bold text-primary">{{$businessCategory->category}}</a>
                    </li>
                    @endforeach
                </ul>

                <ul class="list-group mt-3">
                    <li class="list-group-item active"
                    style="border:#58d77a !important;background:#58d77a!important;color:#fff!important">Centers</li>

                    @foreach($centers as $center)
                    <li class="list-group-item "><a href="/enterprises/search?center={{$center->id}}" 
                    class="mbr-bold text-primary"> {{$center->name.' - '.$center->country}}</a>
                    </li>
                    @endforeach
                </ul>



            </div>


        </div>
    </div>

</section>


<?php 
     $enterprises=\App\Models\LoanApplication::where('category',$enterprise->category)
     ->where('id','!=',$id)
     ->orderBy('id','DESC')->take(9)->get();
     if(count( $enterprises) > 0){
    ?>

<section class="mbr-section content4 cid-rYUin3zdln" id="content4-2y" style="background-color:rgb(69, 80, 91);">

    

<div class="container">

    <div class="media-container-row">
   
        <div class="title col-12 col-md-8">
        
            <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fff; "><strong>Related</strong></h2>
            
            
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


<section class="clients cid-rYUvGms2pw" data-interval="false" id="clients-3w">

    @include('front.component.partners-section')

</section>


@endsection
