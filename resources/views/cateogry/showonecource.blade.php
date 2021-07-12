@extends('layouts.app')
@section('style')
    <style>
        .specialbackground {
            background-color: #F7F7F8;
        }

        .w-full {
            width: 100%;
        }

        .specialtextarea:focus {
            outline: none;
        }

        .special-time {
            font-size: 17px;
        }

        .body {
            font-size: 20px;
        }

        .container {
            height: 100%;
        }

    </style>
@endsection
@section('content')

<div class="container pt-4">
    @include('__zoom')
    <div class="card text-center">
            <div class="card-header specialbackground">
                <ul class="nav nav-tabs card-header-tabs ">
                    <li class="nav-item ">
                        <button id="TimeLine_buttom" class="nav-link tap-buttom active"
                            onclick="openCity('TimeLine')">TimeLine</button>
                    </li>
                    <li class="nav-item ">
                        <button id="Files_buttom" class="nav-link tap-buttom" onclick="openCity('Files')">Files</button>
                    </li>
                    <li class="nav-item ">
                        <button id="Upload_Files_buttom" class="nav-link tap-buttom"
                            onclick="openCity('Upload_Files')">Upload_Files</button>
                    </li>
                    <i class="nav-item">
                        <button id="Exams_buttom" class="nav-link tap-buttom" onclick="openCity('Exams')">Exams</button>
                    </i>
                    @if (auth()->user()->user_role() == 'student')
                    @else
                    <i class="nav-item">
                        <button id="Assign_student_buttom" class="nav-link tap-buttom" onclick="openCity('Assign_student')">Assign_Student</button>
                    </i>
                    <i class="nav-item">
                        <button id="Result_buttom" class="nav-link tap-buttom" onclick="openCity('Result')">Result</button>
                    </i>
                    @endif
                </ul>
            </div>
            <div class="card-body">
                {{-- ====================================================================== --}}
                <div id="TimeLine" class="city">
                    @if (auth()->user()->user_role() == 'student')
                    @else
                    @include('_publishesd-tweet-panel')
                    @endif
                    @include('_timeline')
                </div>
                {{-- ======================================================================= --}}
                <div id="Files" class="city" style="display:none">
                    @include('__Files')
                </div>

                <div id="Upload_Files" class="city" style="display:none">
                    @include('__Upload_Files')
                </div>
                <div id="Exams" class="city" style="display:none">
                    @include('__Exams')
                </div>
                @if (auth()->user()->user_role() == 'student')
                @else
                <div id="Assign_student" class="city" style="display:none">
                    @include('__Assign_student')
                </div>
                <div id="Result" class="city" style="display:none">
                    @include('__Result_student')
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            var arrLi = document.querySelectorAll('.tap-buttom')
            arrLi.forEach(function(l) {
                l.classList.remove('active');
            });
            document.getElementById(cityName + '_buttom').classList.add('active');
            document.getElementById(cityName).style.display = "block";
        }
    </script>
@endsection

