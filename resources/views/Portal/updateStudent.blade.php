@extends('layouts.app')
@section('title')
    Student Exam Info 
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Student Exam Info </h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Student Exam Info</li>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="text-center">{{$exam->title}}</h3>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-center">{{date('d M,Y',strtotime($exam->exam_date))}}</h3>
                        </div>
                    </div>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                    {{$error}}
                    </div>
                    @endforeach 
                    <form action="{{url('Portal.stdInfo_Update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$std[0]['id']}}">
                                <label for="">Enter Name</label>
                                <input type="text" name="name"  class="form-control" placeholder="Name" value="{{old('name')?old('name'):$std[0]['name']}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter E-mail</label>
                                <input type="email" name="email"  class="form-control" placeholder="E-mail" value="{{old('email')?old('email'):$std[0]['email']}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter mobile-no</label>
                                <input type="text" name="mobile_no" class="form-control" placeholder="mobile-no" value="{{old('mobile_no')?old('mobile_no'):$std[0]['mobile_no']}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter DOB</label>
                                <input type="date" name="dob" class="form-control" value="{{old('dob')?old('dob'):$std[0]['dob']}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                               <button type="submit" class="btn btn-info">Update</button>
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