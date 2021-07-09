@extends('layouts.app')
@section('title')
    Exam Question
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Exam Question</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Exam Question</li>
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
                <div class="card-header">
                  <h3 class="card-title">Title</h3>
  
                  <div class="card-tools">
                      <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button> --}}
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <th>#</th>
                          <th>Question</th>
                          <th>Answer</th>
                          <th>Status</th>
                          <th>Action</th>
                      </thead>
                    <tbody>
                      @foreach ($questions as $key=>$question)
                          <tr>
                              <th>{{$key+1}}</th>
                              <td>{{$question->question}}</td>
                              <td>{{$question->ans}}</td>
                              <td><input class="question_status" type="checkbox"{{$question->status==1?'checked':''}} name="status" data-id="{{$question->id}}"></td>
                              <td>
                                  <a href="{{route('delete_question',$question->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                  <a href="{{route('edit_question',$question->id)}}" class="btn btn-info btn-sm">Edit</a>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                        <th>#</th>
                          <th>Question</th>
                          <th>Answer</th>
                          <th>Status</th>
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
      <!-- /.content -->
      <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Question</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        {{-- @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{$error}}
        </div>
        @endforeach  --}}
        <form action="{{route('addNewQuestion')}}" class="database-operation" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Question</label>
              <input type="hidden" name="exam_id" value="{{Request::segment(2)}}">
              <input type="text" name="question" required class="form-control" placeholder="Enter Question">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Option 1</label>
              <input type="text" name="option1" required class="form-control" placeholder="Enter Option 1">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Option 2</label>
              <input type="text" name="option2" required class="form-control" placeholder="Enter Option 2">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Option 3</label>
              <input type="text" name="option3" required class="form-control" placeholder="Enter Option 3">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Option 4</label>
              <input type="text" name="option4" required class="form-control" placeholder="Enter Option 4">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter answer</label>
              <input type="text" name="ans" required class="form-control" placeholder="Enter correct answer">
            </div>
          </div>
          
          <div class="col-sm-12">
            <div class="form-group">
              <button class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    
  </div>
  </div>
 
 </div>
 @endsection