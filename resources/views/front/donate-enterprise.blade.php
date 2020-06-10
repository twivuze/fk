@extends('front.layouts.app')

@section('content')

<?php 
if($enterprise){
?>
<section class="mbr-section content4 cid-rYUfuivAPG mt-5" id="content4-2u">

    <div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><strong>Donate {{$enterprise->business_name}}</strong></h2>
                
                
            </div>
        </div>
    </div>
</section>
<hr>
<?php 
}
if($enterprise){
    $enterprise->views=$enterprise->views+1;
    $enterprise->save();
?>

<section class="features17 cid-rYUhzEzUWQ  bg-white" id="features17-2w">
    
<div class="container mt-3">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
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

                {!! Form::open(['route' => 'donationInvoices.store']) !!}

                @include('donation_invoices.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
   
</section>
<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w">
     <div class="container">
            <div class="row justify-content-center">
                        <div class="media-container-column col-lg-8">

                                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title"
                                    role="alert">
                                    <strong>No Enterprise To Lend, please choose <a href="/enterprises">enterprise</a> to lend</strong>
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
