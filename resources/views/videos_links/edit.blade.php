@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Videos Links
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($videosLinks, ['route' => ['videosLinks.update', $videosLinks->id], 'method' => 'patch']) !!}

                        @include('videos_links.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection