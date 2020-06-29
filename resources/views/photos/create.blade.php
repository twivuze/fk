@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="#">Photos</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('adminlte-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create Photos</strong>
                            </div>
                            <div class="card-body">
                            @include('flash::message')

                                <form style="width:100%" method="post" action="{{url('/photos')}}" enctype="multipart/form-data" 
                                                class="dropzone" id="dropzone">
                                    @csrf
                                </form>

                                <hr>
                                <div class="card-body">
                                @include('photos.table')
                              <div class="pull-right mr-3">
                                     
                                @include('adminlte-templates::common.paginate', ['records' => $photos])

                              </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
