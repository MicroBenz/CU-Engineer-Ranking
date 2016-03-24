@extends('layout.layout')

@section('css-for-master')
    <link href="{{ asset('/css/dashboard/master-dashboard-style.css') }}" rel="stylesheet">
    @yield('css')
@stop

@section('body')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand nice-animation" href="{{ url('/admin/index') }}">CU Engineer Ranking : Admin Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a class="nice-animation" href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="{{ Request::is('admin/upload-csv') ? 'active' : '' }}">
                        <a href="{{ url('/admin/upload-csv') }}">Upload CSV</a>
                    </li>
                    <li class="{{ Request::is('admin/edit-ratio') ? 'active' : '' }}">
                        <a href="{{ url('/admin/edit-ratio') }}">Edit Ratio</a>
                    </li>
                    <li class="{{ Request::is('admin/add-edit-qa') ? 'active' : '' }}">
                        <a href="{{ url('/admin/add-edit-faq') }}">Add/Edit FAQ</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            @yield('dashboard-title')
                            {{--Dashboard <small>Statistics Overview</small>--}}
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                @yield('content')

                <!-- /.row -->



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    @yield('content')
@stop