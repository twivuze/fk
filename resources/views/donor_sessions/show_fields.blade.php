<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <b>{{ $donorSession->title }}</b>
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}

    {!!html_entity_decode($donorSession->contents)!!}
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
   
    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$donorSession->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$donorSession->title}}">

        </figure>
    </div>

</div>

<!-- Allow Application Field -->
<div class="form-group">
    {!! Form::label('allow_to_apply', 'Allow To Apply:') !!}
    <b>{{ $donorSession->allow_to_apply?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $donorSession->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $donorSession->updated_at }}</b>
</div>


