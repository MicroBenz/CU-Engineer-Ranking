@extends('layout.layout')

@section('css-for-master')
    <link href="{{ asset('/css/dashboard/master-dashboard-style.css') }}" rel="stylesheet">
    @yield('css')
@stop

@section('body')

    @yield('content')
@stop