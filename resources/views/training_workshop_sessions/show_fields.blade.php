<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <b>{{ $trainingWorkshopSession->title }}</b>
</div>

<div class="form-group">
DateTime: {{ date("d M Y",strtotime($trainingWorkshopSession->event_date))}}, {{date("h:i A",strtotime($trainingWorkshopSession->event_time))}}<br />
Location: {{$trainingWorkshopSession->event_location}}
</div>

<!-- Contents Field -->
<div class="form-group">
    {!! Form::label('contents', 'Contents:') !!}

    {!!html_entity_decode($trainingWorkshopSession->contents)!!}
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
   
    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$trainingWorkshopSession->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$trainingWorkshopSession->title}}">

        </figure>
    </div>

</div>

<!-- Allow Application Field -->
<div class="form-group">
    {!! Form::label('allow_to_apply', 'Allow Application:') !!}
    <b>{{ $trainingWorkshopSession->allow_to_apply?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $trainingWorkshopSession->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $trainingWorkshopSession->updated_at }}</b>
</div>

