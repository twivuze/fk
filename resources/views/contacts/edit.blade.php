@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contacts
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contacts, ['route' => ['contacts.update', $contacts->id], 'method' => 'patch']) !!}

                        @include('contacts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection