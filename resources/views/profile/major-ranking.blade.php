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
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'rank-graph',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { rank: '1', value: 4.00 , gpax:3.75 },
                { rank: '2', value: 3.98 , gpax:3.75 },
                { rank: '3', value: 3.95 , gpax:3.75},
                { rank: '4', value: 3.90 , gpax:3.75},
                { rank: '5', value: 3.85 , gpax:3.75},
                { rank: '6', value: 3.83 , gpax:3.75},
                { rank: '7', value: 3.81 , gpax:3.75},
                { rank: '8', value: 3.79 , gpax:3.75},
                { rank: '9', value: 3.75 , gpax:3.75},
                { rank: '10', value: 3.70 , gpax:3.75},
                { rank: '11', value: 3.6 , gpax:3.75},
                { rank: '12', value: 3.51 , gpax:3.75},
                { rank: '13', value: 3.42 , gpax:3.75},
                { rank: '14', value: 3.42 , gpax:3.75},
                { rank: '15', value: 3.41 , gpax:3.75},
                { rank: '16', value: 3.39 , gpax:3.75},
                { rank: '17', value: 3.21 , gpax:3.75},
                { rank: '18', value: 3.14 , gpax:3.75},
                { rank: '19', value: 3.12 , gpax:3.75},
                { rank: '20', value: 3.09 , gpax:3.75},
                { rank: '21', value: 3.00, gpax:3.75 }
            ],
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
            gridTextFamily:'Montserrat'
        });
    </script>
    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'rank-graph-desktop',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { rank: '1', value: 4.00 , gpax:3.75 },
                { rank: '2', value: 3.98 , gpax:3.75 },
                { rank: '3', value: 3.95 , gpax:3.75},
                { rank: '4', value: 3.90 , gpax:3.75},
                { rank: '5', value: 3.85 , gpax:3.75},
                { rank: '6', value: 3.83 , gpax:3.75},
                { rank: '7', value: 3.81 , gpax:3.75},
                { rank: '8', value: 3.79 , gpax:3.75},
                { rank: '9', value: 3.75 , gpax:3.75},
                { rank: '10', value: 3.70 , gpax:3.75},
                { rank: '11', value: 3.6 , gpax:3.75},
                { rank: '12', value: 3.51 , gpax:3.75},
                { rank: '13', value: 3.42 , gpax:3.75},
                { rank: '14', value: 3.42 , gpax:3.75},
                { rank: '15', value: 3.41 , gpax:3.75},
                { rank: '16', value: 3.39 , gpax:3.75},
                { rank: '17', value: 3.21 , gpax:3.75},
                { rank: '18', value: 3.14 , gpax:3.75},
                { rank: '19', value: 3.12 , gpax:3.75},
                { rank: '20', value: 3.09 , gpax:3.75},
                { rank: '21', value: 3.00, gpax:3.75 }
            ],
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
            gridTextFamily:'Montserrat'
        });
    </script>


@stop