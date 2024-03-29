<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title') - devpane.com</title>

    <link href="{{ elixir('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    @yield('styles')

    <!--[if lt IE 9]>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
