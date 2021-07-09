@extends('layouts.portalApp')
@section('title')
   Search Student
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Search Student</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Search Student</li>
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
                    <form action="{{route('updateStudent')}}" method="get">
                    @csrf
                    <div class="row">
                       <div class="col-sm-12">
                           <div class="form-group">
                               <label for="">Enter mobile-no</label>
                               <input type="text" name="mobile_no" class="form-control" placeholder="Enter mobile-no" value="{{old('mobile_no')}}">
                           </div>
                       </div>
                       <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Select DOB</label>
                                <input type="date" name="dob" class="form-control" placeholder="Select DOB" value="{{old('dob')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Select Exam</label>
                                <select name="exam" class="form-control">
                                    <option value="">
                                        @foreach ($exams as $exam)
                                            <option value="{{$exam->id}}">{{$exam->title}}</option>
                                        @endforeach
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-info">Search</button>
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
 </div>
 @endsection