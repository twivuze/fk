<?php
 $microFundApplication = \App\Models\MicroFundApplication::where('user_id',\Auth::id())->orderBy('id','DESC')->first();
 $center = \App\Models\Center::where('id',$microFundApplication->microfinance_center)->orderBy('id','DESC')->first();
 $fillings = \App\Models\FillingCategory::where('published',1)->orderBy('id','DESC')->get();
?>
<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>

<!-- Microfund Manager Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('filling_category_id') ? ' has-error' : '' }}">
    {!! Form::label('filling_category_id', 'Choose Filling Category:') !!}
    
    {!! Form::label('filling_category_id', 'Choose Filling Category:') !!}
    <select name="filling_category_id" id="filling_category_id" value="{{old('filling_category_id')}}" class="form-control">

        <?php if(isset($fillingDocument->fillingCat)) { ?>
        <option value="{{$fillingDocument->fillingCat->id}}">
            {{$fillingDocument->fillingCat->name}}
        </option>
        <?php }else{ ?>
        <option value="{{old('filling_category_id')}}">Choose Filling Category</option>
        <?php } ?>
        @foreach($fillings as $filling)
        <option value="{{$filling->id}}">{{$filling->name}}</option>
        @endforeach
    </select>

    @if ($errors->has('filling_category_id'))
    <span class="help-block">
        <strong>{{ $errors->first('filling_category_id') }}</strong>
    </span>
    @endif

</div>

<!-- File Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('file_name') ? ' has-error' : '' }}">
    {!! Form::label('file_name', 'Document Name:') !!}
    {!! Form::file('file_name') !!}
    @if ($errors->has('file_name'))
    <span class="help-block">
        <strong>{{ $errors->first('file_name') }}</strong>
    </span>
    @endif
</div>




<!-- Country Field -->
<div class="form-group col-sm-6 {{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', $center?$center->country:old('country'), ['class' => 'form-control']) !!}
    @if ($errors->has('country'))
    <span class="help-block">
        <strong>{{ $errors->first('country') }}</strong>
    </span>
    @endif
</div>

<!-- 'bootstrap / Toggle Switch Published Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Published:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


{!! Form::hidden('microfund_manager_id', $microFundApplication->id, ['class' => 'form-control']) !!}
    {!! Form::hidden('center_id', $microFundApplication->microfinance_center?$microFundApplication->microfinance_center:0, ['class' => 'form-control']) !!}

<hr>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fillingDocuments.index') }}" class="btn btn-default">Cancel</a>
</div>
