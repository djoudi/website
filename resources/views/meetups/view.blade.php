@extends('layouts.default')

@section('page_title')
    {{ $meetup->title }}
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

        @can('update', $meetup)
            <a href="{{ route('meetups.meetup.edit', $meetup->slug) }}">Edit Meetup</a>
        @endcan
    </div>
@stop