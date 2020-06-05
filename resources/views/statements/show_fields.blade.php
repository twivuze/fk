

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $statement->title }}</p>
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}
    <p><b>{!!html_entity_decode($statement->contents)!!}</b></p>
    
</div>

<!-- Numbering Field -->
<div class="form-group">
    {!! Form::label('numbering', 'Numbering:') !!}
    <p>{{ $statement->numbering }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $statement->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $statement->updated_at }}</p>
</div>

