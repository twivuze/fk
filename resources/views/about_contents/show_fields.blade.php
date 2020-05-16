<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $aboutContents->id }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $aboutContents->image }}</p>
</div>

<!-- About Section Id Field -->
<div class="form-group">
    {!! Form::label('about_section_id', 'About Section Id:') !!}
    <p>{{ $aboutContents->about_section_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $aboutContents->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $aboutContents->updated_at }}</p>
</div>

