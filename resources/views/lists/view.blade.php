@extends('layouts.default')

@section('page_title')
    {{ $list->title }} | Lists
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{ $list->title }}</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                {!! Markdown::convertToHtml($file) !!}
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Info</h3>
                    </div>
                    <div class="panel-body">
                        <p><i class="fa fa-user"></i> {{ $list->user->username }}</p>
                        <p><i class="fa fa-th"></i> {{ $list->topic }}</p>
                        <p><i class="fa fa-link"></i> <a href="{{ $list->url }}">GitHub</a></p>
                        <p><i class="fa fa-copyright"></i> {{ $list->author }}</p>
                    </div>
                </div>

                @can('update', $list)
                    <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actions</h3>
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-pencil"></i> <a href="{{ route('lists.list.edit', $list->getSlug()) }}">Edit</a>
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </div>
@stop