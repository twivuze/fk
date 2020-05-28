@extends('front.layouts.app')

@section('content')


<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Become MicroFund Manager Form</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>
<hr>

<section class="features17 cid-rYUhzEzUWQ text-left bg-white" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
                <div class="media-container-column col-lg-8">
                <style>ul{color: red;} li{color: red;}</style>
                @include('adminlte-templates::common.errors')
                <div class="row">
                <a name="error"></a>

                    {!! Form::open(['route' => 'microFundApplications.store']) !!}

                        @include('micro_fund_applications.fields')

                    {!! Form::close() !!}
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
