<!-- Id Field -->
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('donor_code', 'Donor Code:') !!}
    <p>{{ $donor->donor_code }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $donor->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $donor->email }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $donor->address }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $donor->contact }}</p>
</div>

<!-- Occupation Field -->
<div class="form-group">
    {!! Form::label('Occupation', 'Occupation:') !!}
    <p>{{ $donor->Occupation }}</p>
</div>

<!-- Which Business Models Are You Willing To Donate To Field -->
<div class="form-group">
    {!! Form::label('which_business_models_are_you_willing_to_donate_to', 'Which Business Models Are You Willing To Donate To:') !!}
    <p>{{ $donor->which_business_models_are_you_willing_to_donate_to }}</p>
</div>

<!-- Why Did You Choose Such Business Field -->
<div class="form-group">
    {!! Form::label('why_did_you_choose_such_business', 'Why Did You Choose Such Business:') !!}
    <p>{{ $donor->why_did_you_choose_such_business }}</p>
</div>

<!-- Requiring Field -->
<div class="form-group">
    {!! Form::label('requiring', 'Requiring:') !!}
    <p>{{ $donor->requiring }}</p>
</div>



<!-- donors Passport Photo Field -->
<div class="form-group">
    {!! Form::label('donors_passport_photo', "Donor's Passport Photo:") !!}

    <p>
    <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$donor->donors_passport_photo}}" style="width:100%" class="figure-img img-fluid rounded">

        </figure>
    </p>
</div>

<!-- donors Bank Details Field -->
<!-- <div class="form-group">
    {!! Form::label('donors_bank_details', "Donor's Bank Details:") !!}

    <p>
    <iframe src="/documents/{{ $donor->donors_bank_details }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div> -->
<!-- donors Copy Of Identity Card Or Passport Field -->
<div class="form-group">
    {!! Form::label('donors_copy_of_identity_card_or_passport', "Donor's Copy Of Identity Card Or Passport:") !!}
    <p>
    <iframe src="/documents/{{ $donor->donors_copy_of_identity_card_or_passport }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>

<hr>
<div class="form-group col-sm-12">
   <h2>Payment Card Details</h2>
</div>

<?php if(Auth::check() && Auth::user()->type=='Admin'){?>
 
    <div class="form-group">
    {!! Form::label('card_number', 'Card number:') !!}
    <b> {{'XXXX-XXXX-XXXX-'.substr($donor->card_number,-4) }}</b>
   
</div>
<?php 
}else{ ?>
 <div class="form-group">
    {!! Form::label('card_number', 'Card number:') !!}
    <b> {{$donor->card_number}}</b>
   
</div>
<?php } ?>

<div class="form-group">
    {!! Form::label('expiration_month', 'Expiration Month:') !!}
    <b>{{ $donor->expiration_month }}</b>
</div>

<div class="form-group">
    {!! Form::label('expiration_year', 'Expiration Year:') !!}
    <b>{{ $donor->expiration_year }}</b>
</div>

<div class="form-group">
    {!! Form::label('cvc', 'CVC:') !!}
    <b>{{ $donor->cvc }}</b>
</div>
<hr>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $donor->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $donor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $donor->updated_at }}</p>
</div>

