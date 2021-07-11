@extends('layouts.app')
@section('title')
  Portal Dashboard
@endsection
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Portal Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         @foreach ($ex_exam_master as $key=>$data)
         
         @if (($key+1)%2==0)
         <?php $cls = "bg-info" ?>
         @else
         <?php $cls = "bg-success" ?>
         @endif
         @if(strtotime(date('Y-m-d'))>strtotime(date($data->exam_date)))
         <?php $cls = "bg-danger" ?>
         @endif
         <div class="col-lg-6 col-6">
           <!-- small box -->
           <div class="small-box {{$cls}}">
             <div class="inner">
               <h3>exam name: {{$data->title}}</h3>

               <p>category: {{$data->cat_name}}</p>
             </div>
             <div class="icon">
               <i class="fas fa-chalkboard-teacher"></i>
             </div>
             @if(strtotime(date('Y-m-d'))<=strtotime(date($data->exam_date)))
             <a href="{{route('exam_form',$data->id)}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             @endif
             @if(strtotime(date('Y-m-d'))>strtotime(date($data->exam_date)))
             <h5 class="small-box-footer ">exam ended</h5>
             @endif
           </div>
         </div>
         @endforeach
         <!-- ./col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 @endsection