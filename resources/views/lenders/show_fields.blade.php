
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('lender_code', 'Lender Code:') !!}
    <p>{{ $lender->lender_code }}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $lender->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $lender->email }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $lender->contact }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $lender->country }}</p>
</div>

<!-- Occupation Field -->
<div class="form-group">
    {!! Form::label('Occupation', 'Occupation:') !!}
    <p>{{ $lender->Occupation }}</p>
</div>

<!-- Which Business You Are Willing To Lend To Field -->
<div class="form-group">
    {!! Form::label('which_business_you_are_willing_to_lend_to', 'Which Business You Are Willing To Lend To:') !!}
    <p>{{ $lender->which_business_you_are_willing_to_lend_to }}</p>
</div>

<!-- Why Did You Choose Such Business Field -->
<div class="form-group">
    {!! Form::label('why_did_you_choose_such_business', 'Why Did You Choose Such Business:') !!}
    <p>{{ $lender->why_did_you_choose_such_business }}</p>
</div>

<!-- Recurring Field -->
<div class="form-group">
    {!! Form::label('recurring', 'Recurring:') !!}
    <p>{{ $lender->recurring }}</p>
</div>



<!-- Lenders Passport Photo Field -->
<div class="form-group">
    {!! Form::label('lenders_passport_photo', 'Lenders Passport Photo:') !!}

    <p>
    <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$lender->lenders_passport_photo}}" style="width:100%" class="figure-img img-fluid rounded">

        </figure>
    </p>
</div>


<!-- Lenders Copy Of Identity Card Or Passport Field -->
<div class="form-group">
    {!! Form::label('lenders_copy_of_identity_card_or_passport', 'Lenders Copy Of Identity Card Or Passport:') !!}
    <p>
    <iframe src="/documents/{{ $lender->lenders_copy_of_identity_card_or_passport }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>
<hr>
<div class="form-group col-sm-12">
   <h2>Payment Card Details</h2>
</div>

<?php if(Auth::check() && Auth::user()->type=='Admin'){?>
 
    <div class="form-group">
    {!! Form::label('card_number', 'Card number:') !!}
    <b> {{'XXXX-XXXX-XXXX-'.substr($lender->card_number,-4) }}</b>
   
</div>
<?php 
}else{ ?>
 <div class="form-group">
    {!! Form::label('card_number', 'Card number:') !!}
    <b> {{$lender->card_number}}</b>
   
</div>
<?php } ?>

<div class="form-group">
    {!! Form::label('expiration_month', 'Expiration Month:') !!}
    <b>{{ $lender->expiration_month }}</b>
</div>

<div class="form-group">
    {!! Form::label('expiration_year', 'Expiration Year:') !!}
    <b>{{ $lender->expiration_year }}</b>
</div>

<div class="form-group">
    {!! Form::label('cvc', 'CVC:') !!}
    <b>{{ $lender->cvc }}</b>
</div>
<hr>
<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $lender->status }}</p>
</div>



<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $lender->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $lender->updated_at }}</p>
</div>

