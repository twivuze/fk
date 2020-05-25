@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Center
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'centers.store', 'files' => true]) !!}

                        @include('centers.fields',['session_id'=>$session->id])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
