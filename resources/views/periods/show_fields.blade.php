<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $period->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $period->name }}</p>
</div>

<!-- Period Field -->
<div class="form-group">
    {!! Form::label('period', 'Period:') !!}
    <p>{{ $period->period }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $period->category }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $period->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $period->updated_at }}</p>
</div>

