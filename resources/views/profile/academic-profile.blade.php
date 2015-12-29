@extends('layout.master')

@section('title')
    Academic Profile
@stop

@section('css')
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/academic-profile.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container hidden-xs">
        <!-- Left Panel -->
        <div class="col-md-4 col-sm-4">
            <div class="row card profile-overview">
                <p class="header-text left-text">Personal Info</p>
                <p class="student-name">{{ $user->name }} {{ $user->surname }}</p>
                <p class="student-id">{{ $user->user_id }}</p>
                <p class="student-major">Major : {{ $user->major }}</p>
                <p class="student-status">Status : <span class="status-normal">Normal</span></p>
                <hr>
                <p class="header-text left-text">GPAX : {{$gpax_result}}</p>
                <hr>
                <p class="header-text left-text">Adviser</p>
                <p class="adviser-name">{{$adviser['title'].". ".$adviser['name']." ".$adviser['surname']}}</p>
                <p class="adviser-contact">{{$adviser['email']}}</p>

            </div>

        </div>
        <!-- Graph Zone -->
        <div class="col-md-8 col-sm-8">
            <div class="card">
                <p class="header-text">Your GPAX Graph</p>
                <div id="grade-graph-desktop" class="grade-graph" style="height: 361px;"></div>
            </div>
        </div>
    </div>
    <div class="container hidden-xs">
        <p class="grade-report-header">Grade Report</p>
        <?php $i=0; ?>
        @foreach($user->gpax()->get() as $data)
            @if($i%3==0)
                <div class="row">
                    @endif
                    <div class="col-md-4 col-sm-4">
                        <div class="card term-profile">
                            <p class="header-text">{{$data->year}}/{{$data->semester}}</p>
                            <table class="grade-report">
                                @foreach($user->study_result()->where('year',$data->year)->where('semester',$data->semester)->get() as $result)
                                    <tr>
                                        <td class="subject">{{$result->subject()->first()->name}} ({{$result->credit}})</td>
                                        <td class="credit">{{$result->credit}}</td>
                                        <td class="grade">{{$result->grade}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <p class="gpa">GPA : {{$data->gpa}}</p>
                            <p class="gpa">GPAX : {{$data->gpax}}</p>
                        </div>
                    </div>
                    @if($i%3==0)
                </div>
            @endif
            <?php $i++; ?>
        @endforeach
    </div>
    <!-- Below this is old version of desktop page-->
    <!--
    <div class="container hidden-xs">
        <div class="row profile-overview">
            <div class="col-md-4 col-sm-4">
                <div class="card student-info">
                    <p class="header-text">Personal Info</p>
                    <p class="student-name">{{ $user->name }} {{ $user->surname }}</p>
                    <p class="student-id">{{ $user->user_id }}</p>
                    <p class="student-major">Major : {{ $user->major }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="card student-gpax">
                    TODO ต้องหา gpax ของเทอมล่าสุด
                    <p class="header-text">GPAX</p>
                    <p class="gpax">3.98</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="card student-status">
                    <p class="header-text">Status</p>
                    TODO ไปifคำนวณจาก grade เอา
                    ใช้เป็นรูปเอาแล้วนะ -Benz
                    <img class="center-block" id="status-image" src="{{ asset('/images/green-check.png') }}">
                    <p class="status-text status-normal">Normal</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="card student-adviser">
                    <p class="header-text">Adviser</p>
                    <p class="adviser-name">Mr.Lorem Ipsum</p>
                    <p class="adviser-contact">lorem@gmail.com</p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 card grade-graph">
                <div id="grade-graph-desktop" style="height: 500px;"></div>
            </div>
        </div>
        <p class="grade-report-header">Grade Report</p>
        <?php $i=0; ?>
        @foreach($user->gpax()->get() as $data)
            @if($i%3==0)
                <div class="row">
            @endif
                    <div class="col-md-4 col-sm-4">
                        <div class="card term-profile">
                            <p class="header-text">{{$data->year}}/{{$data->semester}}</p>
                            <table class="grade-report">
                                @foreach($user->study_result()->where('year',$data->year)->where('semester',$data->semester)->get() as $result)
                                    <tr>
                                        <td class="subject">{{$result->subject()->first()->name}} ({{$result->credit}})</td>
                                        เบ้นซ์ มึงลืมหน่วยกิดอะ
                                        <td class="credit">{{$result->credit}}</td>
                                        <td class="grade">{{$result->grade}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <p class="gpa">GPA : {{$data->gpa}}</p>
                            gpax ด้วย
                            <p class="gpa">GPAX : {{$data->gpax}}</p>
                        </div>
                    </div>
            @if($i%3==0)
                </div>
            @endif
            <?php $i++; ?>
        @endforeach

    </div>
    -->
    <!-- End of old desktop version -->
    <!-- For Mobile -->
    <div class="container visible-xs">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card student-info">
                <p class="header-text">Personal Info</p>
                <p class="student-name" align="center">{{ $user->name }} {{ $user->surname }}</p>
                <p class="student-id">{{ $user->user_id }}</p>
                <p class="student-major">Major : {{ $user->major }}</p>
                <p class="student-status">Status : <span class="status-normal">Normal</span></p>
                <p></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card student-gpax">
                <p class="header-text">GPAX</p>
                <p class="gpax">3.98</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card student-adviser">
                <p class="header-text">Adviser</p>
                <p class="adviser-name">Mr.Lorem Ipsum</p>
                <p class="adviser-contact">lorem@gmail.com</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card grade-graph">
                <p class="header-text">Your GPAX Graph</p>
                <div id="grade-graph-mobile" style="height: 250px;"></div>
            </div>
        </div>
        <?php $i=0; ?>
        @foreach($user->gpax()->get() as $data)
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 card term-profile">
                    <p class="header-text">{{$data->year}}/{{$data->semester}}</p>
                    <table class="grade-report">
                        @foreach($user->study_result()->where('year',$data->year)->where('semester',$data->semester)->get() as $result)
                            <tr>
                                <td class="subject">{{$result->subject()->first()->name}} ({{$result->credit}})</td>
                                {{--เบ้นซ์ มึงลืมหน่วยกิดอะ--}}
                                <td class="credit">{{$result->credit}}</td>
                                <td class="grade">{{$result->grade}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <p class="gpa">GPA : {{$data->gpa}}</p>
                    {{--gpax ด้วย--}}
                    <p class="gpa">GPAX : {{$data->gpax}}</p>
                </div>
            </div>
        @endforeach

    </div>
@stop

@section('script')
    <script>
        //var info = {{$gpax_json}};
        //console.log(info);
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'grade-graph-desktop',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { semester: '2556/1', value: 2.53 },
                { semester: '2556/2', value: 3.07 },
                { semester: '2556/S', value: 3.24 },
                { semester: '2557/1', value: 3.42 },
                { semester: '2557/2', value: 1.58 },
                { semester: '2557/S', value: 2.58 },
                { semester: '2558/1', value: 3.42 },
                { semester: '2558/2', value: 4.00 },
                { semester: '2558/S', value: 0.67 },
                { semester: '2559/1', value: 2.2 },
                { semester: '2559/2', value: 1.78 },
                { semester: '2559/S', value: 3.30 },
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'semester',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['GPAX'],

            parseTime: false,
            gridTextFamily:'Montserrat'
        });
    </script>

    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'grade-graph-mobile',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { semester: '2556/1', value: 2.53 },
                { semester: '2556/2', value: 3.07 },
                { semester: '2556/S', value: 3.24 },
                { semester: '2557/1', value: 3.42 },
                { semester: '2557/2', value: 1.58 },
                { semester: '2557/S', value: 2.58 },
                { semester: '2558/1', value: 3.42 },
                { semester: '2558/2', value: 4.00 },
                { semester: '2558/S', value: 0.67 },
                { semester: '2559/1', value: 2.2 },
                { semester: '2559/2', value: 1.78 },
                { semester: '2559/S', value: 3.30 },
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'semester',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['GPAX'],

            parseTime: false,
            gridTextFamily:'Montserrat'
        });
    </script>
@stop