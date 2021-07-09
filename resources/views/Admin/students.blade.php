@extends('layouts.app')
@section('title')
    dashboard
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Mange Students</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">manage_students</li>
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
                          <th>Name</th>
                          <th>DOB</th>
                          <th>Exam</th>
                          <th>Exam Date</th>
                          <th>Result</th>
                          <th>Status</th>
                          <th>Action</th>
                      </thead>
                    <tbody>
                      @foreach ($ex_students as $key=>$student)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->dob}}</td>
                            <td>{{$student->ex_name}}</td>
                            <td>{{$student->exam_date}}</td>
                            <td>N/A</td>
                            <td><input {{$student->status == 1?'checked':''}} type="checkbox" name="status" class="student_status" data-id="{{$student->id}}"></td>
                            <td>
                              <a href="{{route('edit_student',$student->id)}}" class="btn btn-info btn-sm">Edit</a>
                              <a href="{{route('delete_student',$student->id)}}" class="btn btn-danger btn-sm">Delete</a>

                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                          <th>#</th>
                          <th>Name</th>
                          <th>DOB</th>
                          <th>Exam</th>
                          <th>Exam Date</th>
                          <th>Result</th>
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
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Student</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        {{-- @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{$error}}
        </div>
        @endforeach  --}}
        <form action="{{route('add_students')}}" class="database-operation" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Name</label>
              <input type="text"  name="name" required class="form-control" placeholder="Enter exam Name">
            </div>
          </div>
            <div class="col-sm-12">
            <div class="form-group">
                <label>Enter E-Mail</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter E-mail">
            </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                  <label>Enter Password</label>
                  <input type="password" name="password" required class="form-control" placeholder="Enter ur Password">
                </div>
              </div>
            <div class="col-sm-12">
                <div class="form-group">
                  <label>Enter mobile-no</label>
                  <input type="text" name="mobile_no" required class="form-control" placeholder="Enter phone-no">
                </div>
              </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label> Date Of Birth</label>
              <input type="date" name="dob" required class="form-control">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam</label>
              <select class="form-control" name="exam" id="">
                  @foreach ($ex_exam_master as $exam)
                      <option value="{{$exam->id}}">{{$exam->title}}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-12">
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