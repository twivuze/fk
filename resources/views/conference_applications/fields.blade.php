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
<div class="form-group col-sm-12 {{ $errors->has('contact') ? ' has-error' : '' }}">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', old('contact'), ['class' => 'form-control']) !!}
    @if ($errors->has('contact'))
    <span class="help-block">
        <strong>{{ $errors->first('contact') }}</strong>
    </span>
    @endif
</div>

<!-- Date Of Birth Field -->

<div class="form-group col-sm-12 {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    {!! Form::date('date_of_birth', old('date_of_birth'), ['class' => 'form-control']) !!}
    @if ($errors->has('date_of_birth'))
    <span class="help-block">
        <strong>{{ $errors->first('date_of_birth') }}</strong>
    </span>
    @endif
</div>


<!-- How  Did  You Know Yes Conference Field -->

<div class="form-group col-sm-12 {{ $errors->has('How_did_you_know_Yes_Conference') ? ' has-error' : '' }}">
    {!! Form::label('How_did_you_know_Yes_Conference', 'How  Did  You Know Our Conference?') !!}
    {!! Form::textarea('How_did_you_know_Yes_Conference', old('How_did_you_know_Yes_Conference'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('How_did_you_know_Yes_Conference'))
    <span class="help-block">
        <strong>{{ $errors->first('How_did_you_know_Yes_Conference') }}</strong>
    </span>
    @endif
</div>

<!-- Have You Previously Attended Any Yes Conference Field -->

<div class="form-group col-sm-12 {{ $errors->has('Have_you_previously_attended_any_Yes_Conference') ? ' has-error' : '' }}">
    {!! Form::label('Have_you_previously_attended_any_Yes_Conference', 'Have You Previously Attended Any Our Conference?') !!}
    {!! Form::select('Have_you_previously_attended_any_Yes_Conference', ['Yes' => 'Yes', 'No' => 'No'], old('Have_you_previously_attended_any_Yes_Conference'), ['class' => 'form-control']) !!}
    @if ($errors->has('Have_you_previously_attended_any_Yes_Conference'))
    <span class="help-block">
        <strong>{{ $errors->first('Have_you_previously_attended_any_Yes_Conference') }}</strong>
    </span>
    @endif
</div>


<!-- If Ye Describe The Year Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('If_ye_describe_the_year') ? ' has-error' : '' }}">
    {!! Form::label('If_ye_describe_the_year', 'If Yes, Describe The Year?') !!}
    {!! Form::text('If_ye_describe_the_year',  old('If_ye_describe_the_year'), ['class' => 'form-control']) !!}
    @if ($errors->has('If_ye_describe_the_year'))
    <span class="help-block">
        <strong>{{ $errors->first('If_ye_describe_the_year') }}</strong>
    </span>
    @endif
</div>

<!-- How Do You Prefer To Attend The Coming Yes Conference Field -->


<div class="form-group col-sm-12 {{ $errors->has('How_do_you_prefer_to_attend_the_coming_YES_conference') ? ' has-error' : '' }}">
    {!! Form::label('How_do_you_prefer_to_attend_the_coming_YES_conference', 'How Do You Prefer To Attend The Coming Our Conference?') !!}
    {!! Form::select('How_do_you_prefer_to_attend_the_coming_YES_conference', ['Part time' => 'Part time', 'Full time' => 'Full time'],  old('How_do_you_prefer_to_attend_the_coming_YES_conference'), ['class' => 'form-control']) !!}
    @if ($errors->has('How_do_you_prefer_to_attend_the_coming_YES_conference'))
    <span class="help-block">
        <strong>{{ $errors->first('How_do_you_prefer_to_attend_the_coming_YES_conference') }}</strong>
    </span>
    @endif
</div>


<!-- Are You Willing To Obtain A Participation Certificate Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Are_you_willing_to_obtain_a_participation_Certificate', 'Are You Willing To Obtain A Participation Certificate?') !!}
    {!! Form::select('Are_you_willing_to_obtain_a_participation_Certificate', ['Yes' => 'Yes', 'No' => 'No', 'Maybe' => 'Maybe'], old('Are_you_willing_to_obtain_a_participation_Certificate'), ['class' => 'form-control']) !!}
</div>

<!-- Can You Describe Why Youth Think Africas Youth Should Engage In Entrepreneurship Field -->


<div class="form-group col-sm-12 {{ $errors->has('Can_you_describe_why_youth_think_Africas_youth_should_engage') ? ' has-error' : '' }}">
    {!! Form::label('Can_you_describe_why_youth_think_Africas_youth_should_engage', 'Can You Describe Why Youth Think Africas Youth Should Engage In Entrepreneurship?') !!}
    {!! Form::textarea('Can_you_describe_why_youth_think_Africas_youth_should_engage', old('Can_you_describe_why_youth_think_Africas_youth_should_engage'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('Can_you_describe_why_youth_think_Africas_youth_should_engage'))
    <span class="help-block">
        <strong>{{ $errors->first('Can_you_describe_why_youth_think_Africas_youth_should_engage') }}</strong>
    </span>
    @endif
</div>

<!-- Why Are You Interested In Yes Award Competition Field -->

<div class="form-group col-sm-12">
    {!! Form::label('Why_are_you_interested_in_YES_AWARD_competition', 'Why Are You Interested In Yes Award Competition?') !!}
    {!! Form::textarea('Why_are_you_interested_in_YES_AWARD_competition', old('Why_are_you_interested_in_YES_AWARD_competition'), ['class' =>
    'form-control']) !!}
 
</div>

<!-- Project Name Field -->
<div class="form-group col-sm-12">
What is the project you will present in the competition (Optional)?

<ol type="1">
<li>
{!! Form::label('Project_name', 'Project Name:') !!}
    {!! Form::text('Project_name', old('Project_name'), ['class' => 'form-control']) !!}
</li>
<li>
{!! Form::label('What_is_it_about', 'What Is It About:') !!}
    {!! Form::textarea('What_is_it_about', old('What_is_it_about'), ['class' => 'form-control']) !!}
</li>
</ol>
   
</div>


<!-- What Is The Status Of Your Project Field -->
<div class="form-group col-sm-12">
    {!! Form::label('What_is_the_status_of_your_project', 'What Is The Status Of Your Project (Optional)?') !!}
    {!! Form::select('What_is_the_status_of_your_project', ['' => 'Choose Status', 
    'Currently going on' => 'Currently going on', 'Just an idea' =>
     'Just an idea', 'Ready for starting but no funds' => 'Ready for starting but no funds'], old('What_is_the_status_of_your_project'), ['class' => 'form-control']) !!}
</div>

<!-- Are You Willing To Apply For Your Project Loan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Are_you_willing_to_apply_for_your_project_loan', 'Are You Willing To Apply For Your Project Loan (Optional)') !!}
    {!! Form::select('Are_you_willing_to_apply_for_your_project_loan', ['No' => 'No', 'Yes' => 'Yes'], old('Are_you_willing_to_apply_for_your_project_loan'), ['class' => 'form-control']) !!}
</div>

<!-- If Yes Mention The Range Of The Loan Amount Field -->
<div class="form-group col-sm-12">
    {!! Form::label('If_yes_mention_the_range_of_the_loan_amount', 'If Yes Mention The Range Of The Loan Amount (Optional)?') !!}
    {!! Form::select('If_yes_mention_the_range_of_the_loan_amount', ['' => 'Choose a range', 
    '100,000-300,000RWF' => '100,000-300,000RWF', 
    '300,000-600,000RWF' => '300,000-600,000RWF',
     'Above 600,000 RWF' => 'Above 600,000 RWF'], old('If_yes_mention_the_range_of_the_loan_amount')
     , ['class' => 'form-control']) !!}
</div>

<!-- Upload Your Business Project Plan Field -->
<div class="form-group col-sm-12">
   
    <div class="form-group col-sm-6 {{ $errors->has('Upload_your_business_project_plan') ? ' has-error' : '' }}">
    {!! Form::label('Upload_your_business_project_plan', 'Upload Your Business Project Plan (only pdf required)') !!}<br />
    {!! Form::file('Upload_your_business_project_plan') !!}

    @if ($errors->has('Upload_your_business_project_plan'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('Upload_your_business_project_plan') }}</strong>
    </span>
    @endif
</div>
</div>
<div class="clearfix"></div>

<?php if(Auth::check()){ ?>
<!-- Session Id Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <?php if(\Request::get('session')){ ?>
    <input type="hidden" value="{{\Request::get('session')}}" name="session">
    <a href="{{ route('conferenceApplications.index') }}?session={{\Request::get('session')}}" class="btn btn-default">Cancel</a>
    <?php }else{ ?>
        <a href="{{ route('conferenceApplications.index') }}" class="btn btn-default">Cancel</a>
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
