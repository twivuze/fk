@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Training Workshop
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trainingWorkshop, ['route' => ['trainingWorkshops.update', $trainingWorkshop->id], 'method' => 'patch']) !!}

                        @include('training_workshops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection