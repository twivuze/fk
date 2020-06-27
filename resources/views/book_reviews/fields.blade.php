<!-- Review Field -->
<div class="form-group col-sm-12">
    <!-- {!! Form::label('review', 'Review:') !!} -->
    {!! Form::hidden('review', 5, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Full name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
    <span class="help-block" style="color: red!important;">
        <strong>Full name is required</strong>
    </span>
    @endif
</div>
<!-- Rating Field -->
<div class="form-group col-sm-12 {{ $errors->has('review') ? ' has-error' : '' }}">
    {!! Form::label('review', 'Review:') !!}
    {!! Form::textarea('review', old('review'), ['class' => 'form-control']) !!}
    @if ($errors->has('review'))
    <span class="help-block" style="color: red!important;">
        <strong>review is required</strong>
    </span>
    @endif
</div>

<!-- Book Id Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('book_id', $book_id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-success btn-block btn-md']) !!}
    <!-- <a href="{{ route('bookReviews.index') }}" class="btn btn-default">Cancel</a> -->
</div>
