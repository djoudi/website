@extends('layouts.default')

@section('page_title')
    Lists
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header text-center">
            <h1>Lists</h1>
        </div>

        @foreach($lists as $awesome)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{ $awesome->thumbnail }}" alt="{{ $awesome->title }}">
                    <div class="caption">
                        <h4>{{ $awesome->title }}</h4>
                        <p>{{ str_limit($awesome->content, 100) }}</p>
                        <p><a href="{{ url('lists/list/'.$awesome->getSlug()) }}" class="btn btn-info btn-xs" role="button">Show List</a></p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-md-12 text-center">
            {!! $lists->render() !!}
        </div>
    </div>
@stop