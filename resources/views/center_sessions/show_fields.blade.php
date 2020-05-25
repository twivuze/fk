
<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <b>{{ $centerSession->title }}</b>
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}

    {!!html_entity_decode($centerSession->contents)!!}
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
   
    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$centerSession->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$centerSession->title}}">

        </figure>
    </div>

</div>

<!-- Allow Application Field -->
<div class="form-group">
    {!! Form::label('allow_to_apply', 'Allow To Apply:') !!}
    <b>{{ $centerSession->allow_to_apply?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $centerSession->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $centerSession->updated_at }}</b>
</div>




