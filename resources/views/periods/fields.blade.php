<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('period', 'Period:') !!}
    {!! Form::number('period', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', ['day' => 'day', 'month' => 'month', 'year' => 'year'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('periods.index') }}" class="btn btn-default">Cancel</a>
</div>
