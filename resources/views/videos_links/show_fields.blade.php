
<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $videosLinks->title }}</p>
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}
    <p class="container">{!!html_entity_decode($videosLinks->contents)!!} </p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $videosLinks->type }}</p>
</div>

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    <p class="container">
    {!!html_entity_decode($videosLinks->link_html)!!}
    
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <b>{{ $videosLinks->published?'Yes':"No" }}</b>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $videosLinks->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $videosLinks->updated_at }}</p>
</div>

