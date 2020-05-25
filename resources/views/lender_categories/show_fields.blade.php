<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $lenderCategory->id }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $lenderCategory->category }}</p>
</div>

<!-- Used Field -->
<div class="form-group">
    {!! Form::label('used', 'Used:') !!}
    <p>{{ $lenderCategory->used }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $lenderCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $lenderCategory->updated_at }}</p>
</div>

