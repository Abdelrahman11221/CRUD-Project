<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 3 | Registration Page</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('back/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('back/dist/css/adminlte.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
</div>

<div class="card">
    <div class="card-body register-card-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="username" placeholder="user name">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
        </div>
        </div>
        <div class="row">
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
        </div>
    </form>
    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h2>{{$error}}</h2>
        @endforeach
    @endif

    <h3>{{session('done')}}</h3>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('back/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('back/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
