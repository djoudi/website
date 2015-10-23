@extends('layouts.default')

@section('page_title')
    Complete Registration
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Complete Registration</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['url' => 'auth/register', 'method' => 'post']) !!}
                <input type="hidden" name="twitter_id" value="{{ session()->get('comp_twitter_id') }}">
                <input type="hidden" name="github_id" value="{{ session()->get('comp_github_id') }}">
                <input type="hidden" name="avatar" value="{{ session()->get('comp_avatar') }}">
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', session()->get('comp_username'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', session()->get('comp_name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', session()->get('comp_email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create Account', ['class' => 'form-control']) !!}
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
            </div>
        </div>
    </div>
@stop