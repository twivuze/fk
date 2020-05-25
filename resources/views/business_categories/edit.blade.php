@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Business Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($businessCategory, ['route' => ['businessCategories.update', $businessCategory->id], 'method' => 'patch']) !!}

                        @include('business_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection