<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $enterpriseCategory->id }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $enterpriseCategory->category }}</p>
</div>

<!-- Positioning Field -->
<div class="form-group">
    {!! Form::label('positioning', 'Positioning:') !!}
    <p>{{ $enterpriseCategory->positioning }}</p>
</div>

<!-- Used Field -->
<div class="form-group">
    {!! Form::label('used', 'Used:') !!}
    <p>{{ $enterpriseCategory->used }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $enterpriseCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $enterpriseCategory->updated_at }}</p>
</div>

