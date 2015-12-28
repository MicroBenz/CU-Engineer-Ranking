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
                <span class="web-brand">
                    <a class="navbar-brand hidden-xs" href="#">
                        <img class="sigma-icon" src={{ asset('/images/sigma.png') }}>
                    </a>
                    <a class="navbar-brand web-title" href="{{ url('/profile') }}">CU Engineering Ranking</a>
                </span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="{{ Request::is('profile') ? 'active' : '' }}"><a class="" href="{{ url('/profile') }}">Academic Profile</a></li>
                    <li class="{{ Request::is('major-ranking') ? 'active' : '' }}"><a class="" href="{{ url('/major-ranking') }}">Major Ranking</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('ranking-calculator') ? 'active' : '' }}"><a href="{{ url('/ranking-calculator') }}">Ranking Calculator</a></li>
                    <li><a href="{{url().'/logout'}}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{--Footer for Desktop--}}
    <footer class="footer hidden-xs">
        <div class="container">
            <table class="logo-license">
                <tr>
                    <td><img class="chula-engineering-logo center-block" src="{{ asset('/images/chula-engineering.png') }}"></td>
                    <td><img class="clique-logo center-block" src="{{ asset('/images/clique-logo.png') }}"></td>
                </tr>
            </table>
        </div>
    </footer>

    {{--Footer for Mobile--}}
    <footer class="footer visible-xs">
        <div class="container">
            <img class="chula-engineering-logo center-block" src="{{ asset('/images/chula-engineering.png') }}">
            <img class="clique-logo center-block" src="{{ asset('/images/clique-logo.png') }}">
        </div>
    </footer>
    @yield('content')
@stop
