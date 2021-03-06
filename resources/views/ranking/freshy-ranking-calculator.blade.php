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
        <p class="title-header">Ranking Calculator</p>
        <p class="title-subheader">Select major and see your approximation rank!</p>
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-4 col-sm-4">
            <div class="row">
                <select id="major" onchange="selectMajor()" data-width="100%" class="selectpicker" data-live-search="true" title="Select Major">
                    <option value="ce">Civil Engineering</option>
                    <option value="ee">Electrical Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                    <option value="auto">Automotive Engineering</option>
                    <option value="be">Naval Architecture and Marine Engineering</option>
                    <option value="ie">Industrial Engineering</option>
                    <option value="che">Chemical Engineering</option>
                    <option value="pe">Petroleum Engineering</option>
                    <option value="geo">Georesources Engineering</option>
                    <option value="env">Environmental Engineering</option>
                    <option value="metal">Metallurgical Engineering</option>
                    <option value="survey">Survey Engineering</option>
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
                            <td class="grade">{{$grade_json["ENG DRAWING"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">ENG MATERIALS</td>
                            <td id="materials-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["ENG MATERIALS"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">COMP PROG</td>
                            <td id="compprog-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["COMP PROG"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">EXPLORING ENG WORLD</td>
                            <td id="exploring-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["EXPL ENG WORLD"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">CAL I</td>
                            <td id="cal1-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["CALCULUS I"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">CAL II</td>
                            <td id="cal2-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["CALCULUS II"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS I</td>
                            <td id="phy1-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["GEN PHYS I"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS II</td>
                            <td id="phy2-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["GEN PHYS II"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN CHEM</td>
                            <td id="chem-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["GEN CHEM"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">EXP ENG I</td>
                            <td id="eng1-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["EXP ENG I"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">EXP ENG II</td>
                            <td id="eng2-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["EXP ENG II"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN CHEM LAB</td>
                            <td id="chemlab-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["GEN CHEM LAB"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS LAB I</td>
                            <td id="phy1lab-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["GEN PHYS LAB I"]}}</td>
                        </tr>

                        <tr>
                            <td class="subject">GEN PHYS LAB II</td>
                            <td id="phy2lab-weight" class="weight">-</td>
                            <td class="grade">{{$grade_json["GEN PHYS LAB II"]}}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 rank-column">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <p class="header-text">Your Approx. Rank</p>
                        <p id="approx-rank" class="rank-score">-</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 approx-rank">
                    <div class="card">
                        <p class="header-text">Min Rank</p>
                        <p id="min-rank" class="rank-score">-</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 approx-rank">
                    <div class="card">
                        <p class="header-text">Max Rank</p>
                        <p id="max-rank" class="rank-score">-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- For Mobile -->
    <div class="container visible-xs">
        <p class="title-header">Ranking Calculator</p>
        <p class="title-subheader">Select major and see your approximation rank below!</p>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <select id="major-mobile" onchange="selectMajorMobile()" data-width="100%" class="selectpicker" data-live-search="true" title="Select Major">
                    <option value="ce">Civil Engineering</option>
                    <option value="ee">Electrical Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                    <option value="auto">Automotive Engineering</option>
                    <option value="be">Naval Architecture and Marine Engineering</option>
                    <option value="ie">Industrial Engineering</option>
                    <option value="che">Chemical Engineering</option>
                    <option value="pe">Petroleum Engineering</option>
                    <option value="geo">Georesources Engineering</option>
                    <option value="env">Environmental Engineering</option>
                    <option value="metal">Metallurgical Engineering</option>
                    <option value="survey">Survey Engineering</option>
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
                        <td id="drawing-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["ENG DRAWING"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">ENG MATERIALS</td>
                        <td id="materials-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["ENG MATERIALS"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">COMP PROG</td>
                        <td id="compprog-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["COMP PROG"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">EXPLORING ENG WORLD</td>
                        <td id="exploring-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["EXPL ENG WORLD"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">CAL I</td>
                        <td id="cal1-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["CALCULUS I"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">CAL II</td>
                        <td id="cal2-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["CALCULUS II"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS I</td>
                        <td id="phy1-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["GEN PHYS I"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS II</td>
                        <td id="phy2-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["GEN PHYS II"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN CHEM</td>
                        <td id="chem-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["GEN CHEM"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">EXP ENG I</td>
                        <td id="eng1-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["EXP ENG I"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">EXP ENG II</td>
                        <td id="eng2-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["EXP ENG II"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN CHEM LAB</td>
                        <td id="chemlab-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["GEN CHEM LAB"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS LAB I</td>
                        <td id="phy1lab-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["GEN PHYS LAB I"]}}</td>
                    </tr>

                    <tr>
                        <td class="subject">GEN PHYS LAB II</td>
                        <td id="phy2lab-weight-mb" class="weight">-</td>
                        <td class="grade">{{$grade_json["GEN PHYS LAB II"]}}</td>
                    </tr>

                </table>
            </div>
            <div class="col-xs-10 col-xs-offset-1 card rank">
                <p class="header-text">Rank Score</p>
                <p id="approx-rank-mobile" class="rank-score">-</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 card rank">
                <p class="header-text">Min Rank</p>
                <p id="min-rank-mb" class="rank-score">-</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 card rank">
                <p class="header-text">Max Rank</p>
                <p id="max-rank-mb" class="rank-score">-</p>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function selectMajor() {
            var major_select = $('#major').val();
            console.log(major_select);
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
            else if (major_select == "geo" ){
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
            else if (major_select == "survey" ){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "6";
                weight[3] = "3";
                weight[4] = "6";
                weight[5] = "6";
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
            var major_rank = {!! json_encode($rank_json) !!};
            console.log(major_rank);
            document.getElementById("approx-rank").innerHTML = major_rank[major_select];
            document.getElementById("approx-rank-mobile").innerHTML = major_rank[major_select];

            var minRank = [595,585,319,438,563,471,430,67,680,626,668,676,621];
            var maxRank = [73, 11 ,1  ,122,97 ,15 ,1  ,4 ,502,266,25 ,568 ,1];
            var idx;
            switch (major_select) {
                case "ce": idx=0;break;
                case "ee": idx=1;break;
                case "me": idx=2;break;
                case "auto": idx=3;break;
                case "be": idx=4;break;
                case "ie": idx=5;break;
                case "che": idx=6;break;
                case "pe": idx=7;break;
                case "geo": idx=8;break;
                case "env": idx=9;break;
                case "metal": idx=10;break;
                case "survey": idx=11;break;
                case "cp": idx=12;break;
            }
            document.getElementById("min-rank").innerHTML = minRank[idx];
            document.getElementById("max-rank").innerHTML = maxRank[idx];

        }
    </script>
    <script>
        function selectMajorMobile() {
            var major_select = $('#major-mobile').val();
            console.log(major_select);
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
            else if (major_select == "geo" ){
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
            else if (major_select == "survey" ){
                weight[0] = "3";
                weight[1] = "3";
                weight[2] = "6";
                weight[3] = "3";
                weight[4] = "6";
                weight[5] = "6";
                weight[6] = "3";
                weight[7] = "3";
                weight[8] = "3";
                weight[9] = "3";
                weight[10] = "3";
                weight[11] = "1";
                weight[12] = "1";
                weight[13] = "1";
            }

            document.getElementById("drawing-weight-mb").innerHTML = weight[0];
            document.getElementById("materials-weight-mb").innerHTML = weight[1];
            document.getElementById("compprog-weight-mb").innerHTML = weight[2];
            document.getElementById("exploring-weight-mb").innerHTML = weight[3];
            document.getElementById("cal1-weight-mb").innerHTML = weight[4];
            document.getElementById("cal2-weight-mb").innerHTML = weight[5];
            document.getElementById("phy1-weight-mb").innerHTML = weight[6];
            document.getElementById("phy2-weight-mb").innerHTML = weight[7];
            document.getElementById("chem-weight-mb").innerHTML = weight[8];
            document.getElementById("eng1-weight-mb").innerHTML = weight[9];
            document.getElementById("eng2-weight-mb").innerHTML = weight[10];
            document.getElementById("chemlab-weight-mb").innerHTML = weight[11];
            document.getElementById("phy1lab-weight-mb").innerHTML = weight[12];
            document.getElementById("phy2lab-weight-mb").innerHTML = weight[13];
            var major_rank = {!! json_encode($rank_json) !!};
            console.log(major_rank);
            document.getElementById("approx-rank-mobile").innerHTML = major_rank[major_select];

            var minRank = [595,585,319,438,563,471,430,67,680,626,668,676,621];
            var maxRank = [73, 11 ,1  ,122,97 ,15 ,1  ,4 ,502,266,25 ,568 ,1];
            var idx;
            switch (major_select) {
                case "ce": idx=0;break;
                case "ee": idx=1;break;
                case "me": idx=2;break;
                case "auto": idx=3;break;
                case "be": idx=4;break;
                case "ie": idx=5;break;
                case "che": idx=6;break;
                case "pe": idx=7;break;
                case "geo": idx=8;break;
                case "env": idx=9;break;
                case "metal": idx=10;break;
                case "survey": idx=11;break;
                case "cp": idx=12;break;
            }
            document.getElementById("min-rank-mb").innerHTML = minRank[idx];
            document.getElementById("max-rank-mb").innerHTML = maxRank[idx];

        }
    </script>


@stop
