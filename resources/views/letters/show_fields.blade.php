

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $letters->title }}</p>
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}
    <p><b>{!!html_entity_decode($letters->contents)!!}</b></p>
</div>

<!-- Numbering Field -->
<div class="form-group">
    {!! Form::label('numbering', 'Numbering:') !!}
    <p>{{ $letters->numbering }}</p>
</div>

<!-- Allow To Apply Field -->
<div class="form-group">
    {!! Form::label('allow_to_apply', 'Allow To Apply:') !!}
    <p>{{ $letters->allow_to_apply }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $letters->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $letters->updated_at }}</p>
</div>

