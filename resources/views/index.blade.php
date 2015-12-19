@extends('layout.master')

@section('css')
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
@stop

@section('title')
    Home Page
@stop

@section('content')
    <div class="container">
        <p class="welcoming-text">Welcome Mr.Lorem Ipsum</p>
        <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-6 card gpax-card">
                <p class="card-title">GPAX</p>
                <p class="gpax-score" align="center">3.99</p>
            </div>
            <div class="col-md-4 col-md-offset-2 col-xs-6 card status-card">
                <p class="card-title">Status</p>
                <p class="status-text" align="center">Normal</p>
            </div>
        </div>

    </div>
@stop