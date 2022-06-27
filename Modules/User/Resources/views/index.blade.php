<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminPanel | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>

    <body class="hold-transition login-page" style="padding-top: 35px">
        <div class="login-box">
            <div class="login-logo">

            <h4 class="card-title"></h4>
            <b>Admin</b>Panel
          </div>
          <!-- /.login-logo -->
          <div class="card">
            @if (Session::has('success'))
            <div class="alert alert-success">
              <span>{{ session('success') }}</span>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
              <span>{{ session('error') }}</span>
            </div>
            @endif

            <div class="card-body login-card-body">
              <p class="login-box-msg">Sign in to start your session</p>

              <form method="POST" action="{{ route('adminHome') }}" novalidate>
                @csrf
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                  <label for="username">User</label>
                  <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">

                  @if ($errors->has('username'))
                  <span class="font-weight-bold">{{ $errors->first('username') }}</span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password">
                  @if ($errors->has('password'))
                  <span class="font-weight-bold">{{ $errors->first('password') }}</span>
                  @endif
                  <input type="checkbox" onclick="myFunction2()"> Show Password
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
              <!-- /.social-auth-links -->

              <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
              </p>

            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
        <!-- /.login-box -->
        <br><br><br>
        <!-- footer starts here-->

        @extends('user::layouts.scripts')
        <script>
          function myFunction2() {
            var x = document.getElementById("password");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }
        </script>
      </body>

