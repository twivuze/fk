<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
@if (isset($aboutUsHistory) && $aboutUsHistory->image)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$aboutUsHistory->image}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$aboutUsHistory->title}}">
                   
         </figure>
         @endif

    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'textarea']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('aboutUsHistories.index') }}" class="btn btn-default">Cancel</a>
</div>
