@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Statement
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statement, ['route' => ['statements.update', $statement->id], 'method' => 'patch']) !!}

                        @include('statements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection