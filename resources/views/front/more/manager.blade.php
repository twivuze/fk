@extends('front.layouts.app')

@section('content')

<?php $manager= \App\Models\MicroFundApplication::where('approved',1)->where('id',$id)->orderBy('id','DESC')->first();


?>


<?php
if($manager){

    $center= \App\Models\Center::where('id',$manager->microfinance_center)->orderBy('id','DESC')->first();;
    // $enterprises=\App\Models\LoanApplication::where('microfinance_center',$center->id)->where('approved',1)->orderBy('views','DESC')->paginate(8);

?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-9 text-left">
                <h2 class="align-manager pb-3 mbr-fonts-style display-2 text-left ml-5">
                    <strong> {{ $manager->full_name }} </strong>


                </h2>


            </div>

            <div class="title col-12 col-md-3">
            <?php if($center){?>
                <table style="width:100%;margin-left:-10px">

                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                                href="/enterprises/search?center={{$center->id}}">Enterprises
                            </a>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                                href="/fillings/search?center={{$center->id}}"
                                style="border:#58d77a !important; background:rgb(69, 80, 91)!important; color: #fff!important;">
                                Fillings </a>

                        </td>
                    </tr>


                </table>




                <?php } ?>
            </div>
        </div>
    </div>
</section>



<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-manager">
            <div class="card p-3 col-sm-4">
                <div class="profile-img">
                    <img class="rounded-circle" style="width:210px;height:200px"
                        src="{{$manager->profile_photo?'/thumbnail/'.$manager->profile_photo:'/images/user.jpg' }}"
                        alt="" />

                </div>
                <div class="profile-work">
                    <p class="text-manager m-5">Profile Details </p>
                    <div class="row">
                        <div class="col-6">
                            <label>Full Name</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->full_name}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Email</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->email}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Phone number</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->phone_number}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Marital Status</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->marital_status}}</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <label>Gender</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->gender}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Address</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->address}}</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <label>Religion</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->religion}}</p>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-6">
                            <label>Country</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center?$center->country:''}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Center</label>
                        </div>
                        <div class="col-6">
                            <p>{{ $center? $center->name:'--' }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-8">
                <div class="row">


                    <div class="col-12">
                        <p>{{$manager->bio}}</p>
                    </div>

                    <div class="col-12">
                        <?php if( $manager->more_details){ ?>
                        <p><b>More Details</b><br />{!!html_entity_decode($manager->more_details)!!}</p>
                        <?php } ?>
                    </div>
                   



                </div>
            </div>


        </div>
    </div>

</section>


<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w">
    <div class="container">
        <div class="row justify-content-manager">
            <div class="media-container-column col-lg-8 text-center">

                <div class="alert text-center alert-warning alert-dismissible fade show mt-5 ml-5 text-manager title" role="alert">
                    <strong>No manager!</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>


@endsection
