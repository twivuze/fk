<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Used Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('used', 'Used:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('used', 0) !!}
        {!! Form::checkbox('used', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lenderCategories.index') }}" class="btn btn-default">Cancel</a>
</div>
