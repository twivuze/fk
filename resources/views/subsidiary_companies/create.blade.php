@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subsidiary Companies
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'subsidiaryCompanies.store']) !!}

                        @include('subsidiary_companies.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
