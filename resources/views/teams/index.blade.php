@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Teams</h1>
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
            href="{!! route('teams.create') !!}">Add New</a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
        <form action="/search" method="GET">
        
            <div class="row">
                <?php 
                $categories= \App\Models\TeamCategory::orderBy('id','DESC')->get();
                $countries= \App\Models\Team::orderBy('id','DESC')->groupBy('country')
                ->pluck('country')
                ->all();
                ?>
                <div class="form-group col-sm-3">
                    {!! Form::label('team_category_id', 'Filter By Category') !!}
                    <select name="team_category_id" id="team_category_id" value="old('team_category_id')"
                        class="form-control">
                        <option value="">Filter By Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('country', 'Filter By Country') !!}
                    <select name="country" id="country" value="old('country')" class="form-control">
                        <option value="">Filter By Country</option>
                        @foreach($countries as $country)
                        <option value="{{$country}}">{{$country}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('search', 'Search by name, title') !!}
                    {!! Form::text('search', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-1 float-left">
                <button type="submit" style="margin-top: 20px;margin-bottom: 5px;margin-left:20px" class="btn btn-info  pull-right">search</button>
               
            </div>

            <div class="form-group col-sm-1 float-left">
                
               
                <a class="btn btn-default pull-right" style="margin-top: 20px;margin-bottom: 5px"
            href="{!! route('teams.index') !!}">Refresh</a> </div>
            </div>
     </form>
            @include('teams.table')
        </div>
    </div>
    <div class="text-center">

        @include('adminlte-templates::common.paginate', ['records' => $teams])

    </div>
</div>
@endsection
