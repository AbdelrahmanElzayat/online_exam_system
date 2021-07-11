@extends('layouts.app')
@section('title')
uploadPage
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0"> uploadPage </h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">uploadPage</li>
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
                    <form action="{{route('uploadAction')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                       <div class="col-sm-12">
                           <div class="form-group">
                               <label for="">Enter Name</label>
                               <input type="text" name="name" class="form-control" placeholder="Enter name of file" value="{{old('name')}}">
                           </div>
                       </div>
                       <div class="col-sm-12">
                           <div class="form-group">
                               <label for="">Enter Description</label>
                               <input type="text" name="description" class="form-control" placeholder="Enter file Description" value="{{old('description')}}">
                           </div>
                       </div>
                       <div class="col-sm-12">
                           <div class="form-group">
                               <input type="file" name="file" id="">
                           </div>
                       </div>
                      
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info"></button>
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