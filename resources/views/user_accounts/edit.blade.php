@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Account
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userAccount, ['route' => ['userAccounts.update', $userAccount->id], 'method' => 'patch']) !!}

                        @include('user_accounts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection