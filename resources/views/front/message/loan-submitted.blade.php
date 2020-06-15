@extends('front.layouts.app',
['title'=>'Loan Application Form Submission',
'description'=>'Thank you for applying for All Trust Consult loan for business purposes.'
]
)

@section('content')


<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Loan Application Form Submission.</strong>
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

                    <div class="col-lg-3"></div>
                    <div class="alert alert-success alert-dismissible fade show mt-5 ml-5 text-center title"
                        role="alert">
                        <p>
                            Thank you for applying for All Trust Consult loan for business purposes.<br />
                            The team concerned will review your business model and application form and they will reach
                            out to you as soon as possible.<br />
                            If your business model gets shortlisted you will be contacted and more details will be given
                            to you.</p>
                      
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
