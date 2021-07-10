@extends('layouts.app')
@section('title')
    Exams
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Exams</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Exams</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover datatable">
                        <thead>
                            <th>#</th>
                            <th>Exam Title</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            <th>Action</th>
                        </thead>
                      <tbody> 
                        @foreach ($exams as $exam)
                        <tr>
                          <th>{{$exam->id}}</th>
                          <td>{{$exam->title}}</td>
                          <td>{{$exam->exam_date}}</td>
                          <td>
                            @if(strtotime($exam->exam_date)<strtotime(date('Y-m-d')))
                            {{"Finished"}}
                            @endif
                            @if(strtotime($exam->exam_date)==strtotime(date('Y-m-d')))
                            {{"running"}} 
                            @endif  
                            @if(strtotime($exam->exam_date)>strtotime(date('Y-m-d')))
                            {{"pending"}}
                            @endif
                          </td>
                          <td>
                            @if (isset($exam->get_user()->yes_ans)) 
                            {{$exam->get_user()->yes_ans}}/{{$exam->get_user()->yes_ans+$exam->get_user()->no_ans}}
                            @endif
                          </td>
                          <td>
                          @if(strtotime($exam->exam_date)==strtotime(date('Y-m-d')))
                            @if (isset($exam->get_user()->yes_ans))
                                finish
                             @else
                             <a href="{{route('join_exam_form',$exam->id)}}" class="btn btn-info">Join Exam</a> 
                            @endif
                          @endif 
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <th>#</th>
                          <th>Exam Title</th>
                          <th>Exam Date</th>
                          <th>Status</th>
                          <th>Result</th>
                          <th>Action</th>
                      </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
 </div>
 @endsection