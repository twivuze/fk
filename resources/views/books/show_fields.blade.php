
<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $books->title }}</p>
</div>

<!-- Author Field -->
<div class="form-group">
    {!! Form::label('author', 'Author:') !!}
    <p>{{ $books->author }}</p>
</div>

<!-- Edition Field -->
<div class="form-group">
    {!! Form::label('edition', 'Edition:') !!}
    <p>{{ $books->edition }}</p>
</div>

<!-- Publisher Field -->
<div class="form-group">
    {!! Form::label('publisher', 'Publisher:') !!}
    <p>{{ $books->publisher }}</p>
</div>

<!-- Isbn Field -->
<div class="form-group">
    {!! Form::label('ISBN', 'Isbn:') !!}
    <p>{{ $books->ISBN }}</p>
</div>

<!-- Length Field -->
<div class="form-group">
    {!! Form::label('Length', 'Length:') !!}
    <p>{{ $books->Length }}</p>
</div>

<!-- Subjects Field -->
<div class="form-group">
    {!! Form::label('Subjects', 'Subjects:') !!}
    <p>{{ $books->Subjects }}</p>
</div>

<!-- Cover Field -->
<div class="form-group">
    {!! Form::label('cover', 'Cover:') !!}
    @if (isset($books) && $books->cover)
        <figure class="figure" style="width:10%">
                    <img src="/images/{{$books->cover}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$books->title}}">
                   
         </figure>
         @endif

         <hr>

         <p>
    <iframe src="/book_files/{{ $books->book }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>


<!-- Payment Type Field -->
<div class="form-group">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    <p>{{ $books->payment_type }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $books->currency }} {{ $books->price }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $books->description }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>{{ $books->published?'Yes':'No' }}</p>
</div>

<!-- Enable Preview Field -->
<div class="form-group">
    {!! Form::label('enable_preview', 'Enable Preview:') !!}
    <p>{{ $books->enable_preview?'Yes':'No' }}</p>
</div>

<div class="form-group">
    {!! Form::label('enable_download', 'Enable Download:') !!}
    <p>{{ $books->enable_download?'Yes':'No' }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $books->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $books->updated_at }}</p>
</div>

