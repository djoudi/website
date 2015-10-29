@extends('layouts.default')

@section('page_title')
    Edit List
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit List</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                {!! Form::model($list, ['route' => ['lists.list.update', $list->id], 'method' => 'patch', 'files' => true]) !!}
                        <!-- Title Form Input -->
                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Url Form Input -->
                <div class="form-group">
                    {!! Form::label('url', 'Url') !!}
                    {!! Form::text('url', $list->url, ['class' => 'form-control']) !!}
                </div>

                <!-- Content Form Input -->
                <div class="form-group">
                    {!! Form::label('content', 'Description') !!}
                    {!! Form::textarea('content', $list->content, ['class' => 'form-control']) !!}
                </div>

                <!-- Author Form Input -->
                <div class="form-group">
                    {!! Form::label('author', 'Author') !!}
                    {!! Form::text('author', $list->author, ['class' => 'form-control']) !!}
                </div>

                <!-- Topic Form Input -->
                <div class="form-group">
                    {!! Form::label('topic', 'Topic') !!}
                    {!! Form::text('topic', $list->topic, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Create List Form Input -->
                <div class="form-group">
                    {!! Form::submit('Update List', ['class' => 'form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop