@extends('layout.layout')

@section('css')
    <style>
        .navbar{
            background-color: #bd0000;
        }
        .navbar-default .navbar-nav>li>a{
            color: #FFFFFF;
        }
        body {
            padding-top: 70px;
            font-family: 'Montserrat', serif;
            background-color: #eaedf2;
        }
        .web-title{
            padding-left: 0px !important;
        }

        .sigma-icon{
            height: 1.3em;
            margin-top: -8%;
        }
    </style>
@stop
@section('body')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="sigma-icon" src={{ asset('/image/sigma.png') }}>
            </a>
            <ul class="nav navbar-nav navbar-left">
                <li><a class="web-title" href="#">CU Engineering Ranking</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
@stop