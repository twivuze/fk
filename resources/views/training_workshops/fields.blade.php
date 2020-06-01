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
<!-- Contact Field -->
<div class="form-group col-sm-12 {{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', old('country'), ['class' => 'form-control']) !!}
    @if ($errors->has('country'))
    <span class="help-block">
        <strong>{{ $errors->first('country') }}</strong>
    </span>
    @endif
</div>

<!-- Project Or Business Name Field -->


<div class="form-group col-sm-12 {{ $errors->has('project_or_business_name') ? ' has-error' : '' }}">
    {!! Form::label('project_or_business_name', 'Project Or Business Name:') !!}
    {!! Form::text('project_or_business_name', old('project_or_business_name'), ['class' => 'form-control']) !!}
    @if ($errors->has('project_or_business_name'))
    <span class="help-block">
        <strong>{{ $errors->first('project_or_business_name') }}</strong>
    </span>
    @endif
</div>

<!-- What Is Your Project Or Business About Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('What_is_your_project_or_business_about') ? ' has-error' : '' }}">
    {!! Form::label('What_is_your_project_or_business_about', 'What Is Your Project Or Business About:') !!}
    {!! Form::textarea('What_is_your_project_or_business_about', old('What_is_your_project_or_business_about'), ['class' => 'form-control']) !!}

    @if ($errors->has('What_is_your_project_or_business_about'))
    <span class="help-block">
        <strong>{{ $errors->first('What_is_your_project_or_business_about') }}</strong>
    </span>
    @endif
</div>

<!-- Business Location Field -->
<div class="form-group col-sm-12 {{ $errors->has('Business_location') ? ' has-error' : '' }}">
    {!! Form::label('Business_location', 'Business Location:') !!}
    {!! Form::text('Business_location', old('Business_location'), ['class' => 'form-control']) !!}
    @if ($errors->has('Business_location'))
    <span class="help-block">
        <strong>{{ $errors->first('Business_location') }}</strong>
    </span>
    @endif
</div>

<!-- What Is Your Expectations To This Training Or What Do You Want To Learn Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('What_is_your_expectations_to_this_Training') ? ' has-error' : '' }}">
    {!! Form::label('What_is_your_expectations_to_this_Training', 'What Is Your Expectations To This Training Or What Do You Want To Learn:') !!}
    {!! Form::textarea('What_is_your_expectations_to_this_Training', old('What_is_your_expectations_to_this_Training'), ['class' => 'form-control']) !!}

    @if ($errors->has('What_is_your_expectations_to_this_Training'))
    <span class="help-block">
        <strong>What Is Your Expectations To This Training Or What Do You Want To Learn</strong>
    </span>
    @endif
</div>

<!-- Are You Willing To Obtain A Participation Certificate Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Are_you_willing_to_obtain_a_participation_Certificate', 'Are You Willing To Obtain A Participation Certificate:') !!}
    {!! Form::select('Are_you_willing_to_obtain_a_participation_Certificate', ['No' => 'No', 'Yes' => 'Yes'], old('Are_you_willing_to_obtain_a_participation_Certificate'), ['class' => 'form-control']) !!}
</div>




<?php if(Auth::check()){ ?>
<!-- Session Id Field -->
<!-- 'bootstrap / Toggle Switch Approved Field' -->
<div class="form-group col-sm-12">
    {!! Form::label('approved', 'Approved:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approved', 0) !!}
        {!! Form::checkbox('approved', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
 


<?php if(\Request::get('session')){ ?>
    <input type="hidden" value="{{\Request::get('session')}}" name="session">
    <a href="{{ route('trainingWorkshops.index') }}?session={{\Request::get('session')}}" class="btn btn-default">Cancel</a>
    <?php }else{ ?>
        <a href="{{ route('trainingWorkshops.index') }}" class="btn btn-default">Cancel</a>
        <?php } ?>
</div>
<?php } ?>

<?php if(!Auth::check()){ ?>
<hr>
<div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>
<!-- Session Id Field -->
<div class="form-group col-sm-12">
{!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>


<?php } ?>

