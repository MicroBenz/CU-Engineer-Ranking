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
        <div class="col-md-4 col-sm-4">
            <div class="row">
                <select id="major" onchange="selectMajor()" data-width="100%" class="selectpicker" data-live-search="true" title="Select Major">
                    <option value="ce">Civil Engineering</option>
                    <option value="ee">Electrical Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                    <option value="auto">Automotive Engineering</option>
                    <option value="be">Boat(???) Engineering</option>
                    <option value="ie">Industrial Engineering</option>
                    <option value="che">Chemical Engineering</option>
                    <option value="metal">Metallurgical Engineering</option>
                    <option value="env">Environmental Engineering</option>
                    <option value="pe">Petroleum Engineering</option>
                    <option value="cp">Computer Engineering</option>
                </select>
            </div>
            <div class="row">
                <div class="card">
                    <table class="grade-weight-table">
                        <col width="50%">
                        <col width="10%">
                        <col width="40%">
                        <tr class="header-table">
                            <td align="center">Subject</td>
                            <td align="center">Weight</td>
                            <td align="center">Grade</td>
                        </tr>

                        <tr>
                            <td class="subject">ENG DRAW FUND</td>
                            <td id="drawing-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">ENG MATERIALS</td>
                            <td id="materials-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">COMP PROG</td>
                            <td id="compprog-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">EXPLORING ENG WORLD</td>
                            <td id="exploring-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">CAL I</td>
                            <td id="cal1-weight" class="weight">-</td>
                            <td class="grade">B+</td>
                        </tr>

                        <tr>
                            <td class="subject">CAL II</td>
                            <td id="cal2-weight" class="weight">-</td>
                            <td class="grade">B+</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS I</td>
                            <td id="phy1-weight" class="weight">-</td>
                            <td class="grade">A</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS II</td>
                            <td id="phy2-weight" class="weight">-</td>
                            <td class="grade">A</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN CHEM</td>
                            <td id="chem-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">EXP ENG I</td>
                            <td id="eng1-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">EXP ENG II</td>
                            <td id="eng2-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN CHEM LAB</td>
                            <td id="chemlab-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS LAB I</td>
                            <td id="phy1lab-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS LAB II</td>
                            <td id="phy2lab-weight" class="weight">-</td>
                            <td class="grade">B</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="card">
                        <p class="header-text">Rank Score</p>
                        <p class="rank-score">144</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- For Mobile -->
    <div class="container visible-xs">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <select id="major" onchange="selectMajor()" data-width="100%" class="selectpicker" data-live-search="true" title="Select Major">
                    <option value="ce">Civil Engineering</option>
                    <option value="ee">Electrical Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                    <option value="auto">Automotive Engineering</option>
                    <option value="be">Boat(???) Engineering</option>
                    <option value="ie">Industrial Engineering</option>
                    <option value="che">Chemical Engineering</option>
                    <option value="metal">Metallurgical Engineering</option>
                    <option value="env">Environmental Engineering</option>
                    <option value="pe">Petroleum Engineering</option>
                    <option value="cp">Computer Engineering</option>
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
                        <td class="subject">ENG DRAW FUND</td>
                        <td id="drawing-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">ENG MATERIALS</td>
                        <td id="materials-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">COMP PROG</td>
                        <td id="compprog-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">EXPLORING ENG WORLD</td>
                        <td id="exploring-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">CAL I</td>
                        <td id="cal1-weight" class="weight">-</td>
                        <td class="grade">B+</td>
                    </tr>

                    <tr>
                        <td class="subject">CAL II</td>
                        <td id="cal2-weight" class="weight">-</td>
                        <td class="grade">B+</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS I</td>
                        <td id="phy1-weight" class="weight">-</td>
                        <td class="grade">A</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS II</td>
                        <td id="phy2-weight" class="weight">-</td>
                        <td class="grade">A</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN CHEM</td>
                        <td id="chem-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">EXP ENG I</td>
                        <td id="eng1-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">EXP ENG II</td>
                        <td id="eng2-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN CHEM LAB</td>
                        <td id="chemlab-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS LAB I</td>
                        <td id="phy1lab-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS LAB II</td>
                        <td id="phy2lab-weight" class="weight">-</td>
                        <td class="grade">B</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function selectMajor() {
            var major_select = document.getElementById("major").value;
            var weight = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14"];

            if (major_select == "ce" || major_select == "me" || major_select == "auto" ||
                    major_select == "be" || major_select == "che" || major_select == "metal" ){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "3";
                weight[3] = "3";
                weight[4] = "3";
                weight[5] = "3";
                weight[6] = "3";
                weight[7] = "3";
                weight[8] = "3";
                weight[9] = "3";
                weight[10] = "3";
                weight[11] = "1";
                weight[12] = "1";
                weight[13] = "1";
            }
            else if (major_select == "ee"){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "3";
                weight[3] = "3";
                weight[4] = "6";
                weight[5] = "6";
                weight[6] = "3";
                weight[7] = "6";
                weight[8] = "3";
                weight[9] = "3";
                weight[10] = "3";
                weight[11] = "1";
                weight[12] = "1";
                weight[13] = "1";
            }
            else if (major_select == "ie" ){
                weight[0] = "4";
                weight[1] = "4";
                weight[2] = "5";
                weight[3] = "1";
                weight[4] = "5";
                weight[5] = "5";
                weight[6] = "2";
                weight[7] = "2";
                weight[8] = "2";
                weight[9] = "3";
                weight[10] = "3";
                weight[11] = "1";
                weight[12] = "1";
                weight[13] = "1";
            }
            else if (major_select == "env" ){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "3";
                weight[3] = "3";
                weight[4] = "3";
                weight[5] = "3";
                weight[6] = "3";
                weight[7] = "3";
                weight[8] = "3";
                weight[9] = "3";
                weight[10] = "3";
                weight[11] = "2";
                weight[12] = "2";
                weight[13] = "2";
            }
            else if (major_select == "pe" ){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "4";
                weight[3] = "3";
                weight[4] = "3";
                weight[5] = "3";
                weight[6] = "3";
                weight[7] = "3";
                weight[8] = "3";
                weight[9] = "4";
                weight[10] = "4";
                weight[11] = "1";
                weight[12] = "1";
                weight[13] = "1";
            }
            else if (major_select == "cp" ){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "9";
                weight[3] = "3";
                weight[4] = "3";
                weight[5] = "3";
                weight[6] = "3";
                weight[7] = "3";
                weight[8] = "3";
                weight[9] = "3";
                weight[10] = "3";
                weight[11] = "1";
                weight[12] = "1";
                weight[13] = "1";
            }

            document.getElementById("drawing-weight").innerHTML = weight[0];
            document.getElementById("materials-weight").innerHTML = weight[1];
            document.getElementById("compprog-weight").innerHTML = weight[2];
            document.getElementById("exploring-weight").innerHTML = weight[3];
            document.getElementById("cal1-weight").innerHTML = weight[4];
            document.getElementById("cal2-weight").innerHTML = weight[5];
            document.getElementById("phy1-weight").innerHTML = weight[6];
            document.getElementById("phy2-weight").innerHTML = weight[7];
            document.getElementById("chem-weight").innerHTML = weight[8];
            document.getElementById("eng1-weight").innerHTML = weight[9];
            document.getElementById("eng2-weight").innerHTML = weight[10];
            document.getElementById("chemlab-weight").innerHTML = weight[11];
            document.getElementById("phy1lab-weight").innerHTML = weight[12];
            document.getElementById("phy2lab-weight").innerHTML = weight[13];


        }
    </script>


@stop