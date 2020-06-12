@extends('front.layouts.app',
['title'=>'Trainings &  Workshops Application',
'description'=>'Trainings &  Workshops Application Form'
]
)

@section('content')

<section class="mbr-section content4 cid-rYUfm4cV5h mt-5" id="content4-2t">

    

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>
                   Trainings &  Workshops Application Form</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>


<?php 

$session = \App\Models\TrainingWorkshopSession::where('allow_to_apply',1)->orderBy('id','DESC')->first();

if($session){

?>


<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-sm-6">
                <div class="row media-container-column">
                    <style>
                        .help-block {
                            color: red;
                        }
                        .has-error{
                            border:thin solid red;
                        }

                        li {
                            color: red;
                        }

                    </style>

                   
              

                 
                {!! Form::open(['route' => 'trainingWorkshops.store']) !!}

                @include('training_workshops.fields',['session_id'=>$session->id])

                {!! Form::close() !!}

                </div>
            </div>

            <div class="card p-3 col-sm-6">
            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                        {{ $session->title }}
                        </h4>
                        <hr>
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="/thumbnail/{{$session->image}}" style="width:100%" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        
                        <p class="mbr-text mbr-fonts-style display-7">
                        DateTime: {{ date("d M Y",strtotime($session->event_date))}}, {{date("h:i A",strtotime($session->event_time))}}<br />
                        Location:{{$session->event_location}}
                        <hr>
                        {!!html_entity_decode($session->contents)!!}
                        </p>
                    </div>
               
            </div>
            </div>

        </div>
    </div>

</section>

<?php 

}else{

?>
<section class="features17 cid-rYUhzEzUWQ bg-white" id="features17-2w">
     <div class="container">
            <div class="row justify-content-center">
                        <div class="media-container-column col-lg-8">

                                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title"
                                    role="alert">
                                    <strong>APPLICATION CLOSED!</strong>
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
