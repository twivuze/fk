@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Book Reviews
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bookReviews, ['route' => ['bookReviews.update', $bookReviews->id], 'method' => 'patch']) !!}

                        @include('book_reviews.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection