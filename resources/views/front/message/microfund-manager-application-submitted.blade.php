@extends('front.layouts.app')

@section('content')


<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>MicroFund Manager Form Submission.</strong></h2>
                
                
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

                    <div class="col-lg-3"></div>
                    <div class="alert alert-success alert-dismissible fade show mt-5 ml-5 text-center title"
                        role="alert">
                        <p>
                        Thank you for applying as a MicroFund manager at All Trust Consult.<br />
                        Your application is well received and will be viewed by the team as soon as possible.<br />
                        Kindly check your email frequently to know whether your application is accepted or otherwise .</p>
                      
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
