@extends('layouts.default')

@section('page_title')
    Update Profile
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Update Profile</h1>
        </div>

        <div class="row">
            {!! Form::model($user, ['url' => ['account/update', auth()->user()->id], 'method' => 'post', 'files' => true]) !!}
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::label('username', 'Username') !!}
                        {!! Form::text('username', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <a href="" class="btn btn-primary">Change Password</a>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Save Changes', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-5">
                    <input type="file" name="image">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop