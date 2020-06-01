<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <b>{{ $conferenceSession->title }}</b>
</div>

<div class="form-group">
DateTime: {{ date("d M Y",strtotime($conferenceSession->event_date))}}, {{date("h:i A",strtotime($conferenceSession->event_time))}}<br />
Location: {{$conferenceSession->event_location}}
</div>



<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}

    {!!html_entity_decode($conferenceSession->contents)!!}
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
   
    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$conferenceSession->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$conferenceSession->title}}">

        </figure>
    </div>

</div>

<!-- Allow Application Field -->
<div class="form-group">
    {!! Form::label('allow_to_apply', 'Allow Application:') !!}
    <b>{{ $conferenceSession->allow_to_apply?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $conferenceSession->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $conferenceSession->updated_at }}</b>
</div>

