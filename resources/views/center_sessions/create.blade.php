@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Center Session
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'centerSessions.store', 'files' => true]) !!}

                        @include('center_sessions.fields',['centerSession'=>null])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
