<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print Exam info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .std_info{
            line-height: 4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <h1>{{$exam->title}}<h1>
                <h5>Exam Date: {{date('d M,Y',strtotime($exam->exam_date))}}</h5>
        </div>
        <div class="text-center mt-5 ">
            <div class="row ">
                <label class="col-6 h5 std_info">name: {{$std->name}}</label>
                <label class="col-6 h5 std_info">email: {{$std->email}}</label>
            </div>
            <div class="row ">
                <label class="col-6 h5">mobile-no: {{$std->mobile_no}}</label>
                <label class="col-6 h5">DOB: {{date('d M,Y',strtotime($std->dob))}}</label>
            </div>
        </div>
        <div class="text-center mt-5">
            <button onclick="window.print()" class="btn btn-success m-5">print</button>
            <a href="{{route('dashboardPortal')}}" class="btn btn-info m-5">Dashboard</a>
        </div>
        <div class="text-center mt-5">
            
        </div>
    </div>
</body>
</html>