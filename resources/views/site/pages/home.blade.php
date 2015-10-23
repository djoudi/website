@extends('layouts.default')

@section('page_title')
    Home
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <section class="jk-slider hidden-xs">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">

                <div class="item active">
                    <div class="hero">
                        <hgroup>
                            <h1>Search for</h1>
                            <h3>the books you need and save ! </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
                        </hgroup>

                    </div>
                    <div class="overlay"></div>
                    <a href="#"><img src="https://placekitten.com/1600/600" /></a>

                </div>
                <div class="item">
                    <div class="hero">
                        <hgroup>
                            <h1>Search for</h1>
                            <h3>the books you need and save ! </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
                        </hgroup>

                    </div>

                    <div class="overlay"></div>
                    <a href="#"><img src="https://placekitten.com/1600/600" /></a>

                </div>
                <div class="item">
                    <div class="hero">
                        <hgroup>
                            <h1>Search for</h1>
                            <h3>the books you need and save ! </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
                        </hgroup>

                    </div>
                    <div class="overlay"></div>
                    <a href="#"><img src="https://placekitten.com/1600/600" /></a>

                </div>
            </div>

            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

    </section>

    <br/>

    @if($meetups->count() > 0)
        <div class="container">

            <h3 class="text-center">Recent Meetups</h3>
            <div class="row">

                @foreach($meetups as $meetup)
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ $meetup->thumbnail }}" alt="{{ $meetup->title }}">
                            <div class="caption">
                                <h4>{{ $meetup->title }}</h4>
                                <p>{{ $meetup->content }}</p>
                                <p><a href="{{ url('meetups/meetup/'.$meetup->getSlug()) }}" class="btn btn-info btn-xs" role="button">Show Meetup</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    @if($awesomes->count() > 0)
        <div class="container">

            <h3 class="text-center">Recent Tutorials</h3>
            <div class="row">

                @foreach($awesomes as $awesome)
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ $awesome->thumbnail }}" alt="{{ $awesome->title }}">
                            <div class="caption">
                                <h4>{{ $awesome->title }}</h4>
                                <p>{{ $awesome->content }}</p>
                                <p><a href="{{ url('awesomes/list/'.$awesome->getSlug()) }}" class="btn btn-info btn-xs" role="button">Show Awesome-List</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
@stop