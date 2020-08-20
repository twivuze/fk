<!-- Quote Owner Field -->
<div class="form-group col-sm-12">
    {!! Form::label('quote_owner', 'Quote Owner:') !!}
    {!! Form::text('quote_owner', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('viewers', 'views:') !!}
    {!! Form::number('viewers', null, ['class' => 'form-control']) !!}
</div>

<!-- Quote Field -->
<div class="form-group col-sm-12">
    {!! Form::label('quote', 'Quote:') !!}
    {!! Form::textarea('quote', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('quote_date', 'Quote date:') !!}
    {!! Form::date('quote_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-12">
    
@if (isset($quotes) && $quotes->avatar)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$quotes->avatar}}" style="width:40%" class="figure-img img-fluid rounded">
                   
         </figure><br>
         @endif
    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::file('avatar') !!}
</div>
<div class="clearfix"></div>

<!-- Slider Image Field -->
<div class="form-group col-sm-12">
@if (isset($quotes) && $quotes->slider_image)
        <figure class="figure" style="width:50%">
                    <img src="/images/{{$quotes->slider_image}}" style="width:40%" class="figure-img img-fluid rounded">
                   
         </figure><br>
         @endif
    {!! Form::label('slider_image', 'Slider Image:') !!}
    {!! Form::file('slider_image') !!}
</div>
<div class="clearfix"></div>

<!-- 'bootstrap / Toggle Switch Publish Field' -->
<div class="form-group col-sm-12">
    {!! Form::label('publish', 'Publish:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('publish', 0) !!}
        {!! Form::checkbox('publish', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('enable_slider_show', 'Add Quote To SliderShow:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enable_slider_show', 0) !!}
        {!! Form::checkbox('enable_slider_show', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quotes.index') }}" class="btn btn-default">Cancel</a>
</div>
