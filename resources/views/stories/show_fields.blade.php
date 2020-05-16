<div class="container mt-5">
<div class="box box-primary">
    <div class="box-header">
        {!! Form::label('title', 'Title:') !!}
        <b>{{ $stories->title }}</b>
    </div>
    <div class="box-body">
        {!! Form::label('description', 'Description:') !!}
        <b>   {!!html_entity_decode($stories->description)!!}</b>
        
    </div>

    <div class="text-center">
        <figure class="figure" style="width:50%">
            <img src="/thumbnail/{{$stories->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$stories->title}}">

        </figure>
    </div>
</div>

<div class="box-footer">
    <!-- Published Field -->
    <div class="form-group">
        {!! Form::label('published', 'Published:') !!}
        <b>{{ $stories->published?'Yes':'No' }}</b>
    </div>

    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <b>{{ $stories->created_at }}</b>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <b>{{ $stories->updated_at }}</b>
    </div>


</div>

</div>