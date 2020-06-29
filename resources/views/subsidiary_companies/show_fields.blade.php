<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $subsidiaryCompanies->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $subsidiaryCompanies->name }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $subsidiaryCompanies->url }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>{{ $subsidiaryCompanies->published }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $subsidiaryCompanies->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $subsidiaryCompanies->updated_at }}</p>
</div>

