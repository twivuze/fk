@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="#">About Flayer</a>
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
                                <strong>Create About Flayer</strong>
                            </div>
                            <div class="card-body">
                               
                                <form style="width:100%" method="post" action="{{url('/aboutContents')}}" enctype="multipart/form-data" 
                                                class="dropzone" id="dropzone">
                                    
                                    <?php
                                    $aboutSections=App\Models\AboutSections::orderBy('updated_at','DESC')->get();
                                    ?>
                                    <b>Select Section</b>
                                    <select name="about_section_id" class="form-control" id="about_section_id">
                                    @foreach($aboutSections as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    <hr>
                                    @csrf
                                </form>

                                <hr>
                                <div class="card-body">
                                @include('about_contents.table')
                              <div class="pull-right mr-3">
                                     
                                @include('adminlte-templates::common.paginate', ['records' => $aboutContents])

                              </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection



