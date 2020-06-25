
<!-- Quote Owner Field -->
<div class="form-group">
    {!! Form::label('quote_owner', 'Quote Owner:') !!}
    <p>{{ $quotes->quote_owner }}</p>
</div>

<!-- Quote Field -->
<div class="form-group">
    {!! Form::label('quote', 'Quote:') !!}
    <p>{{ $quotes->quote }}</p>
</div>

<!-- Avatar Field -->
<div class="form-group">
    {!! Form::label('avatar', 'Avatar:') !!}

    @if ($quotes && $quotes->avatar)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$quotes->avatar}}" style="width:40%" class="figure-img img-fluid rounded">
                   
         </figure>
         @endif
</div>

<!-- Slider Image Field -->
<div class="form-group">
    {!! Form::label('slider_image', 'Slider Image:') !!}
   
@if ($quotes && $quotes->slider_image)
        <figure class="figure" style="width:50%">
                    <img src="/images/{{$quotes->slider_image}}" style="width:100%" class="figure-img img-fluid rounded">
                   
         </figure>
         @endif
</div>


<!-- Publish Field -->
<div class="form-group">
    {!! Form::label('publish', 'Publish:') !!}
    <p>{{ $quotes->publish?'Yes':'No' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $quotes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $quotes->updated_at }}</p>
</div>

