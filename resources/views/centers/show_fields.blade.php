
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <b>{{ $center->name }}</b>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <b>{{ $center->email }}</b>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <b>{{ $center->address }}</b>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <b>{{ $center->country }}</b>
</div>

<!-- Region Field -->
<div class="form-group">
    {!! Form::label('region', 'Region:') !!}
    <b>{{ $center->region }}</b>
</div>

<!-- Occupation Field -->
<div class="form-group">
    {!! Form::label('occupation', 'Occupation:') !!}
    <b>{{ $center->occupation }}</b>
</div>

<!-- Organization Field -->
<div class="form-group">
    {!! Form::label('organization', 'Organization:') !!}
    <b>{{ $center->organization }}</b>
</div>

<div class="form-group col-sm-12">
<h2>Micro-finance center related Questions.</h2>
</div>

<!-- Q1 Field -->
<div class="form-group">
    {!! Form::label('q1', 'Why do you want to work with All Trust Consult?') !!}<br>
    <div style="margin-left:30px">{{ $center->q1 }}</div>
</div>

<!-- Q2 Field -->
<div class="form-group">
    {!! Form::label('q2', 'What will be the name of the center for Micro-finance?') !!}<br>
    <div style="margin-left:30px">{{ $center->q2 }}</div>
</div>

<!-- Q3 Field -->
<div class="form-group">
    {!! Form::label('q3', 'Do you think you share the same vision with All Trust Consult?') !!}
    <div style="margin-left:30px">{{ $center->q3 }}</div>
</div>

<!-- Q4 Field -->
<div class="form-group">
{!! Form::label('q4', "How much time, effort, knowledge will you contribute to achieve the center's vision and mission?") !!}
<div style="margin-left:30px">{{ $center->q4 }}</div>
</div>

<!-- Q5 Field -->
<div class="form-group">
{!! Form::label('q5', "What will be your role?") !!}
<div style="margin-left:30px">{{ $center->q5 }}</div>
</div>

<!-- Q6 Field -->
<div class="form-group">
{!! Form::label('q6', "Do you have a Board of trustees/directors (Minimum 3 people)?") !!}
<div style="margin-left:30px">{{ $center->q6 }}</div>
</div>

<!-- Q7 Field -->
<div class="form-group">
{!! Form::label('q7', "How will you manage conflict if it arises among the Board members?") !!}
<div style="margin-left:30px">{{ $center->q7 }}</div>
</div>

<div class="form-group col-sm-12">
<h2>Additional information(Attachment)</h2>
</div>

<!-- Passport Size Photos Zipped Field -->
<div class="form-group">
{!! Form::label('passport_size_photos_zipped', "Passport size photos of the applicant and of all the board members.(Allow Only Zipped file)") !!}
<br>
    
    <a href="/documents/{{ $center->passport_size_photos_zipped }}" class="btn btn-info"> <i class="fa fa-download"></i> Download zipped file</a>
</div>

<!-- Copies National Identity Card Zipped Field -->
<div class="form-group">
{!! Form::label('copies_national_identity_card_zipped', "Copies of National Identity card for both the applicant and board members.(Allow Only Zipped file)") !!}
<br>
    
    <a href="/documents/{{ $center->passport_size_photos_zipped }}" class="btn btn-info"> <i class="fa fa-download"></i> Download zipped file</a>
 
</div>

<!-- Application Letter Written By Applicant Pdf Field -->
<div class="form-group">
{!! Form::label('application_letter_written_by_applicant_pdf', "Application Letter written by the applicant,with approval of the board members and their signatures.(Allow Only Pdf file)") !!}
    <br>
     <iframe src="/documents/{{ $center->application_letter_written_by_applicant_pdf }}" width="800px" height="500px" frameborder="0"></iframe>
    
</div>

<div class="form-group col-sm-12">
<h2>Additional information(Admin)</h2>
</div>


<!-- Cover Image Field -->
<?php if($center->cover_image){?>
<div class="form-group">
    {!! Form::label('cover_image', 'Cover Image:') !!}
    <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$center->cover_image}}" style="width:100%" class="figure-img img-fluid rounded">

        </figure>
</div>
<?php } ?>
<!-- Short Summary Field -->
<div class="form-group">
    {!! Form::label('short_summary', 'Short Summary:') !!}
    <b>{{ $center->short_summary }}</b>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!!html_entity_decode($center->description)!!}
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <b>{{ $center->status }}</b>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $center->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $center->updated_at }}</b>
</div>

