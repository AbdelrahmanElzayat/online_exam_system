<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login portal</title>
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
                <h3 class="text-center">Portal login</h3>
                <hr>
            </div>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
            {{$error}}
            </div>
            @endforeach   
            <form action="{{route('login_sub')}}" method="POST" enctype="multipart/form-data">
                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif
            <div class="signUpForm">
                <div class="row"> 
                    @csrf
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
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info text-center btn-block">login</button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <h5>OR</h5>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <a href="{{route('signUpPortal')}}" class="btn btn-success text-center btn-block">sign up</a>
                        </div>
                    </div>
                </div>
            </div>
                </form>
                
        </div>
    </div>
</body>
<script>

</script>
</html>