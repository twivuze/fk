<?php $lenderCategory= \App\Models\LenderCategory::where('used',1)->orderBy('id','DESC')->get();

function ccMasking($number) {
    return 'XXXX-XXXX-XXXX-'.substr($number,-4);
}
?>
<div class="form-group col-sm-12 {{ $errors->has('lender_category_id') ? ' has-error' : '' }}">
    {!! Form::label('lender_category_id', 'Lender Category:') !!}
    <select name="lender_category_id" id="lender_category_id" value="old('lender_category_id')" class="form-control">
        <?php if(isset($lender->lenderCategory)) {?>
        <option value="{{$lender->lenderCategory->id}}">{{$lender->lenderCategory->category}}</option>
        <?php }else{ ?>
        <option value="">Choose Lender Category</option>
        <?php } ?>
        @foreach($lenderCategory as $lenderCat)
        <option value="{{$lenderCat->id}}">{{$lenderCat->category}}</option>
        @endforeach
    </select>

    @if ($errors->has('lender_category_id'))
    <span class="help-block">
        <strong>Choose Lender Category</strong>
    </span>
    @endif
</div>


<!-- Name Field -->
<div class="form-group col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>
<!-- Email Field -->

<div class="form-group col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>

<!-- Contact Field -->

<div class="form-group col-sm-12 {{ $errors->has('contact') ? ' has-error' : '' }}">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', old('contact'), ['class' => 'form-control']) !!}
    @if ($errors->has('contact'))
    <span class="help-block">
        <strong>{{ $errors->first('contact') }}</strong>
    </span>
    @endif
</div>

<!-- Country Field -->
<div class="form-group col-sm-12 {{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', old('country'), ['class' => 'form-control']) !!}
    @if ($errors->has('country'))
    <span class="help-block">
        <strong>{{ $errors->first('country') }}</strong>
    </span>
    @endif
</div>
<div class="form-group col-sm-12">
    <h2>Payment Card Details</h2>
</div>

<?php if(Auth::check() && Auth::user()->type=='Admin'){ 
    
    if(isset($lender)) {?>
<div class="form-group col-sm-12">
    {!! Form::label('card_number', 'Card number:') !!}
    <b> {{ccMasking($lender->card_number)}}</b>

</div>

<div class="form-group col-sm-12">
    {!! Form::label('expiration_month', 'Expiration Month:') !!}
    <b> {{$lender->expiration_month}}</b>

</div>

<div class="form-group col-sm-12">
    {!! Form::label('expiration_year', 'Expiration Year:') !!}
    <b> {{$lender->expiration_year}}</b>

</div>

<div class="form-group col-sm-12">
    {!! Form::label('cvc', 'cvc:') !!}
    <b> {{$lender->cvc}}</b>

</div>
<?php }
 } else{ ?>
<div class="form-group col-sm-12 {{ $errors->has('card_number') ? ' has-error' : '' }}">
    {!! Form::label('card_number', 'Card number:') !!}
    {!! Form::number('card_number', old('card_number'), ['class' => 'form-control']) !!}
    @if ($errors->has('card_number'))
    <span class="help-block">
        <strong>{{ $errors->first('card_number') }}</strong>
    </span>
    @endif
</div>


<div class="form-group col-sm-12 {{ $errors->has('expiration_month') ? ' has-error' : '' }}">
    {!! Form::label('expiration_month', 'Expiration Month:') !!}
    {!! Form::text('expiration_month', old('expiration_month'), ['class' =>
    'form-control','required'=>'required','maxlength'=>'2']) !!}
    @if ($errors->has('expiration_month'))
    <span class="help-block">
        <strong>{{ $errors->first('expiration_month') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12 {{ $errors->has('expiration_year') ? ' has-error' : '' }}">
    {!! Form::label('expiration_year', 'Expiration Year:') !!}
    {!! Form::text('expiration_year', old('expiration_year'), ['class' =>
    'form-control','required'=>'required','maxlength'=>'4']) !!}
    @if ($errors->has('expiration_year'))
    <span class="help-block">
        <strong>{{ $errors->first('expiration_year') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12 {{ $errors->has('cvc') ? ' has-error' : '' }}">
    {!! Form::label('cvc', 'CVC:') !!}
    {!! Form::text('cvc', old('cvc'), ['class' => 'form-control','required'=>'required','maxlength'=>'3']) !!}
    @if ($errors->has('cvc'))
    <span class="help-block">
        <strong>{{ $errors->first('cvc') }}</strong>
    </span>
    @endif
</div>
<?php }
         ?>




<!-- Occupation Field -->

<div class="form-group col-sm-12 {{ $errors->has('Occupation') ? ' has-error' : '' }}">
    {!! Form::label('Occupation', 'Occupation:') !!}
    {!! Form::text('Occupation', old('Occupation'), ['class' => 'form-control']) !!}
    @if ($errors->has('Occupation'))
    <span class="help-block">
        <strong>{{ $errors->first('Occupation') }}</strong>
    </span>
    @endif
</div>

<!-- Which Business You Are Willing To Lend To Field -->


<div class="form-group col-sm-12 {{ $errors->has('which_business_you_are_willing_to_lend_to') ? ' has-error' : '' }}">
    {!! Form::label('which_business_you_are_willing_to_lend_to', 'Which Business You Are Willing To Lend To:') !!}
    {!! Form::textarea('which_business_you_are_willing_to_lend_to', old('which_business_you_are_willing_to_lend_to'),
    ['class' => 'form-control']) !!}
    @if ($errors->has('which_business_you_are_willing_to_lend_to'))
    <span class="help-block">
        <strong>{{ $errors->first('which_business_you_are_willing_to_lend_to') }}</strong>
    </span>
    @endif
</div>

<!-- Why Did You Choose Such Business Field -->
<div class="form-group col-sm-12 {{ $errors->has('why_did_you_choose_such_business') ? ' has-error' : '' }}">
    {!! Form::label('why_did_you_choose_such_business', 'Why Did You Choose Such Business:') !!}
    {!! Form::textarea('why_did_you_choose_such_business', old('why_did_you_choose_such_business'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('why_did_you_choose_such_business'))
    <span class="help-block">
        <strong>{{ $errors->first('why_did_you_choose_such_business') }}</strong>
    </span>
    @endif
</div>

<!-- Recurring Field -->
<div class="form-group col-sm-12 {{ $errors->has('recurring') ? ' has-error' : '' }}">
    {!! Form::label('recurring', 'Recurring:') !!}
    {!! Form::select('recurring', ['Weekly' => 'Weekly', 'monthly' => 'monthly', 'yearly' => 'yearly', 'One time' =>
    'One time'], old('recurring'), ['class' => 'form-control']) !!}
    @if ($errors->has('recurring'))
    <span class="help-block">
        <strong>{{ $errors->first('recurring') }}</strong>
    </span>
    @endif
</div>



<!-- Lenders Passport Photo Field -->

<div class="form-group col-sm-12 {{ $errors->has('lenders_passport_photo') ? ' has-error' : '' }}">
    {!! Form::label('lenders_passport_photo', "Lender's Passport Photo:(Only image Format)") !!}<br />
    {!! Form::file('lenders_passport_photo') !!}
    @if ($errors->has('lenders_passport_photo'))
    <span class="help-block">
        <strong>{{ $errors->first('lenders_passport_photo') }}</strong> (Only image Format)
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Lenders Copy Of Identity Card Or Passport Field -->

<div class="form-group col-sm-12 {{ $errors->has('lenders_copy_of_identity_card_or_passport') ? ' has-error' : '' }}">
    {!! Form::label('lenders_copy_of_identity_card_or_passport',"Lender's Copy Of Identity Card Or Passport:(Only PDF
    Format)") !!}<br />
    {!! Form::file('lenders_copy_of_identity_card_or_passport') !!}
    @if ($errors->has('lenders_copy_of_identity_card_or_passport'))
    <span class="help-block">
        <strong>{{ $errors->first('lenders_copy_of_identity_card_or_passport') }}</strong> (Only PDF Format)
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Session Id Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
   
  

<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Inactive' => 'Inactive', 'Active' => 'Active'], null, ['class' => 'form-control']) !!}
</div>
<?php } ?>
<?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>
    <div class="form-group col-sm-3"></div>
<div class="form-group col-sm-6">
    <?php if(isset($lender) && $lender->status=='Active') { ?>
    <div class="alert alert-success show mt-5  mr-5  text-center title" role="alert">
        <strong>APPLICATION APPROVED</strong>
    </div>

    <?php }else{ ?>

    <div class="alert alert-warning show mt-5 mr-5 text-center title" role="alert">
        <strong>APPLICATION PENDING</strong>
    </div>
    <?php }?>
    <div class="form-group col-sm-3"></div>
</div>
<?php }?>

<?php if(Auth::check()){ ?>
<!-- Submit Field -->
<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>

<div class="form-group container">
    <div class="row m-5">
        <div class="col-sm-6">
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
        <div class="col-sm-6">
            <a href="{{ route('lenders.index') }}" class="btn btn-default btn-block">Cancel</a>

        </div>
    </div>
</div>
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>

<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>
<?php }?>

<?php }else{
?>
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>

<?php }
?>
