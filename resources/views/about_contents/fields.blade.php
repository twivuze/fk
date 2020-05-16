<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- About Section Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('about_section_id', 'About Section Id:') !!}
    {!! Form::number('about_section_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('aboutContents.index') }}" class="btn btn-default">Cancel</a>
</div>
