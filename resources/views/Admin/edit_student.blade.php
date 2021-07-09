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
           <h1 class="m-0">Edit Student</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Edit Student</li>
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
                                {{-- @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                    {{$error}}
                    </div>
                    @endforeach  --}}
                    <form action="{{route('update_student')}}" class="database-operation" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Enter Name</label>
                            <input type="hidden" name="id" value="{{$ex_students->id}}">
                            <input type="text" value="{{$ex_students->name}}" name="name" required class="form-control" placeholder="Enter exam Name">
                          </div>
                        </div>
                          <div class="col-sm-12">
                          <div class="form-group">
                              <label>Enter E-Mail</label>
                              <input type="email" value="{{$ex_students->email}}" name="email" required class="form-control" placeholder="Enter E-mail">
                          </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" value="{{$ex_students->password}}" name="password" required class="form-control" placeholder="Enter ur Password">
                              </div>
                            </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                <label>Enter mobile-no</label>
                                <input type="text" value="{{$ex_students->mobile_no}}" name="mobile_no" required class="form-control" placeholder="Enter phone-no">
                              </div>
                            </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label> Date Of Birth</label>
                            <input type="date" value="{{$ex_students->dob}}" name="dob" required class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Select Exam</label>
                            <select class="form-control" name="exam" id="">
                                @foreach ($ex_exam_master as $exam)
                                    <option
                                        @if ($ex_students->exam == $exam->id)
                                            {{"selected"}}
                                        @endif
                                    value="{{$exam->id}}">{{$exam->title}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
              
                        <div class="col-sm-12">
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-primary">Update</button>
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
 
 </div>
 @endsection