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

<!-- Region Field -->
<div class="form-group col-sm-12 {{ $errors->has('region') ? ' has-error' : '' }}">
    {!! Form::label('region', 'Region:') !!}
    {!! Form::text('region', old('region'), ['class' => 'form-control']) !!}
    @if ($errors->has('region'))
    <span class="help-block">
        <strong>{{ $errors->first('region') }}</strong>
    </span>
    @endif
</div>

<!-- Occupation Field -->
<div class="form-group col-sm-12 {{ $errors->has('occupation') ? ' has-error' : '' }}">
    {!! Form::label('occupation', 'Occupation:') !!}
    {!! Form::text('occupation', old('occupation'), ['class' => 'form-control']) !!}
    @if ($errors->has('occupation'))
    <span class="help-block">
        <strong>{{ $errors->first('occupation') }}</strong>
    </span>
    @endif
</div>

<!-- Organization Field -->

<div class="form-group col-sm-12 {{ $errors->has('organization') ? ' has-error' : '' }}">
    {!! Form::label('organization', 'Organization:') !!}
    {!! Form::text('organization', old('organization'), ['class' => 'form-control']) !!}
    @if ($errors->has('organization'))
    <span class="help-block">
        <strong>{{ $errors->first('organization') }}</strong>
    </span>
    @endif
</div>

<!-- Q1 Field -->
<div class="form-group col-sm-12">
<h2>Micro-finance center related Questions.</h2>
</div>

<div class="form-group col-sm-12 {{ $errors->has('q1') ? ' has-error' : '' }}">
    {!! Form::label('q1', 'Why do you want to work with All Trust Consult?') !!}
    {!! Form::textarea('q1', old('q1'), ['class' => 'form-control']) !!}
    @if ($errors->has('q1'))
    <span class="help-block">
        <strong>Why do you want to work with All Trust Consult?</strong>
    </span>
    @endif
</div>

<!-- Q2 Field -->

<div class="form-group col-sm-12 {{ $errors->has('q2') ? ' has-error' : '' }}">
    {!! Form::label('q2', 'What will be the name of the center for Micro-finance?') !!}
    {!! Form::textarea('q2', old('q2'), ['class' => 'form-control']) !!}
    @if ($errors->has('q2'))
    <span class="help-block">
        <strong>What will be the name of the center for Micro-finance?</strong>
    </span>
    @endif
</div>

<!-- Q3 Field -->

<div class="form-group col-sm-12 {{ $errors->has('q3') ? ' has-error' : '' }}">
    {!! Form::label('q3', 'Do you think you share the same vision with All Trust Consult?') !!}
    {!! Form::textarea('q3', old('q3'), ['class' => 'form-control']) !!}
    @if ($errors->has('q3'))
    <span class="help-block">
        <strong>Do you think you share the same vision with All Trust Consult?</strong>
    </span>
    @endif
</div>

<!-- Q4 Field -->

<div class="form-group col-sm-12 {{ $errors->has('q4') ? ' has-error' : '' }}">
    {!! Form::label('q4', "How much time, effort, knowledge will you contribute to achieve the center's vision and mission?") !!}
    {!! Form::textarea('q4', old('q4'), ['class' => 'form-control']) !!}
    @if ($errors->has('q4'))
    <span class="help-block">
        <strong>How much time, effort, knowledge will you contribute to achieve the center's vision and mission?</strong>
    </span>
    @endif
</div>

<!-- Q5 Field -->
<div class="form-group col-sm-12 {{ $errors->has('q5') ? ' has-error' : '' }}">
    {!! Form::label('q5', "What will be your role?") !!}
    {!! Form::textarea('q5', old('q5'), ['class' => 'form-control']) !!}
    @if ($errors->has('q5'))
    <span class="help-block">
        <strong>What will be your role?</strong>
    </span>
    @endif
</div>

<!-- Q6 Field -->
<div class="form-group col-sm-12 {{ $errors->has('q6') ? ' has-error' : '' }}">
    {!! Form::label('q6', "Do you have a Board of trustees/directors (Minimum 3 people)?") !!}
    {!! Form::textarea('q6', old('q6'), ['class' => 'form-control']) !!}
    @if ($errors->has('q6'))
    <span class="help-block">
        <strong>Do you have a Board of trustees/directors (Minimum 3 people)?</strong>
    </span>
    @endif
</div>

<!-- Q7 Field -->

<div class="form-group col-sm-12 {{ $errors->has('q7') ? ' has-error' : '' }}">
    {!! Form::label('q7', "How will you manage conflict if it arises among the Board members?") !!}
    {!! Form::textarea('q7', old('q7'), ['class' => 'form-control']) !!}
    @if ($errors->has('q7'))
    <span class="help-block">
        <strong>How will you manage conflict if it arises among the Board members?</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12">
<h2>Additional information(Attachment)</h2>
</div>
<!-- Passport Size Photos Zipped Field -->

<div class="form-group col-sm-12 {{ $errors->has('passport_size_photos_zipped') ? ' has-error' : '' }}">
    {!! Form::label('passport_size_photos_zipped', "Passport size photos of the applicant and of all the board members.(Allow Only Zipped file)") !!}
    {!! Form::file('passport_size_photos_zipped') !!}
    @if ($errors->has('passport_size_photos_zipped'))
    <span class="help-block">
        <strong>Passport size photos of the applicant and of all the board members.(Allow Only Zipped file)</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Copies National Identity Card Zipped Field -->

<div class="form-group col-sm-12 {{ $errors->has('copies_national_identity_card_zipped') ? ' has-error' : '' }}">
    {!! Form::label('copies_national_identity_card_zipped', "Copies of National Identity card for both the applicant and board members.(Allow Only Zipped file)") !!}
    {!! Form::file('copies_national_identity_card_zipped') !!}
    @if ($errors->has('copies_national_identity_card_zipped'))
    <span class="help-block">
        <strong>Copies of National Identity card for both the applicant and board members.(Allow Only Zipped file)</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Application Letter Written By Applicant Pdf Field -->

<div class="form-group col-sm-12 {{ $errors->has('application_letter_written_by_applicant_pdf') ? ' has-error' : '' }}">
    {!! Form::label('application_letter_written_by_applicant_pdf', "Application Letter written by the applicant,with approval of the board members and their signatures.(Allow Only Pdf file)") !!}
    {!! Form::file('application_letter_written_by_applicant_pdf') !!}
    @if ($errors->has('application_letter_written_by_applicant_pdf'))
    <span class="help-block">
        <strong>Application Letter written by the applicant,with approval of the board members and their signatures.(Allow Only Pdf file)</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>


<?php if(Auth::check()){ ?>
    <div class="form-group col-sm-12">
<h2>Additional information(Admin)</h2>
</div>
<!-- Cover Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cover_image', 'Cover Image:') !!}
    {!! Form::file('cover_image') !!}
</div>
<div class="clearfix"></div>

<!-- Short Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('short_summary', 'Short Summary:') !!}
    {!! Form::textarea('short_summary', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'textarea']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Inactive' => 'Inactive', 'Active' => 'Active'], null, ['class' => 'form-control']) !!}
</div>
<?php } ?>

<!-- Session Id Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>


<hr>
<?php if(Auth::check()){ ?>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('centers.index') }}" class="btn btn-default">Cancel</a>
</div>
<?php } ?>
<?php if(!Auth::check()){ ?>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>
<?php } ?>
