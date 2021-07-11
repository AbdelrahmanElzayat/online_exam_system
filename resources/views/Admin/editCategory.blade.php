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
           <h1 class="m-0">Edit Category</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Edit Category</li>
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
                    <form  method="POST" action="{{route('updateCategory')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label>Enter Category Name</label>
                            <input type="hidden" name="id" value="{{$ex_category->id}}">
                            <input type="text" name="name" value="{{$ex_category->name}}" required class="form-control" placeholder="Enter Category Name">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary">update</button>
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