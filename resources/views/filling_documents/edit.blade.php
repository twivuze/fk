@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Filling Document
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fillingDocument, ['route' => ['fillingDocuments.update', $fillingDocument->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('filling_documents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection