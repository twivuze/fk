
<!-- Avatar Field -->
<div class="form-group">
<figure class="figure" style="width:25%">
                    <img src="/thumbnail/{{$teams->avatar}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$teams->full_name}}">
                   
 </figure>
</div>

<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <b>{{ $teams->full_name }}</b>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <b>{{ $teams->title }}</b>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <b>{{ $teams->email }}</b>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <b>{{ $teams->phone }}</b>
</div>

<!-- Bio Field -->
<div class="form-group">
    {!! Form::label('bio', 'Bio:') !!}
    <b>{{ $teams->bio }}</b>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <b>{{ $teams->published?'Yes':'No' }}</b>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $teams->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $teams->updated_at }}</b>
</div>

