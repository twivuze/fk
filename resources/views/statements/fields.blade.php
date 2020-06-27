<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Contents Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contents', 'Contents:') !!}
    {!! Form::textarea('contents', null, ['class' => 'form-control','id'=>'textarea']) !!}
</div>

<!-- Numbering Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numbering', 'Numbering:') !!}
    {!! Form::number('numbering', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('allow_to_apply', 'Published:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('allow_to_apply', 0) !!}
        {!! Form::checkbox('allow_to_apply', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('statements.index') }}" class="btn btn-default">Cancel</a>
</div>
