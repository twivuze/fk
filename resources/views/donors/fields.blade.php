
<?php $donorCategory= \App\Models\LenderCategory::where('used',1)->orderBy('id','DESC')->get();
?>
<div class="form-group col-sm-12 {{ $errors->has('donor_category_id') ? ' has-error' : '' }}">
    {!! Form::label('donor_category_id', 'donor Category:') !!}
    <select name="donor_category_id" id="donor_category_id" class="form-control">
    <?php if(isset($donor->donorCategory)) {?>
        <option value="{{$donor->donorCategory->id}}">{{$donor->donorCategory->category}}</option>
    <?php }else{ ?>
        <option value="">Choose donor Category</option>
        <?php } ?>
        @foreach($donorCategory as $donor)
        <option value="{{$donor->id}}">{{$donor->category}}</option>
        @endforeach
    </select>

    @if ($errors->has('donor_category_id'))
    <span class="help-block">
        <strong>Choose donor Category</strong>
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
<div class="form-group col-sm-12 {{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
    @if ($errors->has('address'))
    <span class="help-block">
        <strong>{{ $errors->first('address') }}</strong>
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


<div class="form-group col-sm-12 {{ $errors->has('which_business_models_are_you_willing_to_donate_to') ? ' has-error' : '' }}">
{!! Form::label('which_business_models_are_you_willing_to_donate_to', 'Which Business Models Are You Willing To Donate To:') !!}
    {!! Form::textarea('which_business_models_are_you_willing_to_donate_to', old('which_business_models_are_you_willing_to_donate_to'), ['class' => 'form-control']) !!}
    @if ($errors->has('which_business_models_are_you_willing_to_donate_to'))
    <span class="help-block">
        <strong>{{ $errors->first('which_business_models_are_you_willing_to_donate_to') }}</strong>
    </span>
    @endif
</div>

<!-- Why Did You Choose Such Business Field -->
<div class="form-group col-sm-12 {{ $errors->has('why_did_you_choose_such_business') ? ' has-error' : '' }}">
{!! Form::label('why_did_you_choose_such_business', 'Why Did You Choose Such Business:') !!}
    {!! Form::textarea('why_did_you_choose_such_business', old('why_did_you_choose_such_business'), ['class' => 'form-control']) !!}
    @if ($errors->has('why_did_you_choose_such_business'))
    <span class="help-block">
        <strong>{{ $errors->first('why_did_you_choose_such_business') }}</strong>
    </span>
    @endif
</div>

<!-- Recurring Field -->
<div class="form-group col-sm-12 {{ $errors->has('requiring') ? ' has-error' : '' }}">
    {!! Form::label('requiring', 'Recurring:') !!}
    {!! Form::select('requiring', ['Weekly' => 'Weekly', 'monthly' => 'monthly', 'yearly' => 'yearly', 'One time' =>
    'One time'], old('requiring'), ['class' => 'form-control']) !!}
    @if ($errors->has('requiring'))
    <span class="help-block">
        <strong>{{ $errors->first('requiring') }}</strong>
    </span>
    @endif
</div>


<!-- donors Bank Details Field -->
<div class="form-group col-sm-12 {{ $errors->has('donors_bank_details') ? ' has-error' : '' }}">
    {!! Form::label('donors_bank_details', "Donor's Bank Details:(Only PDF Format)") !!}<br />
    {!! Form::file('donors_bank_details') !!}
    @if ($errors->has('donors_bank_details'))
    <span class="help-block">
        <strong>{{ $errors->first('donors_bank_details') }}</strong> (Only PDF Format)
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- donors Passport Photo Field -->

<div class="form-group col-sm-12 {{ $errors->has('donors_passport_photo') ? ' has-error' : '' }}">
    {!! Form::label('donors_passport_photo', "Donor's Passport Photo:(Only image Format)") !!}<br />
    {!! Form::file('donors_passport_photo') !!}
    @if ($errors->has('donors_passport_photo'))
    <span class="help-block">
        <strong>{{ $errors->first('donors_passport_photo') }}</strong> (Only image Format)
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- donors Copy Of Identity Card Or Passport Field -->

<div class="form-group col-sm-12 {{ $errors->has('donors_copy_of_identity_card_or_passport') ? ' has-error' : '' }}">
    {!! Form::label('donors_copy_of_identity_card_or_passport',"donor's Copy Of Identity Card Or Passport:(Only PDF
    Format)") !!}<br />
    {!! Form::file('donors_copy_of_identity_card_or_passport') !!}
    @if ($errors->has('donors_copy_of_identity_card_or_passport'))
    <span class="help-block">
        <strong>{{ $errors->first('donors_copy_of_identity_card_or_passport') }}</strong> (Only PDF Format)
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Session Id Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>
<?php if(Auth::check()){ ?>
<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Inactive' => 'Inactive', 'Active' => 'Active'], null, ['class' => 'form-control']) !!}
</div>
<?php } ?>
<?php if(Auth::check()){ ?>
<!-- Submit Field -->

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('donors.index') }}" class="btn btn-default">Cancel</a>
</div>

<?php }else{
?>
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>

<?php }
?>
