@extends('front.layouts.app',
['title'=>'Frank Rubaduka Booking Request',
'description'=>'Frank Rubaduka Booking Request'
]
)

@section('content')

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
<section class="mbr-section form1 cid-s2Uu2i9mKC" id="form1-j">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                Frank Rubaduka Booking Request </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                Please take seconds to provide the major information below and a team member will reach-out and do  follow up with your request shortly </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column mx-auto col-lg-5">
                <!---Formbuilder Form--->
                <div class="row">
                    {!! Form::open(['route' => 'bookingRequests.store']) !!}

                        @include('booking_requests.fields')

                    {!! Form::close() !!}
                </div>
               
            </div>
        </div>
    </div>
</section>


