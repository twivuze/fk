<!-- Full Name Field -->
<div class="form-group col-sm-12 {{ $errors->has('full_name') ? ' has-error' : '' }}">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', old('full_name'), ['class' => 'form-control']) !!}

    @if ($errors->has('full_name'))
    <span class="help-block">
        <strong>{{ $errors->first('full_name') }}</strong>
    </span>
    @endif

</div>

<div class="form-group col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}

    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif

</div>

<!-- Address Field -->
<div class="form-group col-sm-12 {{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}

    @if ($errors->has('address'))
    <span class="help-block">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
    @endif
</div>

<!-- Street Address Field -->
<div class="form-group col-sm-12 {{ $errors->has('street_address') ? ' has-error' : '' }}">
    {!! Form::label('street_address', 'Street Address:') !!}
    {!! Form::text('street_address', old('name'), ['class' => 'form-control']) !!}

    @if ($errors->has('street_address'))
    <span class="help-block">
        <strong>{{ $errors->first('street_address') }}</strong>
    </span>
    @endif
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-12 {{ $errors->has('phone_number') ? ' has-error' : '' }}">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control']) !!}
    @if ($errors->has('phone_number'))
    <span class="help-block">
        <strong>{{ $errors->first('phone_number') }}</strong>
    </span>
    @endif
</div>

<!-- City Field -->
<div class="form-group col-sm-12 {{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
    @if ($errors->has('city'))
    <span class="help-block">
        <strong>{{ $errors->first('city') }}</strong>
    </span>
    @endif
</div>

<!-- Province Field -->
<div class="form-group col-sm-12 {{ $errors->has('province') ? ' has-error' : '' }}">
    {!! Form::label('province', 'Province:') !!}
    {!! Form::text('province', old('province'), ['class' => 'form-control']) !!}

    @if ($errors->has('province'))
    <span class="help-block">
        <strong>{{ $errors->first('province') }}</strong>
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

<!-- Company Or Initiative Field -->
<div class="form-group col-sm-12 {{ $errors->has('company_or_Initiative') ? ' has-error' : '' }}">
    {!! Form::label('company_or_Initiative', 'Company Or Initiative:') !!}
    {!! Form::text('company_or_Initiative', old('company_or_Initiative'), ['class' => 'form-control']) !!}

    @if ($errors->has('company_or_Initiative'))
    <span class="help-block">
        <strong>{{ $errors->first('company_or_Initiative') }}</strong>
    </span>
    @endif
</div>

<!-- Title Field -->
<div class="form-group col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}

    @if ($errors->has('title'))
    <span class="help-block">
        <strong>{{ $errors->first('title') }}</strong>
    </span>
    @endif
</div>

<!-- Function Field -->
<div class="form-group col-sm-12 {{ $errors->has('function') ? ' has-error' : '' }}">
    {!! Form::label('function', 'Function:') !!}
    {!! Form::select('function', ['Talent Development' => 'Talent Development', ' Risk Management ' => ' Risk Management ', ' Personal Devepment' => ' Personal Devepment', ' Character Formation' => ' Character Formation', ' Entreprenuership' => ' Entreprenuership', ' Technology & Innovations' => ' Technology & Innovations', ' Investment and Resource Mobilization/Fundraising' => ' Investment and Resource Mobilization/Fundraising', ' Planning and Strategy' => ' Planning and Strategy', ' Extra-Curricula Training' => ' Extra-Curricula Training', ' Negotiation' => ' Negotiation', ' Marketing and Sales' => ' Marketing and Sales', ' Customer Service' => ' Customer Service', ' StartUp Management And Leadership' => ' StartUp Management And Leadership', ' Micro-lending Concept' => ' Micro-lending Concept', ' Communication Etiquettes' => ' Communication Etiquettes', ' Advertising' => ' Advertising', ' Branding And Recruitment' => ' Branding And Recruitment'], 
        old('function'), ['class' => 'form-control']) !!}

        @if ($errors->has('function'))
    <span class="help-block">
        <strong>{{ $errors->first('function') }}</strong>
    </span>
    @endif
</div>

<!-- Q1 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q1') ? ' has-error' : '' }}">
    {!! Form::label('q1', 'What is the expected attendance at your event?') !!}<br>
    <strong>If known, Kindly let us have the information about the date, location and time.</strong>
    {!! Form::textarea('q1', old('q1'), ['class' => 'form-control']) !!}

    @if ($errors->has('q1'))
    <span class="help-block">
        <strong>What is the expected attendance at your event?</strong>
    </span>
    @endif
    
</div>

<!-- Q2 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q2') ? ' has-error' : '' }}">
    {!! Form::label('q2', 'What is the purpose of your event ?') !!}
    {!! Form::textarea('q2', old('q2'), ['class' => 'form-control']) !!}

    @if ($errors->has('q2'))
    <span class="help-block">
        <strong>What is the purpose of your event ?</strong>
    </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 input-group-btn align-center">
    {!! Form::submit('Submit', ['class' => 'btn btn-form btn-success display-4']) !!}
<?php if(Auth::check()) {?>
    <a href="{{ route('bookingRequests.index') }}" class="btn btn-default">Cancel</a>
<?php } ?>
</div>
