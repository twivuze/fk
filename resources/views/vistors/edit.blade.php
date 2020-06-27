@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vistors
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vistors, ['route' => ['vistors.update', $vistors->id], 'method' => 'patch']) !!}

                        @include('vistors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection