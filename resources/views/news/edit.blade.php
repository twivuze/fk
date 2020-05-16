@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            News
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($news, ['route' => ['news.update', $news->id], 'method' => 'patch','files' => true]) !!}

                        @include('news.fields',['news'=>$news])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection