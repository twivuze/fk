@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Letters
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($letters, ['route' => ['letters.update', $letters->id], 'method' => 'patch']) !!}

                        @include('letters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection