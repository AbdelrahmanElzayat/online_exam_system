@extends('layouts.app')
@section('title')
    Update Exam Question
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Update Exam Question</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Update Exam Question</li>
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
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                    {{$error}}
                    </div>
                    @endforeach   
                    <form action="{{route('updateQuestion')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Enter Question</label>
                            <input type="hidden" name="id" value="{{$ex_exam_question_master[0]['id']}}">
                            <input type="text" name="question" class="form-control" value="{{$ex_exam_question_master[0]['question']}}" placeholder="Enter Question">
                          </div>
                        </div>
                        <?php $options = json_decode($ex_exam_question_master[0]['option']) ?>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Enter Option 1</label>
                            <input type="text" name="option1" class="form-control" value="{{$options->option1}}" placeholder="Enter Option 1">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Enter Option 2</label>
                            <input type="text" name="option2" class="form-control" placeholder="Enter Option 2" value="{{$options->option2}}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Enter Option 3</label>
                            <input type="text" name="option3" class="form-control" placeholder="Enter Option 3" value="{{$options->option3}}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Enter Option 4</label>
                            <input type="text" name="option4" class="form-control" placeholder="Enter Option 4" value="{{$options->option4}}">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Enter answer</label>
                            <input type="text" name="ans"  class="form-control" placeholder="Enter correct answer" value="{{$ex_exam_question_master[0]['ans']}}">
                          </div>
                        </div>
                        
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </div>
                      </form>
                </div>
                <!-- /.card-body -->
         
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
      <!-- Modal -->

 
 </div>
 @endsection