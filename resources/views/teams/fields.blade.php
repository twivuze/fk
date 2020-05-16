<!-- Avatar Field -->
<div class="form-group col-sm-6">

@if (isset($teams) && $teams->avatar)
        <figure class="figure" style="width:25%">
                    <img src="/thumbnail/{{$teams->avatar}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$teams->full_name}}">
                   
         </figure>
 @endif

    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::file('avatar') !!}
</div>
<div class="clearfix"></div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control','id'=>"countTextArea"]) !!}

    @push('scripts')
   <script type="text/javascript">
        $("[id*=countTextArea]").MaxLength(
        {
            MaxLength: 300
        });
       
</script>
@endpush
</div>

<!-- 'bootstrap / Toggle Switch Published Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Published:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teams.index') }}" class="btn btn-default">Cancel</a>
</div>
