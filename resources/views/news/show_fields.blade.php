<div class="container mt-5">
<div class="box box-primary">
    <div class="box-header">
        {!! Form::label('title', 'Title:') !!}
        <b>{{ $news->title }}</b>
    </div>
    <div class="box-body">
        {!! Form::label('description', 'Description:') !!}
        <b>
        {!!html_entity_decode($news->description)!!}
        
        </b>
    </div>

    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$news->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$news->title}}">

        </figure>
    </div>
</div>

<div class="box-footer">
    <!-- Published Field -->
    <div class="form-group">
        {!! Form::label('published', 'Published:') !!}
        <b>{{ $news->published?'Yes':'No' }}</b>
    </div>

    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <b>{{ $news->created_at }}</b>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <b>{{ $news->updated_at }}</b>
    </div>


</div>

</div>