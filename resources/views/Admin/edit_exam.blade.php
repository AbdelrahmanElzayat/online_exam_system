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
                    <form action="{{route('update_exam')}}" class="database-operation" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Enter Exam Name</label>
                            <input type="hidden" name="id" value="{{$ex_exam_master->id}}">
                            <input type="text" name="title" required class="form-control" value="{{$ex_exam_master->title}}" placeholder="Enter exam Name">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Select Exam Date</label>
                            <input type="date" name="exam_date" value="{{$ex_exam_master->exam_date}}" required class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Select Exam Category</label>
                            <select class="form-control" required name="category">
                              @foreach ($ex_category as $category)
                                  <option 
                                  @if ($ex_exam_master->category == $category->id )
                                      {{"selected"}}
                                  @endif
                                   value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
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