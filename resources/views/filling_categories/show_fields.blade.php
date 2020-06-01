
<!-- Title Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <b>{{ $fillingCategory->name }}</b>
</div>


<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
   
    <div class="text-center">
        <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$fillingCategory->image}}" style="width:100%" class="figure-img img-fluid rounded"
                alt="{{$fillingCategory->name}}">

        </figure>
    </div>

</div>

<!-- Allow Application Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <b>{{ $fillingCategory->published?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $fillingCategory->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $fillingCategory->updated_at }}</b>
</div>


