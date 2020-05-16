<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'textarea']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
@if ($story && $story->image)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$story->image}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$story->title}}">
                   
         </figure>
         @endif
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
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
<div class="form-group col-sm-12 float-right">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('stories.index') }}" class="btn btn-default">Cancel</a>
</div>
