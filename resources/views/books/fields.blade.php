<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Field -->
<div class="form-group col-sm-12">
    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>

<!-- Edition Field -->
<div class="form-group col-sm-12">
    {!! Form::label('edition', 'Edition:') !!}
    {!! Form::text('edition', null, ['class' => 'form-control']) !!}
</div>

<!-- Publisher Field -->
<div class="form-group col-sm-12">
    {!! Form::label('publisher', 'Publisher:') !!}
    {!! Form::text('publisher', null, ['class' => 'form-control']) !!}
</div>

<!-- Isbn Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ISBN', 'Isbn:') !!}
    {!! Form::text('ISBN', null, ['class' => 'form-control']) !!}
</div>

<!-- Length Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Length', 'Length:') !!}
    {!! Form::text('Length', null, ['class' => 'form-control']) !!}
</div>

<!-- Subjects Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Subjects', 'Subjects:') !!}
    {!! Form::text('Subjects', null, ['class' => 'form-control']) !!}
</div>

<!-- Cover Field -->

<div class="form-group col-sm-12">
@if (isset($books) && $books->cover)
        <figure class="figure" style="width:10%">
                    <img src="/images/{{$books->cover}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$books->title}}">
                   
         </figure>
         @endif
    {!! Form::label('cover', 'Upload Cover:') !!}
    {!! Form::file('cover') !!}
</div>

<div class="form-group col-sm-12">

    {!! Form::label('book', 'Upload Book:') !!}
    {!! Form::file('book') !!}
</div>


<!-- Payment Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    {!! Form::select('payment_type', ['Free' => 'Free', 'Paid' => 'Paid'], null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', 'Rwf', ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Published Field' -->
<div class="form-group col-sm-12">
    {!! Form::label('published', 'Published:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Enable Preview Field' -->
<div class="form-group col-sm-12">
    {!! Form::label('enable_preview', 'Enable Preview:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enable_preview', 0) !!}
        {!! Form::checkbox('enable_preview', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('enable_download', 'Enable Download:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enable_download', 0) !!}
        {!! Form::checkbox('enable_download', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('books.index') }}" class="btn btn-default">Cancel</a>
</div>
