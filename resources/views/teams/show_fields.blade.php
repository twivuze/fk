
@if (isset($team) && $team->image)
        <figure class="figure" style="width:50%">
                    <img src="{{$team->image}}" style="width:180px" class="figure-img img-fluid rounded" alt="{{$team->title}}">
                   
         </figure>
         @endif
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $team->name !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $team->title !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{!! $team->country !!}</p>
</div>

<!-- Bio Field -->
<div class="form-group">
    {!! Form::label('bio', 'Bio:') !!}
    <p>{!! $team->bio !!}</p>
</div>

<!-- Team Category Id Field -->
<div class="form-group">
    {!! Form::label('team_category_id', 'Team Category:') !!}
    <p>{!! $team->category->name !!}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>{!! $team->published?'Yes':'No' !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $team->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $team->updated_at !!}</p>
</div>

