<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- contents Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contents', 'contents:') !!}
    {!! Form::textarea('contents', null, ['class' => 'form-control','id'=>'textarea']) !!}
</div>



<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['YoutubeLink' => 'YoutubeLink', 'Link' => 'Link'], null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>
<!-- 'bootstrap / Toggle Switch Published Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Published:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('videosLinks.index') }}" class="btn btn-default">Cancel</a>
</div>
