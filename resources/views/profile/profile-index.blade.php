@extends('layout.master')

@section('title')
    Academic Profile
@stop

@section('css')
    <link href="{{ asset('/css/profile-index.css') }}" rel="stylesheet">
@stop
@section('content')
    <div class="container hidden-xs">
        <div class="row">
            <div class="col-md-5 card summary-profile">
                <p class="student-name">Mr.Lorem Ipsum</p>
                <p class="student-major">Major : Computer Engineering</p>
                <p class="gpax">GPAX : 3.85</p>
                <p class="student-status">Status : <span class="student-status-text">Normal</span></p>
                <p></p>
            </div>
            <div class="col-md-5 col-md-offset-1 card grade-graph">
                Graph
            </div>
        </div>
    </div>

    <!-- For Mobile -->
    <div class="container visible-xs">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card summary-profile">
                <p class="student-name">Mr.Lorem Ipsum</p>
                <p class="student-major">Major : Computer Engineering</p>
                <p class="gpax">GPAX : 3.85</p>
                <p class="student-status">Status : <span class="status-risk">Normal</span></p>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card grade-graph">
                Graph
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 card term-profile">
                <p class="semester-text">2557/1</p>
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
                <p class="semester-text">2557/2</p>
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
            </div>
        </div>

    </div>
@stop