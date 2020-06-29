<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $bookingRequest->full_name }}</p>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $bookingRequest->email }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $bookingRequest->address }}</p>
</div>

<!-- Street Address Field -->
<div class="form-group">
    {!! Form::label('street_address', 'Street Address:') !!}
    <p>{{ $bookingRequest->street_address }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $bookingRequest->phone_number }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $bookingRequest->city }}</p>
</div>

<!-- Province Field -->
<div class="form-group">
    {!! Form::label('province', 'Province:') !!}
    <p>{{ $bookingRequest->province }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $bookingRequest->country }}</p>
</div>

<!-- Company Or Initiative Field -->
<div class="form-group">
    {!! Form::label('company_or_Initiative', 'Company Or Initiative:') !!}
    <p>{{ $bookingRequest->company_or_Initiative }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $bookingRequest->title }}</p>
</div>

<!-- Function Field -->
<div class="form-group">
    {!! Form::label('function', 'Function:') !!}
    <p>{{ $bookingRequest->function }}</p>
</div>

<!-- Q1 Field -->
<div class="form-group">
    {!! Form::label('q1', 'What is the expected attendance at your event?') !!}<br>
    <strong>If known, Kindly let us have the information about the date, location and time.</strong>
    <p>{{ $bookingRequest->q1 }}</p>
</div>

<!-- Q2 Field -->
<div class="form-group">
    {!! Form::label('q2', 'What is the purpose of your event ?') !!}
    <p>{{ $bookingRequest->q2 }}</p>
</div>


<div class="form-group">
    {!! Form::label('q3', 'If known, Kindly let us have the information about the date, location and time') !!}
    <p>{{ $bookingRequest->q3 }}</p>
</div> 

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bookingRequest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bookingRequest->updated_at }}</p>
</div>

