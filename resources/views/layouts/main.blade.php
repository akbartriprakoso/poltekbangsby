<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Learning | {{ $judul }}</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
    <!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.navbar')
  
    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
    
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1>{{ $judul }}</h1> --}}
              <h1>{{ $judul }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">{{ $judul }}</a></li> --}}
                <li class="breadcrumb-item"><a href="#">{{ $judul }}</a></li>
                <li class="breadcrumb-item active">Beranda</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
          {{-- @include('beranda') --}}
          @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark float-left">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    {{-- footer --}}
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <div class="float-left d-none d-sm-block">
      <strong>Copyright &copy; 2022 <a href="https://www.instagram.com/daluproduction/">DaluProduction</a>.</strong> All rights reserved.
      </div>
    </footer>

 
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/plugin/jquery/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugin/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
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
  {{-- pdf viewer --}}
  <script src="https://documentcloud.adobe.com/view-sdk/viewer.js"></script>

  <script>
      $(document).ready(function() {
          $('#content').summernote({
              height: 250, //set editable area's height
          });
      })
  </script>

<script>
  $(document).ready(function(){
    $('#search').on('keyup',function(){
      var query= $(this).val();
      $.ajax({
        url:"search",
        type:"GET",
        data:{'search':query},
        success:function(data) {
          $('#search_list').html(data);
        }
    });
    //end of ajax call
    });
  });
</script>
</body>
</html>