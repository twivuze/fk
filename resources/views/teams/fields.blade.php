<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('numbering', 'Numbering:') !!}
    {!! Form::text('numbering', 0, ['class' => 'form-control']) !!}
</div>


<?php 
$categories= \App\Models\TeamCategory::where('published',1)->orderBy('id','DESC')->get();
?>
<div class="form-group col-sm-6">
    {!! Form::label('team_category_id', 'Team Category:') !!}
    <select name="team_category_id" id="team_category_id" value="old('team_category_id')" class="form-control">

        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-6">
@if (isset($team) && $team->image)
        <figure class="figure" style="width:50%">
                    <img src="{{$team->image}}" style="width:100%" class="figure-img img-fluid rounded" alt="{{$team->title}}">
                   
         </figure>
         @endif
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>




<!-- Bio Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('teams.index') !!}" class="btn btn-default">Cancel</a>
</div>
