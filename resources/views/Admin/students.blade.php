@extends('layouts.app')
@section('title')
    Student
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
          @if (session('msg'))
          <script>
            alert('{{session('msg')}}');
          </script>
          @endif
          @foreach ($errors->all() as $error)
          <script>
            alert("{{$error}}");
          </script>
          @endforeach 
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>
  
                  <div class="card-tools">
                      <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                  
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Action</th>
                      </thead>
                    <tbody>
                      @foreach ($ex_students as $key=>$student)
                      @if ($student->user_role() === 'student')
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>
                              <a href="{{route('edit_student',$student->id)}}" class="btn btn-info btn-sm">Edit</a>
                              <a href="{{route('delete_student',$student->id)}}" class="btn btn-danger btn-sm">Delete</a>

                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                    <tfoot>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
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
        <form action="{{route('add_students')}}" method="POST" enctype="multipart/form-data">
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

          {{-- <div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam</label>
              <select class="form-control" name="exam" id="">
                  @foreach ($ex_exam_master as $exam)
                      <option value="{{$exam->id}}">{{$exam->title}}</option>
                  @endforeach
              </select>
            </div>
          </div> --}}

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