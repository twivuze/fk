<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessCategory->id }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $businessCategory->category }}</p>
</div>

<!-- Used Field -->
<div class="form-group">
    {!! Form::label('used', 'Used:') !!}
    <p>{{ $businessCategory->used }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessCategory->updated_at }}</p>
</div>

