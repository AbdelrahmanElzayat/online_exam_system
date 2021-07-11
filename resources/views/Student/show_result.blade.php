@extends('layouts.app')
@section('title')
   Result
@endsection
@section('content')
   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0"> Result</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active"> Result</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
           <div class="col-sm-2"></div>
           <div class="col-sm-8">
               
               <div class="card mt-4">
                <div class="card-body">
                                            {{-- Student Info --}}
                    <h2>Basic Information</h2>
                    {{-- @if (($std_info->email) === ($all_std->email)) --}}
                    <table class="table">
                      
                        <tr>
                            <td>name</td>
                            <td>{{$std_info->name}}</td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td>{{$std_info->email}}</td>
                        </tr>
                        <tr>
                            <td>Exam Name</td>
                            <td>{{$result_info->exams->map->title->first()}}</td>
                        </tr>
                        <tr>
                            <td>Date Of Birth</td>
                            <td>{{date('d M,Y',strtotime($std_info->dob))}}</td>
                        </tr>
                        <tr>
                            <td>Exam Date</td>
                            <td>{{date('d M,Y',strtotime($result_info->exams->map->exam_date->first()))}}</td>
                        </tr>
                       
                    </table>
                  
                                            {{-- Exam Info --}}
                    <h2>Result Information</h2>
                    <table class="table">
                        <tr>
                            <td>Pass Marks</td>
                            <td>{{$result_info->yes_ans}}</td>
                        </tr>
                        <tr>
                            <td>Fail Marks</td>
                            <td>{{$result_info->no_ans}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{$result_info->yes_ans+$result_info->no_ans}}</td>
                        </tr>
                    </table>
                    {{-- @endif --}}
                </div>
            </div>
           </div>
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 @endsection