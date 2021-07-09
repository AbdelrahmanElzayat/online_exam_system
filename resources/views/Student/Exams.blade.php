@extends('layouts.studentApp')
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
                        @foreach ($all_std as $key=>$all_s)
                           @if (($std_info->email) == ($all_s->email))
                        <tr>
                          <th>{{$key+1}}</th>
                          <td>{{$all_s->ex_name}}</td>
                          <td>{{$all_s->exam_date}}</td>
                          <td>
                            @if(strtotime($all_s->exam_date)<strtotime(date('Y-m-d')))
                            {{"Finished"}}
                            @endif
                            @if(strtotime($all_s->exam_date)==strtotime(date('Y-m-d')))
                            {{"running"}} 
                            @endif  
                            @if(strtotime($all_s->exam_date)>strtotime(date('Y-m-d')))
                            {{"pending"}}
                            @endif
                          </td>

                          <td>
                            @foreach ($results_join as $exam_join)
                                @if(($all_s->exam) === ($exam_join->exam_id)&&($exam_join->user_id ==  $std_info->id))
                                  {{$exam_join->yes_ans}}{{'/'}}{{$exam_join->yes_ans+$exam_join->no_ans}}
                                  <?php break;?>
                                @endif
                            @endforeach
                          </td>

                          <td>
                            <?php $finish = "" ?>
                          @if(strtotime($all_s->exam_date)==strtotime(date('Y-m-d')))
                            @foreach ($results_join as $exam_join)     
                                {{-- @if(($exam_join->user_id ==  $all_s->id)) --}}
                                @if(($exam_join->user_id ==  $std_info->id)&&($exam_join->exam_id == $all_s->exam))
                                  
                                    {{-- {{$exam_join->user_id}}  --}}
                                    <?php $finish = "finish" ?>
                                    {{$finish}}
                                    {{-- {{$all_s->id}} --}}
                                    <?php break;?>
                                
                                @endif

                                @if (($all_s->id != $exam_join->user_id))
                                  <?php continue;?>
                                @endif 
                            @endforeach
                          @endif 
                          @if(strtotime($all_s->exam_date)==strtotime(date('Y-m-d')))
                          <?php if (!$finish) { ?>
                            <a href="{{route('join_exam_form',$all_s->exam)}}" class="btn btn-info">Join Exam</a>
                          <?php } ?>
                          @endif 
                        </td>
                        
                        </tr>

                        @endif
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


                {{-- <table class="table table-striped table-bordered table-hover datatable">
                   @foreach ($results_join as $exam_join)
                  <tr>
                    <td>{{$exam_join->exam_id}}</td>
                    <td>hello</td>
                    <td>hello</td>
                  </tr>
                  @endforeach
                </table> --}}


                <!-- /.card-body -->
         
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
 </div>
 @endsection