@extends('layouts.default')

@section('page_title')
    Lists
@stop

@section('styles')

@stop

@section('scripts')
    <script src="{{ elixir('js/lists.js') }}"></script>
@stop

@section('content')
    <div class="container">
        <div class="page-header text-center">
            <h1>Lists</h1>
        </div>

        <header>
            <input id="search-input" type="text" autocomplete="off" class="form-control" spellcheck="false" autocorrect="off" placeholder="Search by name, brand, description..."/>
            <div id="search-input-icon"></div>
        </header>

        <hr/>

        <main>
            <div id="right-column">

                <div id="hits"></div>
            </div>
        </main>

        <footer>
            <div class="col-md-12 text-center">
                Powered by <a href="http://www.algolia.com"><img src="https://www.algolia.com/assets/algolia128x40.png" style="height: 14px;" /></a>
            </div>
        </footer>


        <script type="text/template" id="hit-template">
            @{{#hits}}
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="@{{ thumbnail }}" alt="@{{ title }}">
                    <div class="caption">
                        <h4>@{{{ _highlightResult.title.value }}}</h4>
                        <p><a href="lists/list/@{{ slug }}" class="btn btn-info btn-xs" role="button">Show List</a></p>
                    </div>
                </div>
            </div>
            @{{/hits}}
        </script>
        <script type="text/template" id="pagination-template">
        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li @{{^prev_page}}class="disabled"@{{/prev_page}}><a href="#" @{{#prev_page}}class="go-to-page" data-page="@{{ prev_page }}"@{{/prev_page}}>&#60;</a></li>
                @{{#pages}}
                <li class="@{{#current}}active@{{/current}} @{{#disabled}}disabled@{{/disabled}}"><a href="#" @{{^disabled}} class="go-to-page" data-page="@{{ number }}" @{{/disabled}}>@{{ number }}</a></li>
                @{{/pages}}
                <li @{{^next_page}}class="disabled"@{{/next_page}}><a href="#" @{{#next_page}}class="go-to-page" data-page="@{{ next_page }}"@{{/next_page}}>&#62;</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        </script>



        <script type="text/template" id="no-results-template">
            <div id="no-results-message">
                <p>We didn't find any results for the search <em>"@{{ query }}"</em>.</p>
            </div>
        </script>

    </div>
@stop