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
            <form action="" method="post" name="Login_Form" class="form-signin">
                <h3 class="form-signin-heading">Sign In</h3>
                <hr class="colorbar"><br>
                <input type="text" class="form-control" name="student-id" placeholder="Student ID" required autofocus="" />
                <input type="password" class="form-control" name="pwd" placeholder="Password" required=""/>
                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
                <p align="center" class="made-by-clique">Made by<img class="clique-logo" src="{{ asset('/images/clique-logo.png') }}"></p>
            </form>
        </div>
    </div>
@stop