@extends('layout.layout')

@section('css-for-master')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@stop

@section('title')
    Sign In
@stop
@section('body')
    <div class = "container-fluid">
        <div class="wrapper">
            <form action="{{url().'/login'}}" method="post" name="Login_Form" class="form-signin">
                {{csrf_field()}}
                <h3 class="form-signin-heading">CU Engineering Ranking</h3>
                <hr class="colorbar">
                @if($hasError == true)
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="alert alert-danger" role="alert">Error: Invalid user id or password.</div>
                        </div>
                    </div>
                @endif
                <p class="form-login-text">Please Login</p>
                <input type="text" class="form-control" name="student-id" placeholder="Student ID (10-Digits)" required autofocus="" />
                <input type="password" class="form-control" name="pwd" placeholder="Password" required=""/>
                <div class="checkbox"><label><input type="checkbox" name="remember" value="true">remember-me</label></div>
                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
                <p align="center" class="made-by-clique">Made by<img class="clique-logo" src="{{ asset('/images/clique-logo.png') }}"></p>
            </form>
        </div>
    </div>
@stop