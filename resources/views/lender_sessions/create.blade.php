@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lender Session
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'lenderSessions.store', 'files' => true]) !!}

                        @include('lender_sessions.fields',['lenderSession'=>null])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
