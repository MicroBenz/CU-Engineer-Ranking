@extends('layout.master')

@section('title')
    Major Ranking
@stop

@section('css')
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/major-ranking.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container hidden-xs" style="padding-top: 7%;padding-bottom: 7%">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="card major-rank">
                        <p class="header-text">Your Rank is</p>
                        <p class="rank-number">{{$data['rank']}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="card major-average-gpax">
                        <p class="header-text">Major Average GPAX</p>
                        <p class="average-gpax">{{$data['avg_gpax']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div id="rank-graph-desktop" style="height: 325px"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- For Mobile -->
    <div class="container visible-xs">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card">
                <p class="header-text">Your Rank is</p>
                <p class="rank-number">200</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card">
                <p class="header-text">Major Average GPAX</p>
                <p class="average-gpax">2.78</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card">
                <div id="rank-graph"></div>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script>
        var info = JSON.parse("{{$ranking_json}}".replace(/&quot;/g,'"'));
        var rank = {{$data['rank']}};
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'rank-graph',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: info,
            // The name of the data record attribute that contains x-values.
            xkey: 'rank',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value','gpax'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['GPAX','Your GPAX'],
            pointSize:[3,0],
            ymin:'auto',
            parseTime: false,
            gridTextFamily:'Montserrat',
            goals : [0.0,4.0],
            events : [rank-1],
            eventStrokeWidth : 3,
            eventLineColors : ['red']
        });
    </script>
    <script>
        var info = JSON.parse("{{$ranking_json}}".replace(/&quot;/g,'"'));
        var rank = {{$data['rank']}};
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'rank-graph-desktop',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: info,
            // The name of the data record attribute that contains x-values.
            xkey: 'rank',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value','gpax'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['GPAX','Your GPAX'],
            pointSize:[3,0],
            ymin:'auto',
            parseTime: false,
            gridTextFamily:'Montserrat',
            goals : [0.0,4.0],
            events : [rank-1],
            eventStrokeWidth : 3,
            eventLineColors : ['red']
        });
    </script>


@stop