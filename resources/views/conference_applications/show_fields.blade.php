
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $conferenceApplication->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $conferenceApplication->email }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $conferenceApplication->address }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $conferenceApplication->contact }}</p>
</div>

<!-- Date Of Birth Field -->
<div class="form-group">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    <p>{{ $conferenceApplication->date_of_birth }}</p>
</div>

<!-- How  Did  You Know Yes Conference Field -->
<div class="form-group">
    {!! Form::label('How_did_you_know_Yes_Conference', 'How  Did  You Know Our Conference:') !!}
    <p>{{ $conferenceApplication->How_did_you_know_Yes_Conference }}</p>
</div>

<!-- Have You Previously Attended Any Yes Conference Field -->
<div class="form-group">
    {!! Form::label('Have_you_previously_attended_any_Yes_Conference', 'Have You Previously Attended Any Our Conference:') !!}
    <p>{{ $conferenceApplication->Have_you_previously_attended_any_Yes_Conference }}</p>
</div>

<!-- If Ye Describe The Year Field -->
<div class="form-group">
    {!! Form::label('If_ye_describe_the_year', 'If Ye Describe The Year:') !!}
    <p>{{ $conferenceApplication->If_ye_describe_the_year }}</p>
</div>

<!-- How Do You Prefer To Attend The Coming Yes Conference Field -->
<div class="form-group">
    {!! Form::label('How_do_you_prefer_to_attend_the_coming_YES_conference', 'How Do You Prefer To Attend The Coming Our Conference:') !!}
    <p>{{ $conferenceApplication->How_do_you_prefer_to_attend_the_coming_YES_conference }}</p>
</div>

<!-- Are You Willing To Obtain A Participation Certificate Field -->
<div class="form-group">
    {!! Form::label('Are_you_willing_to_obtain_a_participation_Certificate', 'Are You Willing To Obtain A Participation Certificate:') !!}
    <p>{{ $conferenceApplication->Are_you_willing_to_obtain_a_participation_Certificate }}</p>
</div>

<!-- Can You Describe Why Youth Think Africas Youth Should Engage In Entrepreneurship Field -->
<div class="form-group">
    {!! Form::label('Can_you_describe_why_youth_think_Africas_youth_should_engage_in_entrepreneurship', 'Can You Describe Why Youth Think Africas Youth Should Engage In Entrepreneurship:') !!}
    <p>{{ $conferenceApplication->Can_you_describe_why_youth_think_Africas_youth_should_engage}}</p>
</div>

<!-- Why Are You Interested In Yes Award Competition Field -->
<div class="form-group">
    {!! Form::label('Why_are_you_interested_in_YES_AWARD_competition', 'Why Are You Interested In Yes Award Competition:') !!}
    <p>{{ $conferenceApplication->Why_are_you_interested_in_YES_AWARD_competition }}</p>
</div>

<!-- Project Name Field -->
<div class="form-group">
    {!! Form::label('Project_name', 'Project Name:') !!}
    <p>{{ $conferenceApplication->Project_name }}</p>
</div>

<!-- What Is It About Field -->
<div class="form-group">
    {!! Form::label('What_is_it_about', 'What Is It About:') !!}
    <p>{{ $conferenceApplication->What_is_it_about }}</p>
</div>

<!-- What Is The Status Of Your Project Field -->
<div class="form-group">
    {!! Form::label('What_is_the_status_of_your_project', 'What Is The Status Of Your Project:') !!}
    <p>{{ $conferenceApplication->What_is_the_status_of_your_project }}</p>
</div>

<!-- Are You Willing To Apply For Your Project Loan Field -->
<div class="form-group">
    {!! Form::label('Are_you_willing_to_apply_for_your_project_loan', 'Are You Willing To Apply For Your Project Loan:') !!}
    <p>{{ $conferenceApplication->Are_you_willing_to_apply_for_your_project_loan }}</p>
</div>

<!-- If Yes Mention The Range Of The Loan Amount Field -->
<div class="form-group">
    {!! Form::label('If_yes_mention_the_range_of_the_loan_amount', 'If Yes Mention The Range Of The Loan Amount:') !!}
    <p>{{ $conferenceApplication->If_yes_mention_the_range_of_the_loan_amount }}</p>
</div>

<!-- Upload Your Business Project Plan Field -->
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $conferenceApplication->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $conferenceApplication->updated_at }}</b>
</div>

<?php if($conferenceApplication->Upload_your_business_project_plan=='--' || $conferenceApplication->Upload_your_business_project_plan==''){?>
<div class="form-group">
    {!! Form::label('Upload_your_business_project_plan', 'Upload Your Business Project Plan:') !!}
    <p>
    <iframe src="/documents/{{ $conferenceApplication->Upload_your_business_project_plan }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>
<?php } ?>




