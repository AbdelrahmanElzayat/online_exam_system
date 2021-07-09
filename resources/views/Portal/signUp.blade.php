<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signUp portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .signUpContainer{
            width: 60%;
            border: 1px solid;
            border-radius: 35px;
            padding: 21px;
            margin-left: 20%;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="signUpContainer">
            <div class="signUpTitle">
                <h3 class="text-center">Portal signUp</h3>
                <hr>
            </div>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
            {{$error}}
            </div>
            @endforeach   
            <form action="{{route('signUp_sub')}}" method="post" enctype="multipart/form-data">
            <div class="signUpForm">
                <div class="row">
                   
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Name</label>
                            <input type="text" name="name" class="form-control" placeholder="enter name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter email</label>
                            <input type="email" name="email" class="form-control" placeholder="enter email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" name="password" class="form-control" placeholder="enter password" value="{{old('password')}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Mobile-no</label>
                            <input type="text" name="mobile_no" class="form-control" placeholder="enter mobile_no"value="{{old('mobile_no')}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info text-center btn-block">sign up</button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <h5>OR</h5>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <a href="{{route('loginPortal')}}" class="btn btn-success text-center btn-block">login</a>
                        </div>
                    </div>
                </div>
            </div>
                </form>
                
        </div>
    </div>
</body>
</html>