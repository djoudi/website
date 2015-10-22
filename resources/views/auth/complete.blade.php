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
                <pre>
                    {{ session()->get('comp_avatar') }}
                </pre>
            </div>

            <div class="col-md-4">

            </div>
        </div>
    </div>
@stop