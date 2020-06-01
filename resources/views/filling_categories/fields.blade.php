<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<!-- Image Field -->
    <div class="form-group col-sm-6">
    @if (isset($fillingCategory) && $fillingCategory->image)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$fillingCategory->image}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$fillingCategory->name}}">
                   
         </figure>
    @endif

    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

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
    <a href="{{ route('fillingCategories.index') }}" class="btn btn-default">Cancel</a>
</div>
