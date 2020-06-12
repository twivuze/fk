@extends('front.layouts.app',
['title'=>'Trainings & Workshops Application Form Submission',
'description'=>'Thank you for applying for our training/workshop.'
]
)

@section('content')


<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Trainings & Workshops Application Form Submission.</strong>
                </h2>


            </div>
        </div>
    </div>
</section>
<hr>

<section class="features17 cid-rYUhzEzUWQ text-left bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">
                <div class="row">
                <?php
                    $session = \App\Models\TrainingWorkshopSession::where('allow_to_apply',1)->orderBy('id','DESC')->first();

                    ?>
                    <div class="col-lg-3"></div>
                    <div class="alert alert-success alert-dismissible fade show mt-5 ml-5 text-center title"
                        role="alert">
                        <p>
                        Welcome in the movement of change makers and a cascade of business Technical know-how.
                        <br />
                        Thank you for applying for our training/workshop. <br />
                        We are looking forward to meeting you on {{ date("d M Y",strtotime($session->event_date))}}, {{date("h:i A",strtotime($session->event_time))}}
                         at {{$session->event_location}}
                           </p>
                       
                        <br>
                        Best Regards!<br />
                        Your Friends in Business from All Trust Consult!
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
    </div>

</section>



<hr>
<section class="clients cid-rYUvGms2pw" style="background:#ffff!important;" data-interval="false" id="clients-3w">
      
@include('front.component.partners-section')
    
</section>


@endsection
