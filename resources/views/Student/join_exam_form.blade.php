@extends('layouts.app')
@section('title')
  Exam
@endsection
@section('content')
    <style>
        .question_option>li{
            list-style: none;
            line-height: 50px;
        }
    </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Exam</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Exam</li>
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
           <div class="col-12">
               <div class="card">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-sm-4">
                               <h3>time: 1hrs</h3>
                           </div>
                           <div class="col-sm-4">
                            <h3 class="text-center">Timer: <span class="js-timeout">60:00</span></h3>
                        </div>
                           <div class="col-sm-4">
                                <h3 class="text-right">Status: Running</h3>
                            </div>
                       </div>
                   </div>
               </div>
               <div class="card mt-4">
                <div class="card-body">
                  <form action="{{route('submit_exam')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{Request::segment(2)}}">
                    <div class="row">

                      @foreach ($data as $key=> $question)
                        <div class="col-sm-12">
                            <p><b>{{$key+1}}. {{$question->question}}</b></p>
                            <?php $options = json_decode(json_encode(json_decode($question->option))) ?>
                            <input type="hidden" name="question{{$key+1}}" value="{{$question->id}}">
                            <input type="hidden" name="exam_id" value="{{$question->exams->map->id->first()}}">
                            <ul class="question_option">
                                <li><input type="radio" name="ans{{$key+1}}" value="{{$options->option1}}"> {{$options->option1}}</li>
                                <li><input type="radio" name="ans{{$key+1}}" value="{{$options->option2}}">  {{$options->option2}}</li>
                                <li><input type="radio" name="ans{{$key+1}}" value="{{$options->option3}}">  {{$options->option3}}</li>
                                <li><input type="radio" name="ans{{$key+1}}" value=" {{$options->option4}}">  {{$options->option4}}</li>
                                <li style="display: none"><input type="radio" checked name="ans{{$key+1}}" value="0"></li>
                            </ul>
                        </div>
                        @endforeach

                        <div class="col-sm-12 mt-4">
                          <input type="hidden" name="index" value="{{$key+1}}">
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                    </div>
                  </form>
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