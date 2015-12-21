@extends('layout.layout')

@section('css-for-master')
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    @yield('css')
@stop

@section('body')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span>
                    <a class="navbar-brand hidden-xs" href="#">
                        <img class="sigma-icon" src={{ asset('/images/sigma.png') }}>
                    </a>
                    <a class="navbar-brand web-title" href="{{ url('/') }}">CU Engineering Ranking</a>
                </span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="" href="{{ url('/profile') }}">Academic Profile</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="">Ranking Calculator</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <footer class="footer hidden-xs">
        <div class="container">
            <div class="col-md-6">
                <img class="chula-engineering-logo center-block" src="{{ asset('/images/chula-engineering.png') }}">
            </div>
            <div class="col-md-6">
                <img class="clique-logo center-block" src="{{ asset('/images/clique-logo.png') }}">
            </div>
        </div>
    </footer>

    <footer class="footer visible-xs">
        <div class="container">
            <img class="chula-engineering-logo center-block" src="{{ asset('/images/chula-engineering.png') }}">
            <img class="clique-logo center-block" src="{{ asset('/images/clique-logo.png') }}">
        </div>
    </footer>
    @yield('content')
@stop