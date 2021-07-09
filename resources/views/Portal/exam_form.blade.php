@extends('layouts.portalApp')
@section('title')
    Exam form
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Mange Exams</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">manage_exams</li>
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
                            <h3 class="text-center">{{$ex_exam_master->title}}</h3>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-center">{{date('d M,Y',strtotime($ex_exam_master->exam_date))}}</h3>
                        </div>
                    </div>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                    {{$error}}
                    </div>
                    @endforeach 
                    <form action="{{route('examForm_save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$ex_exam_master->id}}">
                                <label for="">Enter Name</label>
                                <input type="text" name="name"  class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter E-mail</label>
                                <input type="email" name="email"  class="form-control" placeholder="E-mail">
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
                                <input type="text" name="mobile_no" class="form-control" placeholder="mobile-no">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter DOB</label>
                                <input type="date" name="dob" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                               <button type="submit" class="btn btn-info">save</button>
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