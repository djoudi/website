@extends('layouts.default')

@section('page_title')
    Register
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Register</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['url' => 'auth/register', 'method' => 'post']) !!}

                        <!-- Name Form Input -->
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Username Form Input -->
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                </div>
                        <!-- Email Form Input -->
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Password Form Input -->
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <!-- Password_confirmation Form Input -->
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                <!-- Register Form Input -->
                <div class="form-group">
                    {!! Form::submit('Register', ['class' => 'form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>

            <div class="col-md-4">
                <p class="lead">Register now for <span class="text-success">FREE</span></p>
                <ul class="list-unstyled" style="line-height: 2">
                    <li><span class="fa fa-check text-success"></span> See all your orders</li>
                    <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                    <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                    <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                    <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                </ul>
                <a href="{{ url('auth/github') }}" class="btn btn-gh"><i class="fa fa-github"></i> GitHub</a>
                <a href="{{ url('auth/twitter') }}" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
            </div>
        </div>
    </div>
@stop