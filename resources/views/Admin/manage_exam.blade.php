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
                          <th>Title</th>
                          <th>Category</th>
                          <th>Exam Date</th>
                          <th>Status</th>
                          <th>Action</th>
                      </thead>
                    <tbody>
                        @foreach ($manage_ex as $key=>$exam)
                            <tr>
                              <th>{{$key+1}}</th>
                              <td>{{$exam->title}}</td>
                              <td>{{$exam->cat_name}}</td>
                              <td>{{$exam->exam_date}}</td>
                              <td><input type="checkbox" name="status" class="exam_status" data-id="{{$exam->id}}" {{$exam->status==1?'checked':''}}>
                            </td>
                              <td>
                                <a href="{{route('edit_exam',$exam->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{route('delete_exam',$exam->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{route('add_question',$exam->id)}}" class="btn btn-primary btn-sm">Add Question</a>
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Exam Date</th>
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
        <h4 class="modal-title">Add New Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
       
        
        <form action="{{route('addNewExam')}}"  enctype="multipart/form-data" method="POST">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Exam Name</label>
              <input type="text" name="title"  class="form-control" placeholder="Enter exam Name">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam Date</label>
              <input type="date" name="exam_date"  class="form-control">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam Category</label>
              <select class="form-control"  name="category">
                @foreach ($ex_category as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Add</button>
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