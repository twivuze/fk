<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Contents Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contents', 'Contents:') !!}
    {!! Form::textarea('contents', null, ['class' => 'form-control','id'=>'textarea']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
@if ($lenderSession && $lenderSession->image)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$lenderSession->image}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$lenderSession->title}}">
                   
         </figure>
         @endif

    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- 'bootstrap / Toggle Switch Allow To Apply Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('allow_to_apply', 'Allow To Apply:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('allow_to_apply', 0) !!}
        {!! Form::checkbox('allow_to_apply', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lenderSessions.index') }}" class="btn btn-default">Cancel</a>
</div>
