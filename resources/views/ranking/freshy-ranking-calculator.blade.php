@extends('layout.master')

@section('title')
    Ranking Calculator
@stop

@section('css')
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/ranking-calculator.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container hidden-xs">

    </div>

    <!-- For Mobile -->
    <div class="container visible-xs">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <select id="major" onchange="changeMajor()" class="form-control">
                    <option disabled selected>Select Major</option>
                    <option value="cp">CP</option>
                    <option value="ie">IE</option>
                    <option value="three">Three</option>
                    <option value="four">Four</option>
                    <option value="five">Five</option>
                </select>
            </div>
            <div class="col-xs-10 col-xs-offset-1 card">
                <table class="grade-weight-table">
                    <tr class="header-table">
                        <td align="center">Subject</td>
                        <td align="center">Weight</td>
                        <td align="center">Your Grade</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td id="phy1-weight" class="weight"></td>
                        <td class="grade">A</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td id="cal1-weight" class="weight"></td>
                        <td class="grade">B+</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem</td>
                        <td class="weight"></td>
                        <td class="grade">B</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="weight"></td>
                        <td class="grade">C+</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="weight"></td>
                        <td class="grade">C</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Phys I</td>
                        <td class="weight"></td>
                        <td class="grade">D+</td>
                    </tr>
                    <tr>
                        <td class="subject">Calculus I</td>
                        <td class="weight"></td>
                        <td class="grade">D</td>
                    </tr>
                    <tr>
                        <td class="subject">Gen Chem Lab</td>
                        <td class="weight"></td>
                        <td class="grade">W</td>
                    </tr>
                    <tr>
                        <td class="subject">Eng Drawing</td>
                        <td class="weight"></td>
                        <td class="grade">X</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function changeMajor() {
            if (document.getElementById("major").value == "cp"){
                document.getElementById("phy1-weight").innerHTML = "1";
                document.getElementById("cal1-weight").innerHTML = "5";
            }
        }
    </script>


@stop