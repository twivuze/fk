@extends('front.layouts.app')

@section('content')

<?php $center= \App\Models\Center::where('status','Active')->where('id',$id)->orderBy('id','DESC')->first();


?>
<?php
if($center){

    $centers= \App\Models\Center::where('status','Active')->where('id','!=',$center->id)->take(5)->orderBy(DB::raw('RAND()'))->get();
    $manager= \App\Models\MicroFundApplication::where('approved',1)->orderBy('id','DESC')->first();
?>

<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2 text-center">
                    <strong> {{ $center->name }} </strong>


                </h2>
               

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
                        src="{{$center->cover_image?'/thumbnail/'.$center->cover_image:'/images/user.jpg' }}"
                        alt="" />

                </div>
                <div class="profile-work">
                    <p class="text-center m-5">Center Details</p>
                    <div class="row">
                        <div class="col-6">
                            <label>Name</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->name}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Email</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->email}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Address</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->address}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Country</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->country}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Region</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->region}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Organization</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->organization}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Occupation</label>
                        </div>
                        <div class="col-6">
                            <p>{{$center->occupation}}</p>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-6">
                            <label>Manager</label>
                        </div>
                        <div class="col-6">
                            <p>{{ $manager? $manager->full_name:'--' }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <div class="row">
               

                    <div class="col-12">
                        <p>{{$center->short_summary}}</p>
                    </div>

                    <div class="col-12">
                        <?php if( $center->description){ ?>
                        <p><b>More Details</b><br />{!!html_entity_decode($center->description)!!}</p>
                        <?php } ?>
                    </div>
                  
                    
               
                        </div>
                    </div>

            <div class="p-3 col-sm-3">
                <table style="width:100%;margin-left:-10px">
                <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                             href="/enterprises/search?center={{$id}}">Enterprises
                            </a>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-primary btn-block display-3"
                             href="/fillings/search?center={{$id}}"
                                style="border:#58d77a !important; background:rgb(69, 80, 91)!important; color: #fff!important;">
                                Fillings </a>

                        </td>
                    </tr>
                   
                   
                </table>






                <hr>

              

                <ul class="list-group mt-3">
                    <li class="list-group-item active"
                    style="border:#58d77a !important;background:#58d77a!important;color:#fff!important">Related Centers</li>

                    @foreach($centers as $centerr)
                    <li class="list-group-item "><a href="/more/center/{{$centerr->id}}" 
                    class="mbr-bold text-primary"> {{$centerr->name}}</a>
                    </li>
                    @endforeach
                    <li class="list-group-item align-center ">
                    <a href="/more/centers" class="align-center" style="color: #fa8709!important;">View more..</a>
                    </li>
                </ul>
              


            </div>


        </div>
    </div>

</section>


   
<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">
    
    
@include('front.common.center-card',['centers'=>$centers])
    
   
</section>
<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">

                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title" role="alert">
                    <strong>No center!</strong>
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
