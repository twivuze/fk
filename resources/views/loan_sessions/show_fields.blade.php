
<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <b>{{ $loanSessions->title }}</b>
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}

    {!!html_entity_decode($loanSessions->contents)!!}
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
   
    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$loanSessions->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$loanSessions->title}}">

        </figure>
    </div>

</div>

<!-- Allow Application Field -->
<div class="form-group">
    {!! Form::label('allow_application', 'Allow To Apply:') !!}
    <b>{{ $loanSessions->allow_application?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $loanSessions->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $loanSessions->updated_at }}</b>
</div>

