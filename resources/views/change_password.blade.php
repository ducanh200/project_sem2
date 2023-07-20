<body  class="hold-transition login-page" >
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>
                Change user password</b></a>

    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">



            <form method="POST" action="{{url("/change_password",["user"=>$user->id])}}">
                @csrf
                <div class="input-group mb-3">
                    <input  id="current_password" name="current_password" type="password" class="form-control" placeholder="Mật khẩu hiện tại">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input  type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu mới">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input  type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu mới">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Đổi Mật Khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
