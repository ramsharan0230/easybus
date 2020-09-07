<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EASYBUS | Counter Registration</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/AdminLTE.min.css')}}">
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>EASY</b>BUS</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new counter</p>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
             @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('message') !!}
        </div>
        @endif
        <form action="{{route('postRegister')}}" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="name">
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="fa fa-at form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="fa fa-key form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                <span class=" fa fa-key form-control-feedback"></span>
            </div>
            <div class="row form-group">
                <!-- <div class="col-xs-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="test" value="1"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div> -->
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
            Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
            Google+</a>
        </div> -->

        <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
 
<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script> 
<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
 
 
<script>
 
  $(document).ready(function() {
      $('#test').click(function(){
        var testvalue = $(this).val();
        // alert("hello");
      })
  })
</script>
</body>
</html>
