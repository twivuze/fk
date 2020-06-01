

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $fillingDocument->name }}</p>
</div>

<!-- File Name Field -->

<div class="form-group">
  
    <iframe src="/documents/{{ $fillingDocument->file_name }}" width="800px" height="800px" frameborder="0"></iframe>
    </p>
</div>




<!-- Filling Category Field -->
<div class="form-group">
    {!! Form::label('filling_category', 'Filling Category:') !!}
    <p>{{ $fillingDocument->filling_category }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $fillingDocument->country }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>{{ $fillingDocument->published }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fillingDocument->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fillingDocument->updated_at }}</p>
</div>

