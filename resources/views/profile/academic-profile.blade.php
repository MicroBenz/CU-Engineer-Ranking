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
        <div class="row">
            <div class="col-md-3 card summary-profile">
                <p class="student-name">{{$user->name}}</p>
                <p class="student-major">Major : {{$user->major}}</p>
                {{--TODO ไปifคำนวณจาก grade เอา--}}
                <p class="student-status">Status : <span class="student-status-text">Normal</span></p>
            </div>
            <div class="col-md-3 card">
                {{--TODO ต้องหา gpax ของเทอมล่าสุด--}}
                <p class="header-text">GPAX</p>
                <p class="gpax">3.98</p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 card grade-graph">
                <div id="grade-graph-desktop" style="height: 500px;"></div>
            </div>
        </div>
        <?php $i=0; ?>
        @foreach($user->gpax()->get() as $data)
            @if($i%3==0)
                <div class="row">
            @endif
                    <div class="col-md-3 card term-profile">
                        <p class="header-text">{{$data->year}}/{{$data->semester}}</p>
                        <table class="grade-report">
                            @foreach($user->study_result()->where('year',$data->year)->where('semester',$data->semester)->get() as $result)
                                <tr>
                                    <td class="subject">{{$result->subject()->first()->name}}</td>
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
            @if($i%3==0)
                </div>
            @endif
            <?php $i++; ?>
        @endforeach
        <div class="row">
            <div class="col-md-3 card term-profile">
                <p class="header-text">2557/1</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>

            <div class="col-md-3 card term-profile">
                <p class="header-text">2557/1</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
            <div class="col-md-3 card term-profile">
                <p class="header-text">Semester 2557/2</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm Long Long</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
            <div class="col-md-3 card term-profile">
                <p class="header-text">Semester 2557/2</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm Long Long</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 card term-profile">
                <p class="header-text">2557/1</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>

            <div class="col-md-4 card term-profile">
                <p class="header-text">2557/1</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
            <div class="col-md-4 card term-profile">
                <p class="header-text">Semester 2557/2</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm Long Long</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
        </div>

    </div>

    <!-- For Mobile -->
    <div class="container visible-xs">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card summary-profile">
                <p class="student-name" align="center">Mr.Tanawat Kaochalongkeang</p>
                <p class="student-major">Major : Industrial Engineering</p>
                <p class="student-status">Status : <span class="status-risk">Normal</span></p>
                <p></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card">
                <p class="header-text">GPAX</p>
                <p class="gpax">3.98</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card grade-graph">
                <p class="header-text">Your GPAX Graph</p>
                <div id="grade-graph-mobile" style="height: 250px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card term-profile">
                <p class="header-text">Semester 2557/1</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card term-profile">
                <p class="header-text">2557/2</p>
                <table class="grade-report">
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Envi Sci Comm Long Long</td>
                        <td class="grade">F</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="grade">X</td>
                    </tr>
                </table>
                <p class="gpa">GPA : 3.99</p>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script>
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