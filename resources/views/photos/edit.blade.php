@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Photos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($photos, ['route' => ['photos.update', $photos->id], 'method' => 'patch']) !!}

                        @include('photos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection