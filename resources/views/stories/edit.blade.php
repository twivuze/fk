@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stories
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stories, ['route' => ['stories.update', $stories->id], 'method' => 'patch','files' => true]) !!}

                        @include('stories.fields',['story'=>$stories])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection