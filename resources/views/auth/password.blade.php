@extends('layouts.default')

@section('page_title')
    Reset Password
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Reset Password</h1>
        </div>

       <div class="row">
           <div class="col-md-3">

           </div>

           <div class="col-md-6">
               {!! Form::open(['url' => 'password/email', 'method' => 'post']) !!}
               <div class="form-group">
                   {!! Form::label('email', 'Email') !!}
                   {!! Form::text('email', null, ['class' => 'form-control']) !!}
               </div>

               <div class="form-group">
                   {!! Form::submit('Send Password Reset Link', ['class' => 'form-control']) !!}
               </div>
               {!! Form::close() !!}
           </div>

           <div class="col-md-3">

           </div>
       </div>
    </div>
@stop