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
                {!! Form::open(['url' => 'password/reset', 'method' => 'post', 'class' => 'col-md-8']) !!}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'New Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm New Password') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Reset Password', ['class' => 'form-control']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="col-md-3">

            </div>
    </div>
@stop