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
                    <a class="navbar-brand" href="#">
                        <img class="sigma-icon" src={{ asset('/images/sigma.png') }}>
                    </a>
                    <a class="navbar-brand web-title" href="#">CU Engineering Ranking</a>
                </span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                {{--<a class="navbar-brand" href="#">--}}
                    {{--<img class="sigma-icon" src={{ asset('/images/sigma.png') }}>--}}
                {{--</a>--}}
                <ul class="nav navbar-nav navbar-left">
                    {{--<li><a class="web-title" href="#">CU Engineering Ranking</a></li>--}}
                    <li><a class="">Academic Profile</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="">Ranking Calculator</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
@stop