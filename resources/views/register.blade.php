<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Learning | SignUp</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<div class="img-gradient"></div>
<body class="hold-transition login-page backimage">
{{-- <div class="backimage">  --}}
<div class="login-box">
  <div class="login-logo position-sticky">
    <img src="/img/logosam.png" alt="logo" class="img-thumbnail rounded bg-transparent border-0">
    <a href="#" class="text-white"><b>E</b>-Book</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body img-gradient rounded ">
      <!-- <p class="login-box-msg text-light">Sign in to start your session</p> -->

      <form action="{{ route('register')}}" method="POST">
      <!-- {{-- <form action="/bera" method="post"> --}} -->
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" required autocomplete name="name" id="name" autofocus>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password_confirmation" required autocomplete="new-password" id="password-confirm">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary text-light">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

{{-- </div> --}}
{{-- login background --}}
<script src="/plugin/jquery/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugin/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/adminlte/js/adminlte.min.js"></script>
  {{-- script --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- include summernote js -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#content').summernote({
              height: 250, //set editable area's height
          });
      })
  </script>

</body>
</html>

