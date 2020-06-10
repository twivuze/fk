@extends('front.layouts.app')

@section('content')

<?php $manager= \App\Models\Donor::where('status','Active')->where('id',$id)->orderBy('id','DESC')->first();


?>


<?php
if($manager){

   
?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8 text-center">
                <h2 class="align-manager pb-3 mbr-fonts-style display-2 text-center ml-5">
                    <strong> {{ $manager->name }} </strong>


                </h2>


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
                        src="{{$manager->lenders_passport_photo?'/thumbnail/'.$manager->lenders_passport_photo:'/images/user.jpg' }}"
                        alt="" />

                </div>
                <div class="profile-work">
                    <p class="text-manager m-5">Profile Details </p>
                    <div class="row">
                        <div class="col-6">
                            <label>Full Name</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->name}}</p>
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
                            <label>Contact</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->contact}}</p>
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
                            <label>Country</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->country}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Occupation</label>
                        </div>
                        <div class="col-6">
                            <p>{{$manager->Occupation}}</p>
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

                    <div class="col-12 mt-5">

                        <?php $enterprises= \App\Models\DonationInvoice::where('payment_status','successful')
                    ->where('donor_id',$id)->orderBy('id','DESC')->paginate(5);;


?>
                        <section class="mbr-section content4 cid-rYUin3zdln" id="content4-2y"
                            style="background-color:rgb(69, 80, 91);">



                            <div class="container">

                                <div class="media-container-row">

                                    <div class="title col-12 col-md-8">

                                        <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fff; ">
                                            <strong><?php echo count($enterprises) > 0?'Lended Enterprise(s)':'No Lended Enterprise(s)'?>
                                            </strong></h2>


                                    </div>
                                </div>
                            </div>
                        </section>

                        <?php if(count($enterprises) > 0) { ?>
                        <section class="features17 cid-rYUhzEzUWQ" id="features17-2w">


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Enterprise</th>
                                        <th>Donations</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enterprises as $enterprise)
                                    <?php $model = \App\Models\LoanApplication::where('id',$enterprise->enterprise_id)->where('approved',1)->orderBy('id','DESC')->first();

                                ?>
                                    <tr>
                                        <td><strong>  {{ $model?$model->business_name:$enterprise->enterprise }}</strong>
                                        </td>
                                        <td>USD {{$enterprise->amount}}</td>

                                        <th>
                                            <?php if($model && $model->category!='Fully-Funded-Enterprises'){?>
                                            <?php if( intval($model->lender_initial_target) > 0  ){?>
                                      
                                            <a class="btn btn-sm btn-primary display-3"
                                                href="/lender-enterprise?lendEnterprise={{$model->id}}">Lend
                                            </a>
                                      
                                        <?php } } ?>
                                        <?php if($model && intval($model->donor_initial_target) > 0 ){ ?>

                                        <a class="btn btn-sm btn-primary display-3"
                                            href="/donate-enterprise?donateEnterprise={{$model->id}}"
                                            style="background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;">Donate
                                        </a>

                                        <?php } ?>
                                        <a class="btn btn-sm btn-primary display-3"
                                            style="background:#fff!important;color:#000!important; border-color:#000!important;"
                                            href="/enterprises/view/{{$model?$model->id:$enterprise->enterprise_id}}">Details
                                        </a>
                                        </th>
                                    </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>TOTAL</th>
                                        <th>USD <?php echo \App\Models\DonationInvoice::where('payment_status','successful')
                    ->where('donor_id',$id)->orderBy('id','DESC')->sum('amount');?></th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                            </table>
                            <div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
                                <span class="align-center"> {!! $enterprises->links() !!}</span>
                            </div>

                        </section>
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

                <div class="alert text-center alert-warning alert-dismissible fade show mt-5 ml-5 text-manager title"
                    role="alert">
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
